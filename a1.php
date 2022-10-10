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
    include("connection.php");
    $query = mysqli_query($connect,"SELECT lati from mallname");
    $query1 = mysqli_query($connect,"SELECT longt from mallname");
    while($rxow=mysqli_fetch_assoc($query) and  $rxow1=mysqli_fetch_assoc($query1)){
     ?>
<iframe width="100%" height="800" src="https://maps.google.com/maps?qq=<?php echo $rxow["lati"]; ?>,<?php echo $rxow1["longt"]; ?>&output=embed"></iframe>
    <?php } ?>
</body>
</html>