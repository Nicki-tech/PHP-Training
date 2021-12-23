<?php
require_once 'mysql.php';
$sql = "SELECT first_name, age FROM users;";
$result = $conn->query($sql);

$data = array();
foreach ($result as $row) {
  $data[] = $row;
}

$conn->close();

echo "<script>var data=" . json_encode($data) . ";</script>";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  <script src="js/chart.min.js"></script>
  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/app.js"></script>
  <title>Tutorial_09</title>
  <style>
    #con {
      width: 640px;
      margin: 0 auto;
    }

    p {
      text-align: center;
      font-size: 40px;
    }

    #home a {
      margin-right: 850px;
    }
  </style>
</head>

<body>

  <div id="con">
    <canvas id="myCanvas"></canvas>
    <p>The bar chart shows age of Users</p>
  </div>
  <div id="home">
    <a href="index.php" class="btn btn-success pull-right">Go to home page</a>
  </div>
</body>

</html>