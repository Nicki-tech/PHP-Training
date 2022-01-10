@extends('layouts.app')
@section('content')

<div class="table-responsive text-center">
    <table class="table table-borderless" id="table">
        <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Major</th>
                <th>Date</th>
                <th>Action</th>
        </thead>
        @foreach ($students as $student)
        <tr>
          <td>{{ $student->name }}</td>
          <td>{{ $student->email }}</td>
          <td>{{ $student->phone }}</td>
          <td>{{ $student->address }}</td>
          <td>{{ $student->major->name}}</td>
          <td>{{ $student->created_at}}</td>
          <td>
            <a href="{{ route('edit', [$student->id]) }}"><span class='glyphicon glyphicon-pencil'></span></a>
            <a href="" style="display: inline;"><form action="{{ route('students.destroy', [$student->id]) }}" onclick="return confirm('Are you sure?')" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm delete"><span class='glyphicon glyphicon-trash'>
                </span>
             </a>
            </form>
          </td>
        </tr>
        @endforeach
    </table>
</div>

@endsection
