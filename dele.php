<?php
include("connection.php");
if($_GET['opl']=='do')
{
    $x=$_GET['dd'];
    $q="DELETE FROM cart WHERE id ='$x'";
    $z=mysqli_query($connect,$q);
 if($z){
    ?>
<script>
alert("Deleted");
window.location.href='cart.php?deleted';
</script>
<?php
}
else{
?>
<script>
alert("Not Deleted");
window.location.href='cart.php?notdeleted';
</script>
<?php
}}


?>