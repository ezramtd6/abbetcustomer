<?php
include("connection.php");
if(!isset($_GET["koi"])){
header('location:home.php');
}
else if(!isset($_GET["bui"]) or empty($_GET["bui"])){
    header('location:home.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/admin.css">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <title><?php echo $_GET["bui"]; ?> Mall</title>
</head>

<body>

    <div class="row">
        <div class="col-3 text-center admin-menu">

            <div class="logo mt-5">

                <p></i>

                  <br>
                  <?php echo $_GET["bui"];?> Mall<br>
                    

                </p>
            </div>

        <?php 
        $re=$_GET["bui"];
        $aw=mysqli_query($connect,"SELECT * FROM mallname WHERE name='$re'");
      $roow=mysqli_fetch_assoc($aw);
      for($x=0;$x<$roow["total_floor"];$x++){
        ?>
            <a href="mallk.php?koi=<?php echo $x; ?>&bui=<?php echo $_GET["bui"]; ?>" class="menu-link">
                <div class="menu-items mt-5">
                    <p class="menu-item"><?php echo $x; ?>st Floor</p>
                </div> </a> <?php } ?>
                </div>
                <div class="col-9 container party-list">
            <div class="ml-2 mr-2 mt-5 row">
            <?php 
        $revb=$_GET["bui"];
        $flx=$_GET["koi"];
        $aw1=mysqli_query($connect,"SELECT * FROM shop WHERE mallname='$revb' and floor='$flx' and visibility=0 and block=0 ORDER BY shopid ASC");
      while($roow1=mysqli_fetch_assoc($aw1)){
        ?> 
                   
                    <div class="col mt-2">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="<?php echo $roow1["photo"]; ?>" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title text-center"><?php echo $roow1["shopid"]; ?></h5><br>
                          Shop Name :&nbsp;<span class="text-center font-weight-bold"><?php echo $roow1["shopname"]; ?></span><br>
                          Phone :&nbsp;<span class="text-center font-weight-bold">0<?php echo $roow1["phone"]; ?></span><br>
                          <a class="discount"  href="items.php?opd=<?php echo $roow1["id"];?>"> Explore Shop</a>
                        </div>
                      </div>
                      </div>
                   <?php } ?>
                </div>
        </div>
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
