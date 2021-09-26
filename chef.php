<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="icon" href="LogoMakerCa-1629816030209.PNG">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- FONTAWESOME : https://kit.fontawesome.com/a23e6feb03.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.  5/jquery.mCustomScrollbar.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Chef-Registration</title>
  
</head>
<?php
include("template/template.php");
  ?>
  <?php
include("config.php");
// session_start();
$name_error='';
$email_error='';
$pass_error='';
$folder_err='';
$msg='';
if(isset($_POST['submit'])){
    $fname=$_POST['fname'];
    $filenameabc = $_FILES["uploadfile"]["name"]; 
    $tempname = $_FILES["uploadfile"]["tmp_name"];    
    $folder = "image/".$filenameabc;
    // move_uploaded_file($tempname,$folder);
    $email=$_POST['email1'];
    $password=$_POST['password1'];
    $inc=password_hash($password,PASSWORD_BCRYPT);
    $_SESSION['user']=$fname;
    $_SESSION['email']=$email;
    $_SESSION['pass']=$password;
    $que="SELECT * FROM admin where Email='$email'";
    $que1=mysqli_query($con,$que);
    $count=mysqli_num_rows($que1);
    // $file_type = $file['type'];
    if (move_uploaded_file($tempname, $folder))  { 

        $msg = "Image uploaded successfully"; 

    }
else{ 

        $msg = "Failed to upload image"; 
  } 

  if(empty($fname)){
    $name_error = "Please Enter Name"; 
  }
  if(empty($email))  
      {  
           $email_error = "<p>Please Enter Email</p>";  
      }  
      if(empty($password)){
        $pass_error="<p>Pasword Fill is Empty</p>";
      } 
      if(empty($filenameabc)){
        $folder_err="<p>Pls Insert File</p>";
      }
      if(!empty($email)){
      if(!preg_match("/^[\w\d._%+-]+@(?:[\w\d-]+\.)+(\w{2,})(,|$)/",$email))  
      {  
           $email_error = "<p>Invalid Email formate</p>";  
      }  
    }
    if(!empty($password)){
      if(!(strlen($password)>7 && strlen($password)<10)){
          $pass_error="<p>Pasword Must be 8 to 10 </p>";
        }
    }
        if(strlen($password)>=7 && strlen($password)<=10) 
        {  
          if(!preg_match("/((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20})/",$password))  
        {  
             $pass_error = "<p>Not Strong Password</p>";  
        }   
    //   else{
    //     if($filenameabc != "image/jpeg" || $filenameabc != "image/png"){
    //         $folder_err= "<p>This is not an image</p>";
    //     }
    //   }
    else{
    if($count>0){
    //     echo '<script>
    //     alert("Already Register This Email");
    // </script>';
    $email_error = "<p>Already E-Mail id Register</p>";
    }
    else{
        $insert="INSERT into admin( UserName, Email, Password,role_id,Profile) values('$fname','$email','$inc',2,'$folder')";
        $exe=mysqli_query($con,$insert);
        if($exe){
            include("mail.php");
            // header("location:true.php");
    //        echo '<script>
    //     alert("Register This Email");
    // </script>'; 
?>
<!-- <meta http-equiv="refresh" content="1;url=http://localhost/ChefRecipes/chef.php"/> -->
<?php       
}
        else{
            echo ' <script>
            alert("Database Connection lost");
        </script>';
        // header("location:false.php");
        }
    } }
}}
?>

        <div id="content">
            <div class="container">
            <div class="card ">
<div class="card-header bg-primary">
    <h4 class="text-center text-white">Chef-Registration</h4>
</div>
<div class="card-body">
    <form action="#" method="POST"  enctype="multipart/form-data" >
        <div class="form-group">
            <label for="">Chef User Name</label>
            <input type="text" class="form-control" name="fname" onclick="first()" onkeypress="firstname()" id="fname" placeholder="Enter Chef First Name"  maxlength="50" autocomplete="off">
            <span id="fvalid" style="color:red;"><?php echo $name_error;?></span>
        </div>
    
        <div class="form-group">
            <label for="">Upload Chef Image</label>
            <input id="fileName" class="form-control" type="file" name="uploadfile"  accept="image/x-png,image/gif,image/jpeg" onchange="validateFileType()" >
       <span id="upload" style="color:red;"><?php echo $folder_err;?></span>
        </div>
        <div class="form-group">
            <label for="">Email id</label>
            <input id="typeemail" class="form-control" type="text" name="email1" onclick="email()" onkeypress="checkvalid()" placeholder="Enter Chef Email id"  autocomplete="off">
            <span id="email" style="color:red;"><?php echo $email_error;?></span>
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password1" onclick="pass()" onkeypress="password()" id="pwd"  placeholder="Enter Password"> 
            <span id="password" style="color:red;"><?php echo $pass_error;?></span>
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
 <script type="text/javascript" src="script/script.js"></script>  
</html>