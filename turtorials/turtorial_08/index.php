<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Turtorial_08</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  <style type="text/css">
    .wrapper {
      width: 1200px;
      margin: 0 auto;
    }

    a {
      margin: 0 10px;
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <div class="container-fluid">
      <div class="row">
        <h2 class="text-center">PHP CRUD Tutorial</h2>
        <div class="col-md-12">
          <div class="page-header clearfix">
            <h2 class="pull-left">Users</h2>
            <a href="create.php" class="btn btn-success pull-right">Add New User</a>
            <a href="chart.php" class="btn btn-success pull-right">Graph</a>
          </div>
          <?php
          // Include config file
          require_once "mysql.php";

          // select all users
          $data = "SELECT * FROM users";
          if ($users = mysqli_query($conn, $data)) {
            if (mysqli_num_rows($users) > 0) {
              echo "<table class='table table-bordered table-striped'>
                                    <thead>
                                      <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Lastname</th>
                                        <th>Phone Number</th>
                                        <th>Email Number</th>
                                        <th>Address</th>
                                        <th>Age</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>";
              while ($user = mysqli_fetch_array($users)) {
                echo "<tr>
                                            <td>" . $user['id'] . "</td>
                                            <td>" . $user['first_name'] . "</td>
                                            <td>" . $user['last_name'] . "</td>
                                            <td>" . $user['email'] . "</td>
                                            <td>" . $user['phone_number'] . "</td>
                                            <td>" . $user['address'] . "</td>
                                            <td>" . $user['age'] . "</td>
                                            <td>
                                              <a href='edit.php?id=" . $user['id'] . "' title='Edit User' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>
                                              <a href='delete.php?id=" . $user['id'] . "' title='Delete User' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>
                                            </td>
                                          </tr>";
              }
              echo "</tbody>
                                </table>";
              mysqli_free_result($users);
            } else {
              echo "<p class='lead'><em>No records found.</em></p>";
            }
          } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
          }

          // Close connection
          mysqli_close($conn);
          ?>
        </div>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/chart.min.js"></script>
  <script src="js/app.js"></script>
</body>

</html>