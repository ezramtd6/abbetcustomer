<?php include('registration.php');?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Login Form</title>
      <link rel="stylesheet" href="./assets/css/al.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
   </head>
   <body>
      <div class="center">
         <div class="header">
            Login Form
         </div>
         <form method="post" action="perlog.php">
             <?php include("errors.php");?>
            <input type="text" name="id" placeholder="username or email" value="<?php echo $email;?>">
            <i class="far fa-envelope"></i>
            <input id="pswrd" type="password" name="pass" placeholder="Password">
            <i class="fas fa-lock" onclick="show()"></i>
            <input type="submit" name="login" value="Sign in">
            <a href="forgot.php">Forgot Password?</a><br>
			Not Registered? <a href="reg1.php">Register</a>
         </form>
      </div>
      <script>
         function show(){
          var pswrd = document.getElementById('pswrd');
          var icon = document.querySelector('.fas');
          if (pswrd.type === "password") {
           pswrd.type = "text";
           pswrd.style.marginTop = "20px";
           icon.style.color = "#7f2092";
          }else{
           pswrd.type = "password";
           icon.style.color = "grey";
          }
         }
      </script>
   </body>
</html>
