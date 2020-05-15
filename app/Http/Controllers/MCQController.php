<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mcq;
use App\User;
use Auth;
use Session;
use Redirect;
use App\Subject;

class MCQController extends Controller
{
    public function new(){
        // Getting teaching subject
        $data['subjectName']=User::subjectName();
        // Getting Units for teaching subjects
        $data['units'] = Subject::find(User::subjectId())->units();
        //dd($data);
        return view('lms.mcq.newmcq')->with($data);
    }

    public function userMCQs($unit=null){
        $user = Auth::user()->id;
        if($unit==null){
            $mcqs = MCQ::where('creator',$user)->orderby('created_at','desc')->paginate(10);
        }
        else{
            $mcqs = MCQ::where('creator',$user)->where('unit',$unit)->orderby('created_at','desc')->paginate(10);
        }
        
        $data['mcqs']= $mcqs;
        return view('lms.mcq.mymcqs')->with($data);
    }



    public function update(Request $request){


        $validatedData = $request->validate([
            'unit' => 'required',
            'question' => 'required',
            'answer_1' => 'required',
            'answer_2' => 'required',
            'answer_3' => 'required',
            'answer_4' => 'required',
            'answer_5' => 'required',
            'correct_answer' => 'required'
        ]);

        $mcq = new Mcq;
        $mcq->id=rand(100000000,mt_getrandmax());
        $mcq->subject = User::subjectId();
        $mcq->unit = $request->input('unit');
        $mcq->question=$this->filter($request->input('question'));
        $mcq->answer_1=$this->filter($request->input('answer_1'));
        $mcq->answer_2=$this->filter($request->input('answer_2'));
        $mcq->answer_3=$this->filter($request->input('answer_3'));
        $mcq->answer_4=$this->filter($request->input('answer_4'));
        $mcq->answer_5=$this->filter($request->input('answer_5'));
        $mcq->correct_answer=$request->input('correct_answer');
        $mcq->explanation=$this->filter($request->input('explanation'));
        $mcq->note=$this->filter($request->input('note'));
        $mcq->creator=Auth::user()->id;
        $mcq->save();

        Session::flash('success', 'MCQ Question has been created/updated successfully');
        return Redirect::back();
    }

    private function filter($str){
        $str = addslashes($str);
        $str = preg_replace("/<script>|<\/script>/i", "", $str);
        //$str = preg_replace("/<|>/i", "", $str);
        return $str;
    }
}
