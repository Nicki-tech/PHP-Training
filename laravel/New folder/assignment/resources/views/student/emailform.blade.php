@extends('layouts.app')

@section('content')
<div class="row mt-5">
  <div class="col-12">
    <div class="float-start">
      <h2>Send  email</h2>
    </div>

  </div>
</div>
<form action="{{route('sendEmailForm')}}" method="post">
  @csrf
  <div class="row">
      <div class="form-group">
        <strong>Email:</strong>
        <input type="email" name="email" class="form-control" placeholder="Email">
        @error('email')
        <span class="alert alert-danger mt-1 mb-1 d-block">
          {{ $message }}
        </span>
        @enderror
      </div>
    </div>
      <button type="submit" class="btn btn-primary mt-3">Submit</button>
    <div class="float-end">
        <a class="btn btn-success" href="{{ url('/') }}">Back</a>
      </div>
  </div>
</form>
@endsection
