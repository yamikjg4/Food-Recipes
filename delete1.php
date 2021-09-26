<?php 
include("config.php");
$id=$_GET['id'];
$query="DELETE FROM ingredant_type WHERE type_id=$id";
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