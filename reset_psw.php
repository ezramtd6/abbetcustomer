<?php
include('connection.php');
include("registration.php");
  $sesc=$_SESSION['email'];
  $xi=mysqli_query($connect, "SELECT * FROM forgot where username ='$sesc';");
  $ti=mysqli_fetch_assoc($xi);
  $t0=$ti["token"];
if(empty($_SESSION['email']) or !isset($_GET["ti"])){
if(empty($_GET["password"])){
  ?>
  <script>
      window.location.replace('forgot.php');
  </script>
<?php

}
else if($t0 != $_GET["password"]){?>
<script>
window.location.replace('forgot.php');
</script>
<?php
}

}
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!Doctype html>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <title>Login Form</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Password Reset Form</a>
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
                    <div class="card-header">Reset Your Password</div>
                    <div class="card-body">
                        <form action="#" method="POST" name="login">

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required autofocus>
                                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                                </div>
                                <label for="password" class="col-md-4 col-form-label text-md-right">Repeat Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password1" class="form-control" name="password1" required autofocus>
                                    <i class="bi bi-eye-slash" id="togglePassword1"></i>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Reset" name="reset">
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
    if(isset($_POST["reset"])){
        include('connection.php');
        $psw = $_POST["password"];
        $psw1=$_POST["password1"];
        $token = $_SESSION['token'];
        $Email = $_SESSION['email'];
        $curDate = date("Y-m-d H:i:s");
        $query = mysqli_query($connect, "SELECT * FROM forgot WHERE token='$token' and username='$Email';");
        $row = mysqli_fetch_assoc($query);
         if ($row["expDate"] >= $curDate) {
           if(!preg_match('/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!*@#$%^&+=]).*$/',$psw))
        {?>
          <script>
              alert("Password At least one lower case letter \n Password At least one upper caseletter \n Password At least one number \n Password At least 8 characters length");
          </script>
      <?php  }
      else if($psw === $psw1){
        $hash = password_hash( $psw , PASSWORD_DEFAULT );

        $sql = mysqli_query($connect, "SELECT * FROM signup WHERE email='$Email'");
        $query = mysqli_num_rows($sql);
  	    $fetch = mysqli_fetch_assoc($sql);

        if($Email){
            $new_pass = $hash;
            mysqli_query($connect, "UPDATE signup SET password='$new_pass' WHERE email='$Email'");
            mysqli_query($connect, "DELETE FROM forgot WHERE username = '$Email'");
            ?>
            <script>
                window.location.replace("index.php");
                alert("<?php echo "your password has been succesful reset"?>");
            </script>
            <?php
           unset($_SESSION['email']);
           unset($_GET["password"]);
        }
        else{
            ?>
            <script>
                alert("<?php echo "Please try again"?>");
            </script>
            <?php
          }
        }
        else{
          ?>
          <script>
              alert("<?php echo "Password not matched"?>");
          </script>
          <?php
        }
    }
    else{     ?>
      <script>
          alert("<?php echo "Your Reset link is Expired so try to resend another link"?>");
          window.location.replace("forgot.php");
      </script>
    <?php
   unset($_SESSION['email']);
   unset($_GET["password"]);
  }
}
?>
<script>
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');
    toggle.addEventListener('click', function(){
        if(password.type === "password"){
            password.type = 'text';
        }
        else{
            password.type = 'password';
        }
        this.classList.toggle('bi-eye');
    });
</script>
<script>
    const toggle1 = document.getElementById('togglePassword1');
    const password1 = document.getElementById('password1');
    toggle1.addEventListener('click', function(){
        if(password1.type === "password"){
            password1.type = 'text';
        }
        else{
            password1.type = 'password';
        }
        this.classList.toggle('bi-eye');
    });
</script>
