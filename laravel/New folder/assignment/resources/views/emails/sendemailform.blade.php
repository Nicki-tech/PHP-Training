<!DOCTYPE html>

<html>

<head>

  <title>Assignment</title>

</head>

<body>


  <table class="table table-dark table-striped">
    <tr>
      <thead>
        <th>Name</th>
        <th>Phone</th>
        <th>Major</th>
    </tr>
    </thead>
    <tbody>
      <tr>
        @foreach($students as $student)
       <td> {{ $student->name }} </td>
       <td> {{ $student->phone }} </td>
       <td> {{ $student->major }} <br></td><br>
        @endforeach
      </tr>
    </tbody>

  </table>
</body>

</html>
