<?php
include("connection.php");
if(!isset($_GET["opkl"])){
header('location:home.php');}
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
  <link rel="stylesheet" href="./assets/css/singleItem.css">
  <title>Item</title>

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
      <div class='mb-5 bg-light'>

        <div class='single-item-top'>

          <div class="row mt-5">
            <?php
              $soq=$_GET["opkl"];
              $q=mysqli_query($connect,"SELECT * FROM item WHERE id='$soq'");
              while($roo=mysqli_fetch_assoc($q)){ ?>
            <div class="col-6 slide-show">

                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="img-fluid slides" src="<?php echo $roo["photo"];?>" width="500px" height="200px" alt="Second slide"/>
                      </div>
                    </div>
                 
                  </div>
                
                </div>

            <div class="col-5 single-item-discription mt-1">
          
              <div class="container text-center">

                <div class="row">
                    <p class='single-item-name text-center'><span class="font-weight-bold">Item Name:&nbsp;</span><?php echo $roo["name"];?>
                        <spna><button class='single-item-cart-btn'>&nbsp;&nbsp;&nbsp;
                          <a href="caart.php?ca=caa&iq=<?php echo $roo["id"];?>"><i class="fa fa-shopping-cart"></i></a></button>
                        </spna>
                    </p>
                    
                </div>

                <div class="row">

                    <p class='single-item-disc text-center'><span class="font-weight-bold">Description:&nbsp;</span>
                    <?php echo $roo["description"];?>
                    </p>          
                 
                </div>

                <div class="row">
         <p class='single-item-disc text-center'><span class="font-weight-bold">Quantity:&nbsp;</span>
                <?php echo $roo["quantity"];?>
                </p>          
              </div>

              
              <div class="row">
         <p class='single-item-disc text-center'><span class="font-weight-bold">Item Category:&nbsp;</span>
                <?php echo $roo["tag"];?>
                </p>          
              </div>

              <?php if( $roo["disc"] != 0){ ?>
              <div class="row">
                 <p class='single-item-disc text-center'><span class="font-weight-bold">Price:&nbsp;</span>
                <s class="text-secondary"><?php echo $roo["price"];?></s>&nbsp;Birr
                </p>          
              </div>

              <div class="row">
                 <p class='single-item-disc text-center'><span class="font-weight-bold">Discount:&nbsp;</span>
                <?php echo $roo["disc"];?>&nbsp;Birr
                </p>          
              </div><?php } else {  ?>
              
                <div class="row">
                 <p class='single-item-disc text-center'><span class="font-weight-bold">Price:&nbsp;</span>
                <?php echo $roo["price"];?>
                </p>          
              </div> <?php } ?>

              <?php
              $sooq=$roo["shopid"];
              $qop=mysqli_query($connect,"SELECT * FROM shop WHERE shopid='$sooq'");
              while($oo=mysqli_fetch_assoc($qop)){ ?>

              <div class="row">
                 <p class='single-item-disc text-center'><span class="font-weight-bold">Mall:&nbsp;</span>
                <?php echo $oo["mallname"];?>
                </p>          
              </div>

              <div class="row">
                 <p class='single-item-disc text-center'><span class="font-weight-bold">Floor:&nbsp;</span>
                <?php echo $oo["floor"];?>
                </p>          
              </div>

              <div class="row">
                 <p class='single-item-disc text-center'><span class="font-weight-bold">Shop Name:&nbsp;</span>
                <?php echo $oo["shopname"];?>
                </p>          
              </div>

              <div class="row">
                 <p class='single-item-disc text-center'><span class="font-weight-bold">Phone:&nbsp;</span>
                <?php echo "0".$oo["phone"];?>
                </p>          
              </div>

              <div class="row">
                 <p class='single-item-disc text-center'><span class="font-weight-bold">Shop number:&nbsp;</span>
                <?php echo $oo["shopid"];?>
                </p>          
              </div>

              <?php
              $sooq1=$oo["mallname"];;
              $qoop=mysqli_query($connect,"SELECT * FROM mallname WHERE name='$sooq1'");
              while($too=mysqli_fetch_assoc($qoop)){ ?>
              <div class="row">
                 <p class='single-item-disc text-center'><span class="font-weight-bold">Place:&nbsp;</span>
                <?php echo $too["place"];?> &nbsp;<a target="_blank" href="a.php?q=<?php echo $too['lati']; ?>&t=<?php echo $too['longt']; ?>"><i class="fa-solid fa-location-dot"></i></a>
                </p>          
              </div>
               <?php }} ?> </div>

              </div>
<?php } ?>
            </div>
            
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