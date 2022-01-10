@extends('layouts.app')
@section('content')
<h1>Student List with Ajax</h1>
<table class="table table-success table-striped" id="first">
    <thead>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Address</th>
      <th>Major</th>
      <th>Action</th>
    </thead>
    <tbody>
    </tbody>
</table>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

        $.ajax({
        type: 'GET',
        url: 'http://localhost:8000/api/getdata',
        success: function (result) {
            result.forEach(students=>{
            $("tbody").append(`<tr>
                <td id="sid">${students.id}</td>
                <td>${students.name}</td>
                <td>${students.email}</td>
                <td>${students.phone}</td>
                <td>${students.address}</td>
                <td>${students.major.name}</td>
                <td>
                    <td><a id="edit-post"
                        data-id="${students.id}" href="/update/${students.id}"
                        class="btn btn-info">Edit</a></td>
                    </td>
                    <td><a id="delete-post"
                        data-id="${students.id}"
                        class="btn btn-danger">Delete</a></td>
                    </td>
                    <td><a href="/api/create/"
                        class="btn btn-info">Add Student</a></td>
                    </td>
                </tr>`);
            });
        console.log(result);
        }
        });

       $(document).on('click','#edit-post',function(){

           var id = $(this).data('id');
           var url = 'http://localhost:8000/api/students/'+id+'/edit';

           $.get(url,{id:id},function (data) {
            console.log(data);
           },'json');
       });


    $(document).on('click', '#delete-post', function (e) {
         e.preventDefault();
        var id = $(this).data("id");
        var _token = $("input[name_token]").val();
        var confirmation = confirm("are you sure?");
        if (confirmation) {
        $.ajax({
            url:'http://localhost:8000/api/delete/'+id,
            type: "DELETE",
            cache:false,
            data:{
            },
            success:function(response){
              $('#sid'+id).remove();
              location.reload();
            }
        });
       }
    });
  });

</script>
@endsection

