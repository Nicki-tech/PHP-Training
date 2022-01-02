<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../turtorial_08/PHPMailer/src/Exception.php';
require '../turtorial_08/PHPMailer/src/PHPMailer.php';
require '../turtorial_08/PHPMailer/src/SMTP.php';
require '../turtorial_08/mysql.php';

      if (isset($_POST["email"])) {
       $emailTo = $_POST["email"];
       $code = uniqid(true);
       $query = mysqli_query($conn, "INSERT into password_reset_temp(code,email) VALUES('$code','$emailTo')");
      // if($query){
      //   exit("error");
      // }
       $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'yunthiri1998@gmail.com';
            $mail->Password = "secret";
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;

            $mail->setfrom('yunthiri1998@gmail.com', 'Reset Password');
            $mail->addAddress($emailTo);
            $mail->addreplyto('no-reply@yourname.com', 'No reply');

            $url = "http://localhost:8000" . "/reset_password.php?code=$code";
            $mail->isHTML(true);
            $mail->Subject = 'Your Password Reset Link';
            $mail->Body    = "<h1>Password reset for your account...</h1>Click <a href='$url'>this link</a> to do so";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();

            echo "Message has been sent";
        } catch (Exception $e) {
            echo "Mailer Error: " , $mail->ErrorInfo;
        }
      }
?>
<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
      <title>Send Reset Password Link with Expiry Time in PHP MySQL</title>
       <!-- CSS -->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   </head>
   <body>
      <div class="container">
          <div class="card">
            <div class="card-header text-center">
              Send Reset Password Link
            </div>
            <div class="card-body">
              <form method="post">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <input type="submit" name="password-reset-token" class="btn btn-primary">
              </form>
            </div>
          </div>
      </div>
 
   </body>
</html>