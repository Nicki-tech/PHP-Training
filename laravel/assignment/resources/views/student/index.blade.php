@extends('layouts.app')

@section('content')
<div class="container">
  @if (count($students) > 0)
  <div class="panel panel-default">
    <div class="panel-heading">
      Students List
    <a style="display: inline; color:black;" class="nav-link {{ request()->routeIs('students.create') ? 'hide' : '' }}" href="{{ route('students.create') }}">
            Create Student
    </a>
    </div>

      <table class="table table-dark table-striped">
        <thead>
          <th>Name</th>
          <th>Email</th>
          <th>Major</th>
          <th>Phone</th>
          <th>Address</th>
          <th>Action</th>
        </thead>
        <tbody>
          @foreach ($students as $student)
          <tr>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->major->name }}</td>
            <td>{{ $student->phone }}</td>
            <td>{{ $student->address }}</td>
            <td>
              <a href="{{ route('students.edit', [$student->id]) }}"><span class='glyphicon glyphicon-pencil'></span></a>
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
        </tbody>
      </table>
    </div>
  </div>
  @endif
</div>
@endsection
