<?php
include("connection.php");
if(!isset($_POST["searu"])){
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
  <style>
      .ezra{
          background:white !important;
      }
  </style>

  <title>Search result</title>

</head>
<body>
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
  </ul>
</div>
</nav>
<?php  
if(isset($_POST["searu"])){
    $rar=$_POST["searun"];
    if($_POST["sor"] == "mallk"){
    $rar=preg_replace("#[^0-9a-z]#i","",$rar);
    $q1=mysqli_query($connect,"SELECT * FROM mallname WHERE name LIKE '%$rar%' and visibility=0 ORDER BY name DESC");
    $cp1=mysqli_num_rows($q1);
    if($cp1 == 0){
        $output="There is No result";
        echo $output;
    }else{
      while($roow=mysqli_fetch_assoc($q1)){?>

<div class="row ezra cartRow mb-4 mt-5">

  <div class="col-9 mt-4">
      <div class="row">
          <div class="col">
          <img src="<?php echo $roow["photo"]; ?>" alt="First slide" width="90%" height="200px">
   
          </div>
          <div class="col">
          <hr>
     <?php echo $roow["name"];?> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a target="_blank" href="a.php?q=<?php echo $roow['lati']; ?>&t=<?php echo $roow['longt']; ?>"><i class="fa-solid fa-location-dot"></i></a>
    <br>
      Phone: &nbsp;0<?php echo $roow["mphone"]; ?><br>
      Address: <?php echo $roow["place"]; ?><br><br><br>
      <a class="discount"  href="mall.php?kode=<?php echo $roow["name"];?>"> Explore Mall</a>
    </p>
          </div>
      </div>
   </div>
</div>
<?php }}} 
else if($_POST["sor"] == "shopk"){
    $rar1=preg_replace("#[^0-9a-z]#i","",$rar);
    $q11=mysqli_query($connect,"SELECT * FROM shop WHERE CONCAT(shopid,shopname,department) LIKE '%$rar1%' and CONCAT(visibility,block)=0 ORDER BY id DESC");
if(!$q11){
  $output="There is No result";
        echo $output;
}
else{
   while($roow2=mysqli_fetch_assoc($q11)){  ?>

<div class="row ezra cartRow mb-4 mt-5">

  <div class="col-9 mt-4">
      <div class="row">
          <div class="col">
          <img src="<?php echo $roow2["photo"]; ?>" alt="First slide" width="90%" height="200px">
   
          </div>
          <div class="col">
          <hr>
     <p class=""><?php echo $roow2["shopid"];?></p> 
    <br>
    <span class="font-weight-bold">Department: </span>&nbsp;<?php echo $roow2["department"]; ?> <br>
    <span class="font-weight-bold"> Shop_Name: </span>&nbsp;<?php echo $roow2["shopname"]; ?><br>
     <span class="font-weight-bold">Phone: </span>&nbsp;0<?php echo $roow2["phone"]; ?><br><br><br><br>
      <a class="discount"  href="items.php?opd=<?php echo $roow2["id"];?>"> Explore Shop</a>
    </p>
          </div>
      </div>
   </div>
</div>
<?php }}
}  else if($_POST["sor"] == "productk"){
    $rar11=preg_replace("#[^0-9a-z]#i","",$rar);
    $q111=mysqli_query($connect,"SELECT * FROM item WHERE CONCAT(name,tag) LIKE '%$rar11%' and CONCAT(visibility,block)=0 ORDER BY id DESC");
    if(!$q111){
        $output="There is No result";
        echo $output;
    }else{
      while($roow3=mysqli_fetch_assoc($q111)){  ?>

<div class="row ezra cartRow mb-4 mt-5">

  <div class="col-9 mt-4">
      <div class="row">
          <div class="col">
          <img src="<?php echo $roow3["photo"]; ?>" alt="First slide" width="90%" height="200px">
   
          </div>
          <div class="col">
          <hr>
     <p class=""><?php echo $roow3["name"];?>
    <br>
    <span class="font-weight-bold">Department: </span> &nbsp;<?php echo $roow3["tag"]; ?><br>
    <span class="font-weight-bold"> Shop_Name: </span>&nbsp;<?php echo $roow3["shopid"]; ?><br>
     <span class="font-weight-bold">Quantity: </span>&nbsp;0<?php echo $roow3["quantity"]; ?><br><br><br><br>
      <a class="discount"  href="view.php?opkl=<?php echo $roow3["id"];?>"> Explore item</a>
    </p>
          </div>
      </div>
   </div>
</div>
<?php }}}

}?>
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