<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="icon" href="LogoMakerCa-1629816030209.PNG">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- FONTAWESOME : https://kit.fontawesome.com/a23e6feb03.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.  5/jquery.mCustomScrollbar.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Chef-Registration</title>
  
</head>
<?php
  include ("config.php");  
include("template.php");
  ?>
   
 
        <div id="content">
            <div class="container">
            <div class="card ">
<div class="card-header bg-primary">
    <h4 class="text-center text-white">Chef-Registration</h4>
</div>
<div class="card-body">
    <form action="#" method="POST"  enctype="multipart/form-data" onsubmit="return validation()">
        <div class="form-group">
            <label for="">Chef User Name</label>
            <input type="text" class="form-control" name="fname"  onclick="first()" onkeypress="firstname()" id="fname" placeholder="Enter Chef First Name" style="border: 1px solid black;" required maxlength="50" autocomplete="off">
            <span id="fvalid"></span>
        </div>
    
        <div class="form-group">
            <label for="">Upload Chef Image</label>
            <input id="fileName" class="form-control" type="file" name="uploadfile" style="border:0.5px solid black;" accept="image/x-png,image/gif,image/jpeg" onchange="validateFileType()" required >
       <span id="upload"></span>
        </div>
        <div class="form-group">
            <label for="">Email id</label>
            <input id="typeemail" class="form-control" type="email" name="email1" onclick="email1()" onkeypress="email()" placeholder="Enter Chef Email id" style="border: 1px solid black;" required autocomplete="off">
            <span id="email"></span>
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password1" onclick="pass()" onkeypress="password()" id="pwd" placeholder="Enter Password" style="border: 1px solid black;" maxlength="10" required> 
            <span id="password"></span>
        </div>
        <div class="form-group">
        <button type="submit" name="submit"  class="btn btn-primary btn-block" btn-lg btn-block">Register</button>
        </div>  
    </form>
</div>
            </div>
    </div>
    </div>
    </div>

    </div>
<?php
include("config.php");
// session_start();
if(isset($_POST['submit'])){
    $fname=$_POST['fname'];
    $filenameabc = $_FILES["uploadfile"]["name"]; 
    $tempname = $_FILES["uploadfile"]["tmp_name"]; 
    $folder = "image/".$filenameabc;
    // move_uploaded_file($tempname,$folder);
    $email=$_POST['email1'];
    $password=$_POST['password1'];
    $inc=password_hash($password,PASSWORD_BCRYPT);
    $_SESSION['email']=$email;
    $_SESSION['pass']=$password;
    $que="SELECT * FROM admin where Email='$email'";
    $que1=mysqli_query($con,$que);
    $count=mysqli_num_rows($que1);
    if (move_uploaded_file($tempname, $folder))  { 

        $msg = "Image uploaded successfully"; 

    }else{ 

        $msg = "Failed to upload image"; 
  } 
    if($count>0){
        echo '<script>
        alert("Already Register This Email");
    </script>';   
    }
    else{
        $insert="INSERT into admin( UserName, Email, Password,role_id,Profile) values('$fname','$email','$inc',2,'$folder')";
        $exe=mysqli_query($con,$insert);
        if($exe){
            include("mail.php");
    //        echo '<script>
    //     alert("Register This Email");
    // </script>'; 
        }
        else{
            echo ' <script>
            alert("Database Connection lost");
        </script>';
        }
    }
}
?>

    <body>

    </body>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                document.getElementById("bodyContent").style.width = "100%";
            });
        });
    </script>
 <script type="text/javascript" src="script.js"></script>  

</html>