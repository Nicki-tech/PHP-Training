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
