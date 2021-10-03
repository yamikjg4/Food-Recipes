<?php
include('config.php');
?>
<?php
 $chef=$_POST['chef'];
   $que="SELECT * FROM admin WHERE UserName like '%$chef%' AND role_id=2";
   $exe=mysqli_query($con,$que);
   if(mysqli_num_rows($exe)>0){
       while($result=mysqli_fetch_array($exe)){
        echo '<option value="'.$result["UserName"].'">'.$result["UserName"].'</option>';;
       }
   }
?>