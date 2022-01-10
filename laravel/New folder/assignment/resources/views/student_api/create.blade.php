@extends('layouts.app')
@section('content')

<div class="container">
  <div class="card mb-5">
    <div class="card-header">Add Student</div>
    <div class="col-md-8 mx-auto p-5">
     <span class="success" style="color:green; margin-top:10px; margin-bottom: 10px;"></span>
      <form id="ajaxform" action="{{route('savestudent')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" autofocus>
          @if ($errors->has('name'))
          <span class="text-danger">{{ $errors->first('name') }}</span>
          @endif
        </div>
        <div class="form-group">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" value="{{ old('email') }}" name="email">
          @if ($errors->has('email'))
          <span class="text-danger">{{ $errors->first('email') }}</span>
          @endif
        </div>
        <div class="form-group">
          <label for="major" class="form-label">Major</label>
          <select class="browser-default custom-select" size="1" name="major" id="major">
            @foreach ($majors as $major)
            @if (old('major') == $major->id)
            <option value="{{ $major->id }}" selected>{{ $major->name }}</option>
            @else
            <option value="{{$major->id}}">{{ $major->name }}</option>
            @endif
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="phone" class="form-label">Phone</label>
          <input type="tel" class="form-control" id="phone" value="{{ old('phone') }}" name="phone">
          @if ($errors->has('phone'))
          <span class="text-danger">{{ $errors->first('phone') }}</span>
          @endif
        </div>
        <div class="form-group">
          <label for="address" class="form-label">Address</label>
          <textarea class="form-control" name="address" id="address">{{ old('address') }}</textarea>
          @if ($errors->has('address'))
          <span class="text-danger">{{ $errors->first('address') }}</span>
          @endif
        </div>
        <button type="submit" class="btn btn-success save-data" id="savestudent" href={{route('student_api.shows')}}>
          Add Student
        </button>
        <button type="submit" class="btn btn-success">
         <a style = "color: white; text-decoration: none;"href="{{ route('student_api.shows') }}">
            Back </a>
         </button>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            $("#savestudent").click(function() {
            $.ajax({
                type: 'post',
                url: '/store',
                data: {
                   'name':$("#name").val(),
                   'email':$("#email").val(),
                   'major':$("#major").val(),
                   'phone':$("#phone").val(),
                   'address':$("#address").val()
                },
                success: function(data) {
                alert('success');
                },
            });
                var name =$("#name").val();
                var email = $("#email").val();
                var major = $("#major").val();
                var phone =$("#phone").val();
                var address = $("#address").val();
            });


    });
</script>


@endsection
