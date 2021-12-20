<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    form {
      border: 2px solid black;
      text-align: center;
      width: 400px;
      margin: 0 auto;
    }
  </style>
</head>

<body>
  <form action="index.php" method="post">
    <p>
      Username: <input name="username" type="text" value="<?php if (isset($_COOKIE["username"])) {
                                                          } ?>" class="input-field">
    </p>
    <p>Password: <input name="password" type="password" value="<?php if (isset($_COOKIE["password"])) {
                                                                } ?>" class="input-field">
    </p>
    <p><input type="checkbox" name="remember" /> Remember me
    </p>
    <p><input type="submit" value="Login"></span></p>
  </form>
</body>

</html>