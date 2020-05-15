<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\RoleRequest;
use App\Subject;
use App\Teach;
use App\Enroll;
use Auth;
use Session;
use Redirect;



class UserController extends Controller
{
    public function users(){
        //$data['users'] = User::with('roles')->get();
        $data['users'] = User::with('roles')->paginate(10);
        
        return view('lms.user.users')->with($data);
    }

    public function search(Request $request, User $user){
        // Search for a user based on their email
        if ($request->has('email')) {
            $return_variable="";
            $users = User::with('roles')->where('email', 'LIKE','%'.$request->input('email').'%')->orderby('id','ASC')->get(['id','email']);
            foreach ($users as $user) {
                $return_variable.="<tr class='accordion-toggle collapsed' id='accordion-{{$user->id}}' data-toggle='collapse' data-parent='#accordion-{{$user->id}}' href='#collapse-{{$user->id}}'>";
                $return_variable.="<td class='expand-button font-weight-bold btn-dark btn m-3 p-3'></td>";
                $return_variable.="<td>".$user->id."</td>";
                $return_variable.="<td>".$user->email."</td>";
                foreach ($user->roles as $role) {
                    $return_variable.="<td>".$role->name."</td>";
                    break;
                }
                $return_variable.="</tr>";
                $return_variable.="<tr class='hide-table-padding'>";
                $return_variable.='<td colspan="4">
                <div id="collapse-{{$user->id}}" class="collapse in p-3">
                  <div class="row">
                    <div class="col-2">User ID</div>
                    <div class="col-6">value 1</div>
                  </div>
                </div>
                </td>
                </tr>';
            }
            return $return_variable;
        }
    }

    public function account(){
        $subjects = Subject::all();
        $data['subjects'] =  $subjects;
        return view('lms.user.account')->with($data);
    }

    public function requestrole(Request $request){
        /*  Saving Role Request from New User
            POST Method
        */

        // Getting user id from loggin session
        $user_id = Auth::user()->id;

        // Validating POST inputs data
        $validatedData = $request->validate([
            'account' => 'required'
        ]);

        // Getting requested Role ID
        $role_requested = \Spatie\Permission\Models\Role::where('name', $request->input('account'))->first();
        
        
        // Cheking for previous requests
        if(RoleRequest::where('user_id', $user_id)->count()==0){
            // New Request
            $rolerequest = New RoleRequest;
            $rolerequest->user_id = $user_id;
            $rolerequest->role = $role_requested->name;
            $rolerequest->status = 'Requested';
            $rolerequest->save();
            Session::flash('success', 'Account requested');
        }
        else{
            // Already Requested
            Session::flash('error', 'Already requested!');
        }
        return Redirect::back();
    }

    public function enrollSubject(Request $request){
        /* Saving Student Enrolls */
        
        // Getting User ID from login session
        $user_id = Auth::user()->id;

        // Validating POST inputs
        $validatedData = $request->validate([
            'subject_1' => 'required',
            'subject_2' => 'required',
            'subject_3' => 'required',
            'subject_4' => 'required',
            'subject_5' => 'required'
        ]);

        // Deleteing Old records
        Enroll::where('user_id',$user_id)->delete();

        // Looping for adding every subject
        for($i=1;$i<=5;$i++){
            $count = Enroll::where('user_id',$user_id)->where('subject_id',$request->input('subject_'.$i))->count();
            if($count==0){
                // Saving Enroll Data
                $enroll = New Enroll;
                $enroll->user_id = $user_id;
                $enroll->subject_id = $request->input('subject_'.$i);
                $enroll->save();
                Session::flash('success', 'Successfully enrolled');
            }
        }
        return Redirect::back();
    }

    
    public function roleRequest(){
        /*
            RoleRequest View 
            URL /lms/rolerequest
        */

        // Retriving New Requests
        $users = User::whereHas('RoleRequest',function($q){
            $q->where('status', 'Requested');
        })->paginate(10);

        // Merging with data variable
        $data['users'] = $users;
        // Returning view with data
        return view('lms.user.rolerequest')->with($data);
    }

    public function acceptRoleRequest(Request $request){
        /*

        */
        $current_user = Auth::user()->id;

        $validatedData = $request->validate([
            'user_id' => 'required'
        ]);
        
        $user = User::findOrFail($request->input('user_id'));

        $requestedRole=RoleRequest::where('user_id',$user->id)->first()->role;
       
        $user->removeRole('User');
        $user->assignRole($requestedRole);

        RoleRequest::where('user_id',$user->id)->update(['status' => 'Accepted','approved_by'=> $current_user]);

        Session::flash('success', 'Role assignment successful');
        
        return Redirect::back();
    }

    public function teachsubject(Request $request){
        
        $user = Auth::user()->id;

        $validatedData = $request->validate([
            'subject' => 'required'
        ]);

        $count = Teach::where('user_id',$user);
        if($count->count()==0){
            $teacherSubject = New Teach;
            $teacherSubject->user_id = $user;
            $teacherSubject->subject_id = $request->input('subject');
            $teacherSubject->save();
            Session::flash('success', 'Subject selection successful');
        }
        else{
            Session::flash('error', 'Subject change restricted');
        }
        return Redirect::back();
    }
}
