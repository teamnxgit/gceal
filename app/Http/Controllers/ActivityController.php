<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Activity;
use App\User;
use Auth;
use Session;
use Redirect;
use App\Subject;
use App\Mcq;
use App\Content;
use App\Unit;

class ActivityController extends Controller
{
    public function new(){
        $user = User::find(Auth::user()->id);
        $userSubject = $user->teach()->first()->subject_id;
        $subjectName = Subject::find($userSubject)->title;
        $data['subjectName']=$subjectName;
        return view('lms.activity.newactivity')->with($data);
    }
    
    public function update(Request $request){
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        //$activity_count = Activity::find($request->input('id'))->where('creator',Auth::user()->id);
        $activities=Activity::where('id', $request->input('id'))->where('creator',Auth::user()->id);
        if($activities->count()==1) {
            $activity = Activty::find($request->input('id'));
            $activity->title = $request->input('title');
            $activity->description = $request->input('description');
            $activity->save();
        }
        else {
            $user = User::find(Auth::user()->id);
            $user_subject = $user->teach()->first()->subject_id;
            $activity = new Activity;
            $activity->id = rand(100000000,mt_getrandmax());
            $activity->subject = $user_subject;
            $activity->title = $request->input('title');
            $activity->description = $request->input('description');
            $activity->creator = Auth::user()->id;
            $activity->save();
        }
        Session::flash('success', 'Activity has been created/updated successfully');
        return Redirect::back();
    }

    public function userActivities(){
        $user = Auth::user()->id;
        $userActivities = Activity::where('creator',$user)->orderby('created_at','desc')->paginate(10);
        $data['activities']= $userActivities;
        return view('lms.activity.myactivities')->with($data);
    }

    public function editActivity($activity_id){
        $data = $this->getMCQs($activity_id);
        return view('lms.activity.activity')->with($data);
    }

    public function addMCQ($activity_id,$mcq_id){
        $user = Auth::user()->id;
        $activity = Activity::where('creator',$user)->where('id',$activity_id)->firstOrFail();
        $mcq = MCQ::where('creator',$user)->where('id',$mcq_id)->firstOrFail();
        $content = New Content(['contentable_id'=>$mcq->id,'contentable_type'=>get_class($mcq)]);
        $activity->contents()->save($content);
        return Redirect::back();
    }

    public function fetchMCQ(Request $request,$activity_id){
        $unit_id = $request->input('unit');
        $keyword = $request->input('keyword');
        return view('lms.activity.fetch_mcqs_in_activity')->with($this->getMCQs($activity_id,$keyword,$unit_id));
    }

    private function getMCQs($activity_id,$keyword=null,$unit_id=null){

        // User Variables
        $user = User::find(Auth::user()->id);
        $userSubject = $user->teach()->first()->subject_id;
        // Getting Activity
        $activity = Activity::where('creator',$user->id)->where('id',$activity_id)->firstOrFail();
        // Getting Contents of Activities
        $contents = $activity->contents;
        // Filtering MCQ Contents
        $mcq_contents=$contents->where('contentable_type','App\Mcq');
        // Creating a list of used MCQs in activity
        $used_mcqs=[];
        foreach ($mcq_contents as $mcq) {
            array_push($used_mcqs,$mcq->contentable_id);
        }

        // Filtering unused MCQs
        if ($unit_id==null || $unit_id=='all') {
            if ($keyword==null) {
                $unUsedMCQs = MCQ::whereNotIn('id',$used_mcqs)->where('creator',$user->id)->paginate(5);
                $unUsedMCQ = MCQ::whereNotIn('id',$used_mcqs)->where('creator',$user->id)->get();
            }
            else{
                $unUsedMCQs = MCQ::whereNotIn('id',$used_mcqs)->where('creator',$user->id)->where('question','like','%'.$keyword.'%')->paginate(5);
                $unUsedMCQ = MCQ::whereNotIn('id',$used_mcqs)->where('creator',$user->id)->where('question','like','%'.$keyword.'%')->get();
            }
        }
        else{
            if ($keyword==null) {
                $unUsedMCQs = MCQ::whereNotIn('id',$used_mcqs)->where('creator',$user->id)->where('unit',$unit_id)->paginate(5);
                $unUsedMCQ = MCQ::whereNotIn('id',$used_mcqs)->where('creator',$user->id)->where('unit',$unit_id)->get();
            }
            else{
                $unUsedMCQs = MCQ::whereNotIn('id',$used_mcqs)->where('creator',$user->id)->where('unit',$unit_id)->where('question','like','%'.$keyword.'%')->paginate(5);
                $unUsedMCQ = MCQ::whereNotIn('id',$used_mcqs)->where('creator',$user->id)->where('unit',$unit_id)->where('question','like','%'.$keyword.'%')->get();
            }
        }
        
        // Getting unused MCQ Units
        $mcq_units = [];
        $mcq_units['all'] = 'All Units';
        foreach($unUsedMCQ as $mcq){
            $unit = Unit::where('id',$mcq->unit)->where('subject',$mcq->subject)->first();   
            $mcq_units[$mcq->unit]=$unit['name'];
        }
        // Compacting Data
        $data['activity'] = $activity;
        $data['contents'] = $contents;
        $data['mcqs']= $unUsedMCQs;
        $data['mcq_units']= $mcq_units;

        return $data;
    }
}
