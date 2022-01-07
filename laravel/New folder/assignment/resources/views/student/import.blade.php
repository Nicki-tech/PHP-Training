@extends('layouts.app')
@section('content')
<div class="card-body">
  <form action="{{ route('student.import') }}" method="post" enctype="multipart/form-data">
    @csrf
    <h2>Import</h2>
    <p>Choose file to import</p>
    <input type="file" name="file">
    <br>
    <button class="btn btn-success">Import</button>
  </form>
</div>

@endsection
