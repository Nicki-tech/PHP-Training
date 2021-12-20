<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Turtorial-06</title>
  <style>
    body {
      margin: 0 auto;
      width: 500px;
    }

    form {
      margin: 40px 0;
      padding: 20px 50px;
      border: 1px solid black;
    }

    form input {
      margin: 10px 0;
    }
  </style>
</head>

<body>
  <form action="#" method="post" enctype="multipart/form-data">

    <label>Enter the folder name:</label>
    <input type="text" name="foldername">
    <br>
    <input type="file" name="files[]" id="files">
    <br>
    <input type="submit" name="submit" value="Upload">

  </form>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
  if ($_POST['foldername'] != "") {
    $foldername  = $_POST['foldername'];
    if (!is_dir($foldername));
    mkdir($foldername);
    foreach ($_FILES['files']['name'] as $i => $name) {
      if (strlen($_FILES['files']['name'][$i]) > 1) {
        move_uploaded_file($_FILES['files']['tmp_name'][$i], $foldername . '/' . $name);
      }
    }
    echo "Folder is successfully uploaded.";
  } else
    echo "Uploaded foldername is not set";
}
?>