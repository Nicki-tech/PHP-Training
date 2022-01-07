{{--@extends('layouts.app')
@section('content')
<div class="search" style="margin-left: 120px;margin-bottom: 20px;">
    <form action="{{ route('student.search')}}">
    @csrf
    <label>Name</label>
    <input type="text" name="name" id="name">
    <label>Start Date :</label>
    <input type="text" name="s_date">
    <label>End Date :</label>
    <input type="text" name="e_date">
    <input type="submit" name="submit" value="Search">
    </form>
</div>

<table class="table table-dark table-striped">
    <thead>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Address</th>
      <th>Major</th>
      <th>Date</th>
      <th>Action</th>
    </thead>
    <tbody>
      @foreach ($students as $student)
      <tr>
        <td>{{ $student->name }}</td>
        <td>{{ $student->email }}</td>
        <td>{{ $student->phone }}</td>
        <td>{{ $student->address }}</td>
        <td>{{ $student->major->name }}</td>
        <td>{{ $student->created_at}}</td>

      </tr>
      @endforeach
    </tbody>
</table>

@endsection
--}}
