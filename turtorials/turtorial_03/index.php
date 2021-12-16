<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Turtorial_04</title>
  <style>
    body {
      width: 400px;
      margin: 100px auto;
    }

    .submit {
      padding: 10px 112px;
    }
  </style>
</head>

<body>
  <form action="" method="post">
    Choose of birthdate :
    <input type="date" name="bdname"><br><br>
    <input type="submit" name="submit-dob" value="Calculate" class="submit"><br><br>
  </form>
  <?php
  if (isset($_POST['submit-dob'])) {
    $dob = $_POST['bdname'];
    $today = date("Y-m-d");
    $diff = date_diff(date_create($dob), date_create($today));
    echo 'You are ' . $diff->format('%y') . " years old.";
  }
  ?>
</body>

</html>