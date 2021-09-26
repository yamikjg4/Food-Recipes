<?php 
include("config.php");
$id=$_GET['cid'];
$query="DELETE FROM food WHERE Food_id=$id";
$execute=mysqli_query($con,$query);
if($execute){
?>
<script>alert("Delete Sucessfully");</script>
<?php 
header("Location:chefpanel.php");
}
else{
    ?>
    <script>alert("Delete Unsucessfully");</script>

  <?php  
}
?>