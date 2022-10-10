<?php
include("connection.php");
session_start();
if(!isset($_GET["opd"]))
{header('location:home.php');}
$xo=$_GET["opd"];
$sel=mysqli_query($connect,"SELECT * FROM shop WHERE id='$xo'");
$row=mysqli_fetch_assoc($sel);
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Roboto+Slab:wght@300&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/style.css">

  <title><?php echo $row["shopid"];?></title>

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

      
            <li class="nav-item">

              <form class="form-inline mt-2" method="post" action="search.php">
              <?php $_SESSION["oxo"]=$row["shopid"];;?>  
              <input class="form-control searchBar" type="text" placeholder="Search"  name="sear" required>
                <button class="btn btn-secondary searchButton" type="submit" name="search0"><i
                    class="fas fa-search searchIcon"></i></button>
              </form>
            </li>
          </ul>
        </div>
      </nav>

       
<div class='shop_view_items newxo'>
          <p class='text-center shop-name mt-5 mb-4'><?php echo $row["shopname"]; ?>&nbsp; Shop &nbsp;<?php ?></p>
  <div class='row mb-5 no-gutter'>

  <?php 
  $re=$row["shopid"];
  $query = mysqli_query($connect,"SELECT * from item WHERE shopid='$re' ORDER BY id DESC");
  while($roow=mysqli_fetch_assoc($query)){?>
    <div class='col-md  mt-2'>
      <div class="wrapper">
          <div class="overviewInfo">
              <div class="productimg-con">
                  <img class="productImage" src="<?php echo $roow["photo"];?>" alt="product: ps5 controller image"/>
              </div>  
            </div> 
            <div class="productSpecifications">
              <div class="row">
                <div class="col-9">
                <h6 class="item-name font-weight-bold"><?php echo $roow["name"];?></h6>
                </div>
                  <div class="col-3">  
                    <div class="actions mt-1">
                      <div class="cartbutton neurobutton"><a href="caart.php?ca=caa&iq=<?php echo $roow["id"];?>">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" >
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M5.79166 2H1V4H4.2184L6.9872 16.6776H7V17H20V16.7519L22.1932 7.09095L22.5308 6H6.6552L6.08485 3.38852L5.79166 2ZM19.9869 8H7.092L8.62081 15H18.3978L19.9869 8Z" fill="currentColor" />
                          <path d="M10 22C11.1046 22 12 21.1046 12 20C12 18.8954 11.1046 18 10 18C8.89543 18 8 18.8954 8 20C8 21.1046 8.89543 22 10 22Z" fill="currentColor" />
                          <path d="M19 20C19 21.1046 18.1046 22 17 22C15.8954 22 15 21.1046 15 20C15 18.8954 15.8954 18 17 18C18.1046 18 19 18.8954 19 20Z" fill="currentColor" />
                        </svg></a>
                      </div>
                    </div>
                  </div>
                </div>
                <p class="item-discription newxo">Department :&nbsp;<?php echo $roow["tag"];?></p>
                <p class="item-discription newxo">Shop number :&nbsp;<?php echo $roow["shopid"];?></p>
                <?php if($roow['disc'] == 0) { ?>
                 <div class="priceTag text-left newxo">
                    Price: <span><?php echo $roow["price"];?>&nbsp;</span>birr
                 </div> <?php } else { ?>
                  <div class="priceTag text-left newxo">
                    Price: <span><s class="text-secondary"><?php echo $roow["price"];?>&nbsp;</s></span>birr<br>
                    Discount:  <span><?php echo $roow["disc"];?>&nbsp;</span>birr
                 </div><?php } ?>
                  <div class="text-center">
                     <a class="shopNowLink mt-3" href="view.php?opkl=<?php echo $roow["id"];?>">Explore More</a></div>
                  </div>
              </div>
           </div>
           <?php } ?>

         </div>
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
</body>
</html>