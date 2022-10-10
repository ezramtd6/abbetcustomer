<?php include("registration.php");
if(empty($_SESSION['mailo']))
{header('location:index.php');}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://kit.fontawesome.com/b30976267e.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/yourcode.js"></script>
    <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">

      
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Roboto+Slab:wght@300&display=swap"
  rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
  integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets\css\style.css">
    <link rel="stylesheet" href="assets\css\cart.css">
    <title>Cart</title>
</head>
<body>
     <!--Nav-->
      <!--Nav-->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">

          <ul class="navbar-nav">


            <li class="nav-item mr-5 "> <a class="navbar-brand" href="home.php" data-abc="true">ABBET
                <!--ICON--> <span> <i class="fas fa-tags brandIcon"></i></span>
              </a> </li>

          </ul>
        </div>
      </nav>

<!-- end nav -->
<div class="title">
  <h5 class="display-4 mt-5" style="font-size: 2rem !important;">Shopping Cart </h5>

<hr class="ml-auto">
</div>

<?php
include("connection.php");
$v=$_SESSION['mailo'];
$queryj = mysqli_query($connect,"SELECT * from cart WHERE id2='$v'");
while($rowj=mysqli_fetch_assoc($queryj)){ 
   $daf=$rowj["idd"];
   $queryja = mysqli_query($connect,"SELECT * from item WHERE id='$daf'"); 
   while($r=mysqli_fetch_assoc($queryja)){  
   ?>

<div class="row cartRow mb-4">
  <div class="col-6 mt-4"><img style="float: left;" src=" <?php echo $r["photo"];?>" alt="First slide" width="200px" height="200px">
     Product name : &nbsp;<span class="font-weight-bold"><?php echo $r["name"];?></span><br>
     <hr>
     <p >
      Product Quantity: &nbsp; <span class="font-weight-bold"><?php echo $r["quantity"];?></span><br>
      Product discription: &nbsp;<span class="font-weight-bold"><?php echo $r["description"];?></span><br>
      <?php
      $abv=$r["shopid"];
      $queryja1 = mysqli_query($connect,"SELECT * from shop WHERE shopid='$abv'"); 
   while($r2=mysqli_fetch_assoc($queryja1)){ ?>
      Shop Number: &nbsp;<span class="font-weight-bold"><?php echo $r2["shopid"]; ?></span><br>
      Phone Number: &nbsp;<span class="font-weight-bold">0<?php echo $r2["phone"]; ?></span><br>
      <?php 
      $rt=$r2["mallname"];
      $opac = mysqli_query($connect,"SELECT * from mallname WHERE name='$rt'"); 
      while($r5=mysqli_fetch_assoc($opac)){
      ?>
      Address: &nbsp;<span class="font-weight-bold"><?php echo $r5["place"]; ?></span>
      &nbsp;<a target="_blank" href="a.php?q=<?php echo $r5['lati']; ?>&t=<?php echo $r5['longt']; ?>"><i class="fa-solid fa-location-dot"></i></a>
    </p>
   </div>
<?php  if($r["disc"] == 0) { ?>
  <div class="col-3 mt-4"><h5><b><?php echo $r["price"];?> &nbsp;birr</b></h5> </div><?php } else { ?>
    <div class="col-3 mt-4"><h5><s class="text-secondary"><?php echo $r["price"];?> &nbsp; &nbsp;</s><?php echo $r["disc"];?> &nbsp;Birr</h5></div>
    <?php } ?>
  <div class="col-1 mt-2"><a href="dele.php?opl=do&dd=<?php echo $rowj["id"];  ?>"><i class="far fa-trash-alt"></i></a></div>
</div>
<?php }}}} echo "";?>





<!-- Footer -->
<footer class="text-center text-lg-start">

  <div class="container p-5">
  <div class="text-center p-3">
  <?php include("footer.php");?>
  </div>

  </div>


</footer>
<!-- Footer -->

</body>
</html>
