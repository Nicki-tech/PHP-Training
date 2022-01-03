@extends('layouts.app')
@section('content')
    {{--<div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD Example from scratch - laravelcode.com</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>
            </div>
        </div>
    </div>--}}

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>DOB</th>
            <th>Major</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($students as $key)
        <tr>
            <td> {{ $key->name }}</td>
            <td> {{ $key->phone }}</td>
            <td> {{ $key->email }}</td>
            <td> {{ $key->dob }}</td>
            <td> {{ $key->major_id }}</td>
        </tr>
        @endforeach
    </table>
@endsection
