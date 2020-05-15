@extends('layouts.lms')
@section('content')
    <div id="page-content-wrapper">
        @include('includes.lms.navbar')
        <div class="container-fluid">
            <h1 class="mt-4">Users</h1>
            Search : <input type="text" class="form-control" id="search" name="search" onkeyup="search()"><br>
            <table class="table table-striped" >
                <thead class="thead-dark">
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Role</th>
                    <!-- <th>Name</th> -->
                    <!-- <th>Created</th> -->
                </tr>
                </thead>
                <tbody id="user-table-row">
                @foreach ($users as $user)
                    <tr class='accordion-toggle collapsed' id='accordion-{{$user->id}}' data-toggle='collapse' data-parent='#accordion-{{$user->id}}' href='#collapse-{{$user->id}}'>
                        <td class='expand-button font-weight-bold btn-dark btn m-3 p-3'></td>
                        <td>{{$user->id}}</td>
                        <td>{{$user->email}}</td>

                        @forelse ($user->roles as $role)
                            <td>{{$role->name}}</td>
                        @empty
                            <td></td>
                        @endforelse
                        
                        <!-- <td>{{$user->name}}</td> -->
                        <!-- <td>{{$user->created_at}}</td> -->
                        
                    </tr>
                    <tr class='hide-table-padding'>
                        <td colspan="4">
                            <div id="collapse-{{$user->id}}" class="collapse in p-3 ">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card mt-4">
                                            <h6 class="card-header">User Account Information</h6>
                                            <div class="card-text p-4">
                                                <table class="table">
                                                    <tr>
                                                        <td >Username :</td>
                                                        <td>{{$user->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>User ID :</td>
                                                        <td>{{$user->id}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Role :</td>
                                                        @forelse ($user->roles as $role)
                                                            <td>{{$role->name}}</td>
                                                        @empty
                                                            <td></td>
                                                        @endforelse
                                                    </tr>
                                                    <tr>
                                                        <td>Email :</td>
                                                        <td>{{$user->email}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email Verified :</td>
                                                        <td>{{$user->	email_verified_at}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Created :</td>
                                                        <td>{{$user->created_at}}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="card mt-4">
                                            <h6 class="card-header">User Profile</h6>
                                            <div class="card-text p-4">
                                                <div class="text-center">
                                                    <img src="{{asset('storage/user_dp/'.$user->email.'.png')}}" alt="" srcset="" style="height:75px" class="rounded-circle">
                                                    <h6 class="heading mb-0">{{$user->name}}</h6>
                                                    <div class="font-italic text-dark">"The pen is mightier than sword"</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="card mt-4">
                                            <h6 class="card-header">User Access Control</h6>
                                            <div class="card-text p-4">
                                                <div class="btn btn-primary m-1">
                                                    <i aria-hidden="true" class="fa fa-smile-o pr-3"></i>
                                                User Role</div>
                                                <div class="btn btn-primary m-1">
                                                    <i aria-hidden="true" class="fa fa-check pr-3"></i>
                                                User Permissions</div>
                                                <div class="btn btn-warning m-1">
                                                    <i aria-hidden="true" class="fa fa-hand-paper-o pr-3"></i>
                                                Suspend User</div>
                                                <div class="btn btn-danger m-1">
                                                    <i aria-hidden="true" class="fa fa-ban pr-3"></i>
                                                Block User</div>
                                                <div class="btn btn-success m-1">
                                                    <i aria-hidden="true" class="fa fa-check-circle pr-3"></i>
                                                Activate User</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$users->links()}}
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