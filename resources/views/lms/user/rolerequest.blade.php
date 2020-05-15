@extends('layouts.lms')
@section('content')
    <div id="page-content-wrapper">
        @include('includes.lms.navbar')
        <div class="container-fluid">
            <h1 class="mt-4">Role Requests</h1>
            Search : <input type="text" class="form-control" id="search" name="search" onkeyup="search()"><br>
            <table class="table table-striped" >
                <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Requested Role</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody id="user-table-row">
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->rolerequest()->first()->role}}</td>
                        <td>
                            {{Form::open(array('url'=>'/lms/rolerequests/accept','class'=>'float-left'))}}
                                {{Form::hidden('user_id',$user->id)}}
                                {{Form::submit('Accept', ['class'=>'btn btn-outline-success'])}}
                            {{Form::close()}}

                            {{Form::open(array('url'=>'/lms/rolerequests/decline','class'=>'float-left ml-2'))}}
                                {{Form::hidden('user_id',$user->id)}}
                                {{Form::submit('Decline', ['class'=>'btn btn-outline-warning'])}}
                            {{Form::close()}}

                            {{Form::open(array('url'=>'/lms/rolerequests/delete','class'=>'float-left ml-2'))}}
                                {{Form::hidden('user_id',$user->id)}}
                                {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                            {{Form::close()}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{--$users->links()--}}
      </div>
    </div>
    <link rel="stylesheet" href="{{asset('css/table-plus.css')}}">
@stop