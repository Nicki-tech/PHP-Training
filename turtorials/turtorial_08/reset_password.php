<?php
require_once "mysql.php";

if (isset($_GET["code"])) {
 
   $code = $_GET["code"];  
   $getEmailquery = mysqli_query($conn, "SELECT email from password_reset_temp where code = '$code'");  if (mysqli_num_rows($getEmailquery) == 0) {
    exit("can't find page");
  }
}
if(isset($_POST["password"])){
  $pw = $_POST["password"];
  $pw = md5($pw);
  $row = mysqli_fetch_array($getEmailquery);
  $email = $row["email"];
  $query = mysqli_query($conn, "UPDATE members_table SET password='$pw' WHERE email = '$email'");

 if($query){
    $query = mysqli_query($conn, "DELETE from password_reset_temp where code = '$code'");
    exit("Password Updated");
 }
 else {
    exit("Something went wrong");
 }
}
?>

<form method="POST">
<input type="password" name="password" placeholder="New Password">
<br>
<input type="submit" name="submit" value="Update password">
</form>