<?php include('config.php');?>
<?php
$food=$_POST['food'];
$que="SELECT * FROM food WHERE Food_Name like '%$food%'";
$exe=mysqli_query($con,$que);
if(mysqli_num_rows($exe)>0){
    while($result=mysqli_fetch_array($exe)){
     echo '<option value="'.$result["Food_Name"].'">'.$result["Food_Name"].'</option>';;
    }
}
?>