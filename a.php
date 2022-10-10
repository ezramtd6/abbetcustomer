<?php
if(!isset($_GET["q"]))
{ 
    header('Location: index.php'); 
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $latitude=$_GET["q"];
    $longitude=$_GET["t"];
     ?>
<iframe width="100%" height="800" src="https://maps.google.com/maps?q=<?php echo $latitude; ?>,<?php echo $longitude; ?>&output=embed"></iframe>
</body>
</html>