@extends('layouts.app')

@section('content')
    <div class="row mt-5">
        <div class="col-12">
            <div class="float-start" style="margin-left: 30px">
                <h2>Send email</h2>
            </div>

        </div>
    </div>
    <form action="{{ route('sendEmailForm') }}" method="post" style="margin-left: 50px">
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
        <a href="{{ url('/') }}"><button type="submit" class="btn btn-primary mt-3">Back</button></a>

        </div>
    </form>
@endsection
