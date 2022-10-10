<?php include('registration.php');?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Forgett Password</title>
      <link rel="stylesheet" href="./assets/css/al.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
   </head>
   <body>
      <div class="center">
         <div class="header">
		 Forgett Password
         </div>
         <form method="post" action="forgot.php">
             <?php include("errors.php");?>
            <input type="text" name="idd" placeholder="Email" value="<?php echo $email;?>">
            <i class="far fa-envelope"></i>
            <input type="submit" name="forgot" value="Reset">
			Do you want to go back? <a href="perlog.php">Login</a>
         </form>
      </div>
   </body>
</html>

