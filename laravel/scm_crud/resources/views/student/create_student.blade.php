@extends('layout.app')
@section('content')
<form action="{{route('create_stu')}}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="name" class="form-control" id="name">
    </div>
    <div class="mb-3">
      <label for="phone" class="form-label">Phone</label>
      <input type="phone" class="form-control" id=phone">
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="address" class="form-control" id="address">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email">
      </div>
      <div class="form-group">
        <label for="major" class="form-label">Major</label>
        <select class="browser-default custom-select" size="1" name="major">
          @foreach ($majors as $major)
          @if (old('major') == $major->id)
          <option value="{{ $major->id }}" selected>{{ $major->name }}</option>
          @else
          <option value="{{$major->id}}">{{ $major->name }}</option>
          @endif
          @endforeach
        </select>
      </div>
    <button type="submit" class="btn btn-primary">Create</button>
  </form>
@endsection
