@extends('layouts.lms')
@section('content')
    <div id="page-content-wrapper">
        @include('includes.lms.navbar')
        <div class="container-fluid p-3">
            <div class="row px-3">
                <h3 class="heading col-lg-10 px-0">My Activities</h3>
                <a href="/lms/activity/new" class="btn btn-success col-lg-2">New Activity</a>
            </div>
            <div class="row px-3">
                Search : <input type="text" class="form-control" id="search" name="search" onkeyup="search()"><br>
            </div>
        </div>
        <div class="p-3">
            <div class="d-none d-xl-block d-lg-block">
                <div class="row bg-dark text-light py-1 mx-1 ">
                    <div class="col-lg-1 text-center"><h5>ID</h5></div>
                    <div class="col-lg-5 text-center"><h5>Activity Name</h5></div>
                    <div class="col-lg-4 text-center"><h5>Description</h5></div>
                    <div class="col-lg-2 text-center"><h5>Action</h5></div>
                </div>
            </div>

            @foreach ($activities as $activity)
                <div class="row border border-dark rounded m-1 mb-3">
                    <div class="col-lg-1 py-1 text-center border-bottom">
                        {{$activity->id}}
                    </div>
                    <div class="col-lg-5 py-1 text-center border-bottom">
                        {{$activity->title}}
                    </div>
                    <div class="col-lg-4 py-1 text-justify border-bottom">
                        {{$activity->description}}
                    </div>
                    <div class="col-lg-2 py-1 text-center border-bottom">
                        <a class="btn btn-outline-dark" href="/lms/activity/{{$activity->id}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <a class="btn btn-outline-primary" href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a class="btn btn-outline-danger" href=""><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </div>
                </div>
            @endforeach

            <div class="row text-center p-3 col-lg-12">
                {{$activities->links()}}
            </div>

            
        </div>
    </div>
    
    <link rel="stylesheet" href="{{asset('css/table-plus.css')}}">
@stop