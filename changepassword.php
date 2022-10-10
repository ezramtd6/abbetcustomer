<?php include("registration.php");
if(empty($_SESSION['mailo']))
{header('location:index.php');}
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/css/al.css">

  <title>Change password</title>

</head>
<body>
<div class="center">
         <div class="header">
            Change password
         </div>
         <form method="post" action="changepassword.php">
             <?php include("errors.php");?>
             <input type="password"  name="opass" placeholder="Old Password">
            <br>
            <input id="pswrd" type="password" name="npass" placeholder="Password">
            <i class="fas fa-lock" onclick="show()"></i>
		      	<input id="pswrd1" type="password" name="rpass" placeholder="Retype-Password">
			      <i class="fas fa-lock" onclick="showl()"></i>
            <input type="submit" name="ChangeP" value="Change">
         </form>
      </div>
      



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/0024212ba5.js" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
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