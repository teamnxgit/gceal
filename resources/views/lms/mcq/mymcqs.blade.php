@extends('layouts.lms')
@section('content')
    <div id="page-content-wrapper">
        @include('includes.lms.navbar')
        <div class="container-fluid p-3">
            <div class="row px-3">
                <h3 class="heading col-lg-11 px-0">My MCQs</h3>
                <a href="/lms/mcq/new" class="btn btn-success col-lg-1">New</a>
            </div>
            <div class="row px-3">
                Search : <input type="text" class="form-control" id="search" name="search" onkeyup="search()"><br>
            </div>
        </div>
        <div class="p-3">
            <div class="d-none d-xl-block d-lg-block">
                <div class="row bg-dark text-light py-1 mx-1 ">
                    <div class="col-lg-1 text-center"><h5>Unit</h5></div>
                    <div class="col-lg-7 text-center"><h5>Question</h5></div>
                    <div class="col-lg-2 text-center"><h5>Created</h5></div>
                    <div class="col-lg-2 text-center"><h5>Action</h5></div>
                </div>
                
            </div>

            @foreach ($mcqs as $mcq)
                <div class="row border border-dark rounded m-1 mb-3">
                    <div class="col-lg-1 py-1 text-center border-bottom">
                        <div class="d-md-block d-lg-none float-left">
                        <i style="color:#888">Unit : </i>
                        </div>
                        {{$mcq->unit}}
                    </div>
                    <div class="col-lg-7 py-1 text-justify border-bottom">
                        <div class="d-md-block d-lg-none float-left">
                            <i style="color:#888">Question : &nbsp</i>
                        </div>
                        @php echo $mcq->question; @endphp
                    </div>
                    <div class="col-lg-2 py-1 text-center border-bottom">
                        <div class="d-md-block d-lg-none float-left">
                            <i style="color:#888">Created on : </i>
                        </div>
                        {{$mcq->created_at}}
                    </div>
                    <div class="col-lg-2 py-1 text-center border-bottom">
                        <a class="btn btn-outline-dark" href=""><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <a class="btn btn-outline-primary" href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a class="btn btn-outline-danger" href=""><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </div>
                </div>
            @endforeach

            <div class="row text-center p-3 col-lg-12">
                {{$mcqs->links()}}
            </div>

            
        </div>
    </div>
    <script type="application/javascript">
        function search(){
            var keyword = $('#search').val();
            $.ajax({
                type:'POST',
                url:"users/search",
                data:{
                    'email':keyword
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data){
                    $("#user-table-row").html("");
                    $("#user-table-row").html(data);
                    console.log(data);
                }
            });
        }
    </script>
    <link rel="stylesheet" href="{{asset('css/table-plus.css')}}">
@stop