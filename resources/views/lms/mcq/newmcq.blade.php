@extends('layouts.lms')
@section('content')
    <div id="page-content-wrapper">
        @include('includes.lms.navbar')
        <div class="container-fluid p-3">
            <h3 class="heading">Multiple Choise Question</h3>
            {{Form::open(array('url' => '/lms/mcq/update'))}}

            <div class="row p-3">
                {{Form::label('subject', 'Subject',['class'=>'col-lg-2'])}}
                {{Form::text('subject',$subjectName,['class'=>'form-control col-lg-9', 'readonly'])}}
            </div>
            
            @php
                foreach($units as $unit){
                    echo $unit->name;
                }
            @endphp

            <div class="row p-3 pt-0">
                {{Form::label('unit', 'Unit',['class'=>'col-lg-2'])}}
                {{Form::text('unit',null,['class'=>'form-control col-lg-9'])}}
            </div>

            <div class="row p-3 pt-0">
                {{Form::label('ques', 'Question',['class'=>'col-lg-2'])}}
                {{Form::textarea('question','',['class'=>'form-control col-lg-9','id'=>'question'])}}
            </div>

            <div class="row p-3 pt-lg-0">
                <div class="col-lg-2"></div>
                {{Form::button('Editor',['class'=>'btn btn-primary col-lg-1 mt-lg-0','onclick'=>'setEditor("textarea#question")'])}}
            </div>

            <div class="row p-3 pt-0">
                {{Form::label('ans1', 'Ansewer 1',['class'=>'col-lg-2'])}}
                {{Form::textarea('answer_1','',['class'=>'form-control col-lg-9','id'=>'answer_1'])}}
            </div>
            <div class="row p-3 pt-lg-0">
                <div class="col-lg-2"></div>
                {{Form::button('Editor',['class'=>'btn btn-primary col-lg-1 mt-lg-0','onclick'=>'setEditor("textarea#answer_1")'])}}
            </div>

            <div class="row p-3 pt-0">
                {{Form::label('ans2', 'Ansewer 2',['class'=>'col-lg-2'])}}
                {{Form::textarea('answer_2','',['class'=>'form-control col-lg-9','id'=>'answer_2'])}}
            </div>
            <div class="row p-3 pt-lg-0">
                <div class="col-lg-2"></div>
                {{Form::button('Editor',['class'=>'btn btn-primary col-lg-1 mt-lg-0','onclick'=>'setEditor("textarea#answer_2")'])}}
            </div>

            <div class="row p-3 pt-0">
                {{Form::label('ans3', 'Ansewer 3',['class'=>'col-lg-2'])}}
                {{Form::textarea('answer_3',null,['class'=>'form-control col-lg-9','id'=>'answer_3'])}}
            </div>
            <div class="row p-3 pt-lg-0">
                <div class="col-lg-2"></div>
                {{Form::button('Editor',['class'=>'btn btn-primary col-lg-1 mt-lg-0','onclick'=>'setEditor("textarea#answer_3")'])}}
            </div>

            <div class="row p-3 pt-0">
                {{Form::label('ans4', 'Ansewer 4',['class'=>'col-lg-2'])}}
                {{Form::textarea('answer_4',null,['class'=>'form-control col-lg-9','id'=>'answer_4'])}}
            </div>
            <div class="row p-3 pt-lg-0">
                <div class="col-lg-2"></div>
                {{Form::button('Editor',['class'=>'btn btn-primary col-lg-1 mt-lg-0','onclick'=>'setEditor("textarea#answer_4")'])}}
            </div>

            <div class="row p-3 pt-0">
                {{Form::label('ans5', 'Ansewer 5',['class'=>'col-lg-2'])}}
                {{Form::textarea('answer_5',null,['class'=>'form-control col-lg-9','id'=>'answer_5'])}}
            </div>
            <div class="row p-3 pt-lg-0">
                <div class="col-lg-2"></div>
                {{Form::button('Editor',['class'=>'btn btn-primary col-lg-1 mt-lg-0','onclick'=>'setEditor("textarea#answer_5")'])}}
            </div>
            
            <div class="row p-3 pt-0">
                {{Form::label('cans', 'Correct Answer',['class'=>'col-lg-2'])}}
                {{Form::select('correct_answer', ['1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5], null, ['class' => 'form-control col-lg-9']) }}
            </div>

            <div class="row p-3 pt-0">
                {{Form::label('exp', 'Explanation',['class'=>'col-lg-2'])}}
                {{Form::textarea('explanation',null,['class'=>'form-control col-lg-9','id'=>'explanation'])}}
            </div>
            <div class="row p-3 pt-lg-0">
                <div class="col-lg-2"></div>
                {{Form::button('Editor',['class'=>'btn btn-primary col-lg-1 mt-lg-0','onclick'=>'setEditor("textarea#explanation")'])}}
            </div>

            <div class="row p-3 pt-0">
                {{Form::label('note', 'Note',['class'=>'col-lg-2'])}}
                {{Form::text('note',null,['class'=>'form-control col-lg-9','id'=>'note'])}}
            </div>

            <div class="row p-3 pt-0">
                <div class="col-lg-2"></div>
                {{Form::submit('Save MCQ',['class'=>'btn btn-success col-lg-2 mt-2 mt-lg-0'])}}
            </div>

            {{Form::close()}}
        </div>
    </div>

@stop