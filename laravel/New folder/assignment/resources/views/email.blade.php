<!DOCTYPE html>
<html>
<head>
    <title>Mail Send in Laravel Example with</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>
    <div class="container">
        <h1>Mail Send in Laravel Example with <a href="https://codingdriver.com/">Coding Driver</a></h1>
        <form action="{{ route('send.email') }}" method="post">
          @csrf
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email">
            </div>

            <div class="form-group">
                <label>Subject:</label>
                <input type="text" name="subject" class="form-control" placeholder="Enter subject">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success save-data">Send</button>
            </div>
        </form>
    </div>
</body>
</html>
