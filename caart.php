<?php
session_start();
if(empty($_SESSION['mailo'])){ ?>
<script>
alert("Login first");
window.location.href='home.php';
</script>
<?php }else{
include("connection.php");
if($_GET['ca']=='caa')
{
    $x=$_GET['iq'];
    $cy=$_SESSION['mailo'];
    $q="INSERT INTO cart(idd,id2) VALUES('$x','$cy')";
    $z=mysqli_query($connect,$q);
 if($z){
    ?>
<script>
alert("Added");
window.location.href='home.php';
</script>
<?php
}
else{
?>
<script>
alert("Not Added");
window.location.href='home.php';
</script>
<?php
}}}


?>