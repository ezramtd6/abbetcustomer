<?php include('registration.php');?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Registration Form</title>
      <link rel="stylesheet" href="./assets/css/al.css">
	  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
   </head>
   <body>
      <div class="center">
         <div class="header">
		 Registration Form
         </div>
         <form method="post" action="reg1.php">
             <?php include("errors.php");?>
            <input type="text" name="id" placeholder="username" value="<?php echo $user_name; ?>">
            <i class="far fa-envelope"></i><br>
			<input type="text" name="name" placeholder="Email" value="<?php echo $email;?>">
            <i class="far fa-envelope"></i><br>
			<input type="text"  placeholder="phone number" name="phone" value="<?php echo $phone; ?>">
            <i class="fa fa-phone" aria-hidden="true"></i><br>
            <input id="pswrd" type="password" name="pass" placeholder="Password">
            <i class="fas fa-lock" onclick="show()"></i>
			<input id="pswrd1" type="password" name="rpass" placeholder="Retype-Password">
			<i class="fas fa-lock" onclick="showl()"></i>
            <input type="submit" name="register" value="Sign in">
			Already Registered? <a href="perlog.php">Login</a>
         </form>
      </div>
	  <script>
         function show(){
          var pswrd = document.getElementById('pswrd');
          var icon = document.querySelector('.fas');
          if (pswrd.type === "password") {
           pswrd.type = "text";
           pswrd.style.marginTop = "20px";
          }else{
           pswrd.type = "password";
          }
         }
      </script>
	        <script>
         function showl(){
          var pswrd1 = document.getElementById('pswrd1');
          var icon1 = document.querySelector('.fa-lock');
          if (pswrd1.type === "password") {
           pswrd1.type = "text";
           pswrd1.style.marginTop = "20px";
          }else{
           pswrd1.type = "password";
          }
         }
      </script>
   </body>
</html>


