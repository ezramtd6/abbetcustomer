
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Roboto+Slab:wght@300&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Home</title>

</head>

<body>

  <!--Nav-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">


    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">

      <ul class="navbar-nav">


        <li class="nav-item mr-5 "> <a class="navbar-brand" href="index.php" data-abc="true">ABBET
            <!--ICON--> <span> <i class="fas fa-tags brandIcon"></i></span>
          </a> </li>

       
   
          <li class="nav-item">

<form class="form-inline mt-2" method="post" action="search1.php"> 
<select name="sor" class="babi">
            <option class="dropdown-item1" value="mallk">Mall</option>
            <option class="dropdown-item1" value="shopk">Shops</option>
            <option class="dropdown-item1" value="productk">Products</option>
</select>
  <input class="form-control searchBar" type="text" placeholder="Search" name="searun" required>
  <button class="btn btn-secondary searchButton" name="searu" type="submit"><i
      class="fas fa-search searchIcon"></i></button>
</form>
</li>


        <li class="nav-item mt-3 ml-5 vendorIcon balance"> <a class="nav-link sellerIcon" href="perlog.php"
          ><b class="vendor_balance">Login</b></a> </li>
        <li class="nav-item mt-3 ml-5 vendorIcon balance"> <a class="nav-link sellerIcon" href="reg1.php"
            ><b class="vendor_balance">Signup</b></a> </li>
        <li class="nav-item ml-4 mt-1 cartIcon"> <a class="nav-link" href="perlog.php" data-abc="true"><i
              class="fas fa-shopping-cart cartIcon"></i></a> </li>        
      </ul>

    </div>
  </nav>

  <!-- Back to top -->

  <button onclick="topFunction()" id="myBtn" title="Go to top">^</button>


  <script>
    //Get the button:
    mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () { scrollFunction() };

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0; // For Safari
      document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
  </script>
  <p class="text-center home-title">Explore Shops </p>

  <!--Row1-->
  <div class="row ml-3 mr-3 mt-5 mb-5">
  <?php
include("connection.php");
$query = mysqli_query($connect,"SELECT * from shop where visibility=0 and block=0 ORDER BY rand() limit 8");
while($row=mysqli_fetch_assoc($query)){ 
   ?>
    <div class="col-md-3 mb-3">

      <div class="card">
        <h5 class="card-title text-center"><?php echo $row["shopname"];?></h5>
        <img class="card-img-top img-fluid img1"  src="<?php echo $row['photo'];?>" width="400" height="250" alt="No inage found">
        <p class="disc">Department: <?php echo $row['department'];?></p>
        <p class="disc">Mall: <?php echo $row["mallname"];?></p>
        <p class="text-center"><a class="shopNowLink mt-3" href="items.php?opd=<?php echo $row["id"];?>">Explore More</a></p>
      </div>

    </div> <?php } ?>

  </div> 

  <p class="text-center home-title">Explore Products</p>

  <!--Row3-->
 
  <div class="row ml-3 mr-3 mt-5 mb-5">
  <?php
include("connection.php");
$query1 = mysqli_query($connect,"SELECT * from item where visibility=0 and block=0 ORDER BY rand() limit 8");
while($row1=mysqli_fetch_assoc($query1)){ 
  $op0=$row1["shopid"];
  $query10 = mysqli_query($connect,"SELECT * from shop where shopid='$op0'");  
  while($row10=mysqli_fetch_assoc($query10)){                                ?>
    <div class="col-md-3 mb-3">

      <div class="card">
        <h5 class="card-title text-center"><?php echo $row1["name"];?></h5>
        <img class="card-img-top img-fluid img1" src="<?php echo $row1['photo'];?>">
        <p class="disc">Shop: <?php echo $row10["shopname"];?></p>
        <p class="disc">Mall: <?php echo $row10["mallname"];?></p>
        <?php if($row1['disc'] != 0) { ?>
        <p class="disc">Price: <s class="text-secondary"><?php echo $row1["price"];?>&nbsp;Birr</s></p>
        <p class="disc">Discount: <?php echo $row1["disc"];?>&nbsp; Birr</p><?php } else { ?>
        <p class="disc">Price:<?php echo $row1["price"];?>&nbsp;Birr</p> <?php } ?>
        <p class="text-center"><a class="shopNowLink mt-3" href="view.php?opkl=<?php echo $row1["id"];?>">Explore More</a></p>
      </div>

    </div> <?php }} ?>

  </div> 

  <div class="jumbotron ml-3 mr-3 text-center">

    <a href="perlog.php"><button class="seeAllButton">Sign in for best experience</button></a>

  </div>

  <!-- Footer -->
  <footer class="text-center text-lg-start">

    <div class="container p-5">
      <div class="text-center p-3">
        <?php include("footer.php");?>
        <a class="" href="#"></a>
      </div>

    </div>


  </footer>
  <!-- Footer -->


  <script src="validate.js"></script>

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
