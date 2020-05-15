@extends('layouts.lms')
@section('content')
    <div id="page-content-wrapper">
        @include('includes.lms.navbar')
        <div class="container-fluid p-3">
            <h3 class="heading">New Activity</h3>
            {{Form::open(array('url' => '/lms/activity/update'))}}

            <div class="row p-3">
                {{Form::label('subject', 'Subject',['class'=>'col-lg-2'])}}
                {{Form::text('subject',$subjectName,['class'=>'form-control col-lg-9','readonly'])}}
            </div>

            <div class="row p-3 pt-0">
                {{Form::label('title', 'Title',['class'=>'col-lg-2'])}}
                {{Form::text('title',null,['class'=>'form-control col-lg-9'])}}
            </div>

            <div class="row p-3 pt-0">
                {{Form::label('description', 'Description',['class'=>'col-lg-2'])}}
                {{Form::textarea('description','',['class'=>'form-control col-lg-9','id'=>'question'])}}
            </div>

            <div class="row p-3 pt-0">
                <div class="col-lg-2"></div>
                {{Form::submit('Save Activity',['class'=>'btn btn-success col-lg-2 mt-2 mt-lg-0'])}}
            </div>

            {{Form::close()}}
        </div>
    </div>

@stop