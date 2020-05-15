<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserProfile;
use Auth;
use Session;
use Redirect;

class ProfileController extends Controller
{
    public function profile(){
        $myprofile = UserProfile::find(Auth::user()->id);
        $data['profile']=$myprofile;
        return view('lms.user.profile')->with($data);
    }
    
    public function update(Request $request){
        $profile = UserProfile::updateOrCreate(array('id'=>Auth::user()->id));

        $profile->about=$request->input('about');
        $profile->dob=$request->input('dob');
        $profile->studied_at=$request->input('studied_at');
        $profile->higher_studies=$request->input('higher_studies');
        $profile->graduated_in=$request->input('graduated_in');
        $profile->work_place=$request->input('work_place');
        $profile->work_designation=$request->input('work_designation');

        $profile->save();

        Session::flash('success', 'Your profile has been updated successfully');
        return Redirect::back();
    }
    
}
