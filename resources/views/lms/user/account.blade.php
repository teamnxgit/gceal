@extends('layouts.lms')
@section('content')
    <div id="page-content-wrapper">
        @include('includes.lms.navbar')
        <div class="container-fluid p-3">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Subject</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Password</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                {{ Form::open(array('url' => '/lms/account/accountrequest')) }}
                    <div class="row pl-lg-3 pl-4">
                        <div class="row px-2 pt-3 mr-lg-2" style="width:100%;">
                            {{Form::label('name', 'Name',['class'=>'col-lg-2 mt-1'])}}
                            {{Form::text('name',null,['class'=>'form-control  col-lg-4', 'readonly'])}}
                        </div>
                        <div class="row px-2 pt-2 mr-lg-2" style="width:100%;">
                            {{Form::label('email', 'Email',['class'=>'col-lg-2 mt-1'])}}
                            {{Form::text('email',null,['class'=>'form-control  col-lg-4', 'readonly'])}}
                        </div>
                        <div class="row px-2 pt-2 mr-lg-2" style="width:100%;">
                            {{Form::label('account', 'Account',['class'=>'col-lg-2 mt-1'])}}
                            {{Form::select('account',["student"=>"Student Account","teacher"=>"Teacher Account"],null,['class'=>'form-control col-lg-4'])}}
                        </div>
                        <div class="row px-2 pt-2 mr-lg-2" style="width:100%;">
                            <div class="col-lg-2"></div>
                            {{Form::submit('Request Account',['class'=>'btn btn-primary col-lg-2 mt-lg-0'])}}
                        </div>
                    </div>
                {{ Form::close() }}
                </div>
                
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                @role('Student')
                    {{ Form::open(array('url' => '/lms/account/enroll')) }}
                        <div class="row pl-lg-3 pl-4">
                            <div class="row px-2 pt-3 mr-lg-2" style="width:100%;">
                            
                            @php
                            $subject_data;
                            foreach($subjects as $subject){
                                if(!($subject->id=='12T'||$subject->id=='12E'||$subject->id=='12S'||$subject->id=='13')){
                                    $subject_data[$subject->id] = iconv(mb_detect_encoding($subject->title), "UTF-8", $subject->title);
                                }
                            }
                            @endphp

                                {{Form::label('subject_1', 'Core Subject 1',['class'=>'col-lg-2 mt-1'])}}
                                {{Form::select('subject_1',$subject_data,null,['class'=>'form-control col-lg-4'])}}
                            </div>
                            <div class="row px-2 pt-3 mr-lg-2" style="width:100%;">
                                {{Form::label('subject_2', 'Core Subject 2',['class'=>'col-lg-2 mt-1'])}}
                                {{Form::select('subject_2',$subject_data,null,['class'=>'form-control col-lg-4'])}}
                            </div>
                            <div class="row px-2 pt-3 mr-lg-2" style="width:100%;">
                                {{Form::label('subject_3', 'Core Subject 3',['class'=>'col-lg-2 mt-1'])}}
                                {{Form::select('subject_3',$subject_data,null,['class'=>'form-control col-lg-4'])}}
                            </div>
                            <div class="row px-2 pt-3 mr-lg-2" style="width:100%;">
                                {{Form::label('subject_4', 'Subject 4',['class'=>'col-lg-2 mt-1'])}}
                                {{Form::select('subject_4',['13'=>'සාමාන්‍ය ඉංග්‍රීසි பொது ஆங்கிலம் General English'],null,['class'=>'form-control col-lg-4'])}}
                            </div>
                            <div class="row px-2 pt-3 mr-lg-2" style="width:100%;">
                                @php 
                                    $gct=[
                                        '12E'=>'General Common Test',
                                        '12S'=>'සාමාන්‍ය පොදු පරීක්ෂණය',
                                        '12T'=>'பொதுச் சாதாரணப் பரீட்சை'
                                    ];
                                @endphp
                                {{Form::label('subject_5', 'Subject 5',['class'=>'col-lg-2 mt-1'])}}
                                {{Form::select('subject_5',$gct,null,['class'=>'form-control col-lg-4'])}}
                            </div>
                            

                            <div class="row px-2 pt-2 mr-lg-2" style="width:100%;">
                                <div class="col-lg-2"></div>
                                {{Form::submit('Enroll Subjects',['class'=>'btn btn-primary col-lg-2 mt-lg-0'])}}
                            </div>
                        </div>
                    {{ Form::close() }}
                @endrole
                @role('Teacher')
                    @php
                        $subject_data;
                        foreach($subjects as $subject){
                            $subject_data[$subject->id] = iconv(mb_detect_encoding($subject->title), "UTF-8", $subject->title);
                        }
                    @endphp
                    {{ Form::open(array('url' => '/lms/account/teachsubject')) }}
                        <div class="row pl-lg-3 pl-4">
                            <div class="row px-2 pt-3 mr-lg-2" style="width:100%;">
                                {{Form::label('subject', 'Subject',['class'=>'col-lg-2 mt-1'])}}
                                {{Form::select('subject',$subject_data,null,['class'=>'form-control col-lg-4'])}}
                            </div>
                            <div class="row px-2 pt-2 mr-lg-2" style="width:100%;">
                                <div class="col-lg-2"></div>
                                {{Form::submit('Teach Subject',['class'=>'btn btn-primary col-lg-2 mt-lg-0'])}}
                            </div>
                        </div>
                    {{ Form::close() }}
                @endrole
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                {{ Form::open(array('url' => '/lms/account/update')) }}
                    <div class="row pl-lg-3 pl-4">
                        <div class="row px-2 pt-3 mr-lg-2" style="width:100%;">
                            {{Form::label('name', 'New Password',['class'=>'col-lg-2 mt-1'])}}
                            {{Form::text('name',null,['class'=>'form-control col-lg-4'])}}
                        </div>
                        <div class="row px-2 pt-2 mr-lg-2" style="width:100%;">
                            {{Form::label('email', 'Confirm Password',['class'=>'col-lg-2 mt-1'])}}
                            {{Form::text('email',null,['class'=>'form-control col-lg-4'])}}
                        </div>
                        <div class="row px-2 pt-2 mr-lg-2" style="width:100%;">
                            <div class='col-lg-2 mt-1'></div>
                            {{Form::button('Change Password',['class'=>'btn btn-primary col-lg-2'])}}
                        </div>
                    </div>
                {{ Form::close() }}
                </div>
            </div>
      </div>
    </div>
@stop