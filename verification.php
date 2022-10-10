<?php
include("registration.php");
if(empty($_SESSION["mai"]))
{header('location:index.php');}
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="style.css">

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Verification</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Verification Account</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Verification Account</div>
                    <div class="card-body">
                        <form action="#" method="POST">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">6-Digit Verification Code</label>
                                <div class="col-md-6">
                                    <input type="text" id="otp" class="form-control" name="otp_code" required autofocus>
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Verify" name="verify">
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>
</body>
</html>
<?php
    include('connection.php');
    if(isset($_POST["verify"])){
        $hashk = $_SESSION['hash'];
        $email = $_SESSION['mai'];
        $otp_code = $_POST['otp_code'];
        $curDate = date("Y-m-d H:i:s");
        $query = mysqli_query($connect, "SELECT * FROM forgot WHERE token='$hashk' and username='$email';");
        $row = mysqli_fetch_assoc($query);
         if ($row["expDate"] >= $curDate) {
          if(!password_verify($otp_code, $row["token"])){
            ?>
           <script>
               alert("Invalid Verification code");
           </script>
           <?php
        }else{
            mysqli_query($connect, "UPDATE signup SET status = 1 WHERE email = '$email'");
            mysqli_query($connect, "DELETE FROM forgot WHERE username = '$email'");
            ?>
             <script>
                 alert("Verfiy account done, you may sign in now");
                   window.location.replace("index.php");

             </script>
             <?php
             session_unset();
             session_destroy();
            unset($_SESSION['mai']);
        }
      }
      else {?>

        <script>
            alert("<?php echo "Your Reset link is Expired so try to resend another link"?>");
            window.location.replace("forgot.php");
        </script>
    <?php
    session_unset();
    session_destroy();
   unset($_SESSION['mai']); }
    }

?>
