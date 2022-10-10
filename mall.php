<?php
include("connection.php");
if(empty($_GET["kode"])){
    header('location:home.php');}
    $_SESSION["poa"]=$_GET["kode"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/admin.css">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <title><?php echo $_SESSION["poa"]; ?> Mall</title>
</head>

<body>

    <div class="row">
        <div class="col-3 text-center admin-menu">

            <div class="logo mt-5">

                <p></i>

                  <br>
                  <?php echo $_SESSION["poa"]; ?> Mall<br>
                    

                </p>
            </div>

        <?php 
        $re=$_SESSION["poa"];;
        $aw=mysqli_query($connect,"SELECT * FROM mallname WHERE name='$re'");
      $roow=mysqli_fetch_assoc($aw);
      for($x=0;$x<$roow["total_floor"];$x++){
        ?>
            <a href="mallk.php?koi=<?php echo $x; ?>&bui=<?php echo $_SESSION['poa']; ?>" class="menu-link">
                <div class="menu-items mt-5">
                    <p class="menu-item"><?php echo $x; ?>st Floor</p>
                </div></a>  <?php } ?>
                </div>
        </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0024212ba5.js" crossorigin="anonymous"></script>

</body>

</html>
