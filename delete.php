<?php
include("config.php");
$id=$_GET['id'];
$cid=$_GET['cid'];
$que="DELETE FROM admin WHERE id='$id'";
$exe=mysqli_query($con,$que);
?>
    <?php
    if($exe){
        echo '<script>alert("Record delte Sucess Fully");</script>';
        header("Location:admindash.php");
   ?>
        <?php        
    }
    else{
        echo '<font color="red">Failed Delete</font>';
    }
    ?>
    <?php
    $que1="DELETE FROM category WHERE cat_id='$cid'";
    $exes=mysqli_query($con,$que1);
    if($exe){
        echo '<script>alert("Record delte Sucess Fully");</script>';
        header("Location:admindash.php");
   ?>
        <?php        
    }
    else{
        echo '<font color="red">Failed Delete</font>';
    }
    ?>