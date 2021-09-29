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
  $id=$_GET['id'];
  $query="SELECT * FROM admin WHERE id=$id";
  $execute=mysqli_query($con,$query);
  $show=mysqli_fetch_array($execute);
  ?>
  <?php
// session_start();
$password_err='';
if(isset($_POST['submit'])){
    $fname=$_POST['fname'];
    $filenameabc = $_FILES["uploadfile"]["name"]; 
    $tempname = $_FILES["uploadfile"]["tmp_name"];    
    $folder = "image/".$filenameabc;
    // move_uploaded_file($tempname,$folder);
    // $email=$_POST['email1'];
    $password=$_POST['password1'];
    $inc=password_hash($password,PASSWORD_BCRYPT);
    $_SESSION['user']=$fname;
    $_SESSION['email']=$show["Email"];
    $_SESSION['pass']=$password;
   if(empty($filenameabc)){
    $folder=$show["Profile"];
      }
   if(empty($password)){
    $inc=$show["Password"];
    $_SESSION['pass']="Password Not Changed";
   }
//    if(empty($email)){
//     $email=$show["Email"];
//    }
   if(empty($fname)){
    $fname=$show["UserName"];
   }
    //    if(!empty($email)){
    //     if(!preg_match("/^[\w\d._%+-]+@(?:[\w\d-]+\.)+(\w{2,})(,|$)/",$email))  
    //     {  
    //         $email=$show["Email"];  
    //     }  
    //   }
    // $file_type = $file['type'];
    if (move_uploaded_file($tempname, $folder))  { 

        $msg = "Image uploaded successfully"; 

    }
else{ 

        $msg = "Failed to upload image"; 
  } 
  if(!empty($password)){
    if(!(strlen($password)>7 && strlen($password)<10)){
        // $password_err="Password Must be 8 to 10";
        $inc=$show["Password"]; 
        $_SESSION['pass']="Password Not Changed";
        // $_SESSION['pass']=$show["Password"];
        // echo '<script>alert("Login Time Enter Old Password");</script>';
      }
  }
      if(strlen($password)>=7 && strlen($password)<=10) 
      {  
        if(!preg_match("/((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20})/",$password))  
      {  
        // $password_err="week Password";
        $inc=$show["Password"]; 
        $_SESSION['pass']="Password Not Changed";
        // $_SESSION['pass']=$show["Password"];
        // echo '<script>alert("Week Password");</script>';
      }
    }

    //   else{
    //     if($filenameabc != "image/jpeg" || $filenameabc != "image/png"){
    //         $folder_err= "<p>This is not an image</p>";
    //     }
    //   }    
        $query1="UPDATE admin SET UserName='$fname',Password='$inc',Profile='$folder' WHERE id=$id";
        $execute=mysqli_query($con,$query1);
        if($execute){
          include("mail1.php");
        ?>
        <!-- <meta http-equiv="refresh" content="1;url=http://localhost/ChefRecipes/admindash.php"/> -->
        <?php
        }
        else{
            echo '<script>alert("Update UnSucessFully");</script>';
        }
    }
?>

        <div id="content">
            <div class="container">
            <div class="card ">
<div class="card-header bg-primary">
    <h4 class="text-center text-white">Chef-Update</h4>
</div>
<div class="card-body">
    <form action="#" method="POST"  enctype="multipart/form-data" >
        <div class="form-group">
            <label for="">Chef User Name</label>
            <input type="text" class="form-control" name="fname" onclick="first()" onkeypress="firstname()" id="fname" placeholder="Enter Chef First Name"  value="<?php echo $show["UserName"]?>" autocomplete="off">
            <span id="fvalid" style="color:red;"></span>
        </div>
    
        <div class="form-group">
            <label for="">Upload Chef Image</label>
            <img src="<?php echo $show["Profile"];?>" class="h-25 w-25 ml-1">
            <input id="fileName" class="form-control" type="file" name="uploadfile" value="<?php echo $show["Profile"];?>"  accept="image/x-png,image/gif,image/jpeg" onchange="validateFileType()">
       <!-- <span id="upload" style="color:red;"></span> -->
        </div>
        <div class="form-group">
            <label for="">Email id</label>
            <input id="typeemail" class="form-control" type="text" name="email1" onclick="email()" onkeypress="checkvalid()" placeholder="Enter Chef Email id" style="border: 1px solid black;" value="<?php echo $show["Email"];?>" autocomplete="off" disabled>
            <!-- <span id="email" style="color:red;"></span> -->
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password1" onclick="pass()" onkeypress="password()" id="pwd"  placeholder="Enter Password"> 
            <span id="password" style="color:red;"><?php echo $password_err?></span>
        </div>
        <div class="form-group">
        <button type="submit" name="submit"  class="btn btn-primary btn-block" btn-lg btn-block">Update</button>
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
 <script type="text/javascript" src="script.js"></script>  
</html>