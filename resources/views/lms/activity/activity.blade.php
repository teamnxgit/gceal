@extends('layouts.lms')
@section('content')
    <div id="page-content-wrapper">
        @include('includes.lms.navbar')
        <div class="container-fluid p-3">
            <div class="card ">
                <div class="card-header">
                    <h3 class="">Activity : {{$activity->title}}</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Type</th>
                                <th>Description</th>
                                <th colspan='2'>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $n=1; ?>
                                @foreach($contents as $content)
                                    <tr>
                                        <td>{{$n}}</td>
                                        <td>{{substr($content->contentable_type,4)}}</td>
                                        
                                        @if($content->contentable_type=='App\Mcq')
                                            <td>@php echo $content->contentable->question @endphp</td>
                                        @endif
                                        <td>
                                            <a class="btn btn-primary " href="">
                                                <i aria-hidden="true" class="fa fa-pencil"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn btn-danger " href="">
                                                <i aria-hidden="true" class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $n++; ?>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <td colspan="5" class="text-center">
                                    <a class="btn btn-primary text-light mt-2" data-toggle="modal" data-target="#MCQModal">Add MCQ</a>
                                    <a class="btn btn-primary text-light mt-2">Add Article</a>
                                    <a class="btn btn-primary text-light mt-2">Add Question</a>
                                </td>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="MCQModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add MCQ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="MCQModal">
                        <div class="col-lg-2 float-left mt-1">Search</div>
                        {{Form::text('search_mcq',null,['class'=>'form-control col-lg-9 mt-0 mb-2 float-left','id'=>'search_mcq'])}}
                        <div class="col-lg-2 float-left mt-1">Unit</div>
                        {{Form::select('unit_mcq',$mcq_units,null,['class'=>'form-control col-lg-9 mt-0 mb-2 float-left','id'=>'unit_mcq'])}}
                        <table class="table table-responsive" id="MCQTable">
                            <thead class="thead thead-primary">
                                <tr>
                                    <td colspan="3">
                                        {{$mcqs->links()}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Unit</td>
                                    <td>Question</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mcqs as $mcq)
                                    <tr>
                                        <td>{{$mcq->unit}}</td>
                                        <td>@php echo $mcq->question @endphp</td>
                                        <td><a class="btn btn-success text-light" href="/lms/activity/{{$activity->id}}/add/mcq/{{$mcq->id}}">Add</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        <table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="application/javascript">
        $(document).ready(function(){
            $(document).on('click','#MCQModal .pagination a',function(event){
                event.preventDefault();
                var page_no = $(this).attr('href').split('page=')[1];
                var keyword = $("#search_mcq").val();
                var unit = $("#unit_mcq").val();
                var activity_id = $(location).attr('href').split("activity/")[1].split("?")[0];
                $.ajax({
                    data: { unit: unit, keyword: keyword },
                    url:"/lms/activity/"+activity_id+"/fetch/mcq"+"?page="+page_no,
                    headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success:function(data){
                        $('#MCQTable').html(data);
                    }
                });
            });
            $(document).on('change','#MCQModal #unit_mcq',function(event){
                event.preventDefault();
                var keyword = $("#search_mcq").val();
                var unit = $("#unit_mcq").val();
                var activity_id = $(location).attr('href').split("activity/")[1].split("?")[0];
                $.ajax({
                    data: { unit: unit, keyword: keyword },
                    url:"/lms/activity/"+activity_id+"/fetch/mcq",
                    headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success:function(data){
                        $('#MCQTable').html(data);
                    }
                });
            });
            $(document).on('keyup','#MCQModal #search_mcq',function(event){
                var keyword = $("#search_mcq").val();
                var unit = $("#unit_mcq").val();
                var activity_id = $(location).attr('href').split("activity/")[1].split("?")[0];
                $.ajax({
                    data: { unit: unit, keyword: keyword },
                    url:"/lms/activity/"+activity_id+"/fetch/mcq",
                    headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success:function(data){
                        $('#MCQTable').html(data);
                    }
                });
            });
        });
    </script>
@stop