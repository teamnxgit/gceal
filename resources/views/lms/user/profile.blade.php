
@php
    $about=null;
    $dob=null;
    $studied_at=null;
    $higher_studies=null;
    $graduated_in=null;
    $work_place=null;
    $work_designation=null;
    
    if(isset($profile)){
        if(isset($profile->about)){
            $about = $profile->about;
        }
        if(isset($profile->dob)){
            $dob=$profile->dob;
        }
        if(isset($profile->studied_at)){
            $studied_at=$profile->studied_at;
        }
        if(isset($profile->higher_studies)){
            $higher_studies=$profile->higher_studies;
        }
        if(isset($profile->graduated_in)){
            $graduated_in=$profile->graduated_in;
        }
        if(isset($profile->work_place)){
            $work_place=$profile->work_place;
        }
        if(isset($profile->work_designation)){
            $work_designation=$profile->work_designation;
        }
    }
    
@endphp

@extends('layouts.lms')
@section('content')
    <div id="page-content-wrapper">
        @include('includes.lms.navbar')
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 p-0 m-0" id="wall">
                    @if(public_path().asset('storage/cover/'.Auth::user()->email.'.jpg'))
                        <img src="{{asset('storage/cover/'.Auth::user()->email.'.jpg')}}" alt="" srcset="" style="width:100%;">
                    @else
                        <img src="{{asset('storage/cover/cover.jpg')}}" alt="" srcset="" style="width:100%;">
                    @endif
                </div>
                <div class="col-lg-12 p-0 m-0 text-center text-lg-left pl-lg-5" style="z-index:100;margin-top:-60px !important;">
                    <img src="{{asset('storage/user_dp/'.Auth::user()->email.'.png')}}" alt="" srcset="" class="rounded-circle" style="width:120px;border: 5px solid #fff;box-shadow: 0px 2px 5px 2px rgba(0,0,0,0.3);">
                </div>
            </div>
            <div class="row bg-light" style="z-index:100;margin-top:-55px;">
                
            </div>
            <div class="row d-lg-none bg-light" style="height:60px;"></div>
            <div class="row">
                <div class="row col-lg-12 p-0 m-0 bg-light " style="min-height: 90px;box-shadow: 0px 1px 1px 0px rgba(0,0,0,0.3);">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-2" style="border-right: 1px solid #eee;border-image: linear-gradient(to bottom, #fff, #e5e5e5, #fff) 1 100%;">
                        <h5 class="pt-3 mb-0 text-center text-lg-left">{{Auth::user()->name}}</h5>
                        <div class="p-0 m-0 text-center text-lg-left" data-toggle="tooltip" title="Verified Profile">{{Auth::user()->roles()->first()->name}} <!--<i aria-hidden="true" class="text-success fa fa-check-circle pr-3"></i>--></div>
                    </div>
                    <div class="col-lg-4" style="border-right: 1px solid #eee;border-image: linear-gradient(to bottom, #fff, #e5e5e5, #fff) 1 100%;">
                        <h5 class="p-3 text-center">Information & Communication Technology</h5>
                    </div>
                    <div class="col-lg-1" style="border-right: 1px solid #eee;border-image: linear-gradient(to bottom, #fff, #e5e5e5, #fff) 1 100%;">
                        <h5 class="pt-4 pb-0 mb-0 text-center text-primary">3</h5>
                        <div class="text-center pb-3">Posts</div>
                    </div>
                    <div class="col-lg-1" style="border-right: 1px solid #eee;border-image: linear-gradient(to bottom, #fff, #e5e5e5, #fff) 1 100%;">
                        <h5 class="pt-4 pb-0 mb-0 text-center text-danger">30K</h5>
                        <div class="text-center p-0 m-0 pb-3">Subscribers</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card mt-3">
                        <h6 class="card-header">Profile</h6>
                        <div class="card-text p-3">
                        {{ Form::open(array('url' => '/lms/profile/update')) }}
                            <div class="row px-2 pt-2 mr-lg-2">
                                {{Form::label('about', 'About you',['class'=>'col-lg-3 mt-1'])}}
                                {{Form::text('about',$about,['class'=>'form-control col-lg-9'])}}
                            </div>
                            <div class="row px-2 pt-2 mr-lg-2">
                                {{Form::label('dob', 'Born',['class'=>'col-lg-3 mt-1'])}}
                                {{Form::date('dob',$dob,['class'=>'form-control col-lg-9'])}}
                            </div>
                           <div class="row px-2 pt-2 mr-lg-2">
                                {{Form::label('school', 'School Studied',['class'=>'col-lg-3 mt-1'])}}
                                {{Form::text('studied_at',$studied_at,['class'=>'form-control col-lg-9'])}}
                           </div>
                           <div class="row px-2 pt-2 mr-lg-2">
                                {{Form::label('higher_study', 'University/College Studied',['class'=>'col-lg-3 mt-1'])}}
                                {{Form::text('higher_studies',$higher_studies,['class'=>'form-control col-lg-9'])}}
                           </div>
                           <div class="row px-2 pt-2 mr-lg-2">
                                {{Form::label('garduated_in', 'Graduated In',['class'=>'col-lg-3 mt-1'])}}
                                {{Form::number('graduated_in',$graduated_in,['class'=>'form-control col-lg-9'])}}
                           </div>
                           <div class="row px-2 pt-2 mr-lg-2">
                                {{Form::label('working_place', 'Working at',['class'=>'col-lg-3 mt-1'])}}
                                {{Form::text('work_place',$work_place,['class'=>'form-control col-lg-9'])}}
                           </div>
                           <div class="row px-2 pt-2 mr-lg-2">
                                {{Form::label('work_designation', 'Working as',['class'=>'col-lg-3 mt-1'])}}
                                {{Form::text('work_designation',$work_designation,['class'=>'form-control col-lg-9'])}}
                           </div>
                           <div class="row px-2 pt-2 mr-lg-2">
                               <div class="col-lg-3"></div>
                               <div class="col-lg-9 text-right pr-0">
                                {{Form::submit('Update', ['class'=>'btn btn-primary'])}}
                               </div>
                                
                            </div>
                        {{ Form::close() }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mt-3">
                        <h6 class="card-header">Preview</h6>
                        <div class="card-text p-3">
                            <div class="card">
                                <div class="card-header">Membership</div>
                                <div class="card-text p-3">
                                    <p>
                                        <i aria-hidden="true" class="fa fa-handshake-o px-2"></i> Joint GCEAL.org in {{Auth::user()->created_at->format('Y')}}
                                    </p>
                                </div>
                            </div>
                            <div class="card mt-3">
                                <div class="card-header">About</div>
                                <div class="card-text p-3">
                                    <p class="">
                                        @php
                                            if(isset($profile)){
                                                echo $profile->about;
                                            }
                                        @endphp
                                    </p>
                                </div>
                            </div>
                            <div class="card mt-3">
                                <div class="card-header">Profile</div>
                                <div class="card-text p-3">
                                    <p>
                                        <i aria-hidden="true" class="fa fa-book px-2"></i> Studied at {{$studied_at}}
                                    </p>
                                    <p>
                                        <i aria-hidden="true" class="fa fa-graduation-cap px-2"></i> Graduated from {{$higher_studies}} in {{$graduated_in}}
                                    </p>
                                    <p>
                                        <i aria-hidden="true" class="fa fa-briefcase px-2"></i> Works as {{$work_designation}} in {{$work_place}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop