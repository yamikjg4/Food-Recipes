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
    <title>Document</title>
</head>
<body>
    <?php
    include("template/template.php");
    ?>
    <?php
    include("config.php");
    // $folder_err='';
    $name_error='';
if(isset($_POST['add'])){
    $fname=$_POST['cname'];
//     $filenameabc = $_FILES["uploadfile"]["name"]; 
//     $tempname = $_FILES["uploadfile"]["tmp_name"]; 
//     $folder = "image/".$filenameabc;
//     if (move_uploaded_file($tempname, $folder))  { 
//         $msg = "Image uploaded successfully"; 

//     }else{ 
//         $msg = "Failed to upload image"; 
//   } 
  $que="SELECT * FROM category WHERE category_name='$fname'";
  $exe=mysqli_query($con,$que);
  $count=mysqli_num_rows($exe);
  if(empty($fname)){
    $name_error = "Please Enter Name"; 
  }
//  if(empty($filenameabc)){
//     $folder_err="<p>Pls Insert File</p>";
//   }
//  if(!(empty($filenameabc))){
//     if($filenameabc != "image/jpeg" || $filenameabc != "image/png"){
//     $folder_errr= "<p>This is not an image</p>";
//     }
//   }
  if(!(strlen($fname)>4)){
    $name_error = "Category Name is not valid"; 
  }

  else{
  if($count>0){
   echo '<script>alert("Allready Created Category Previous");</script>';
  }
  else{
    $quee="INSERT INTO category(category_name)VALUES('$fname')";
    $exe1=mysqli_query($con,$quee);
    if($exe1){
        echo '<script>alert("Category Inserted Sucessfully");</script>';
        // header("location:true.php");
    }
    else{
        echo '<script>alert("Error");</script>';
        // header("location:false.php");
    }
  }
}
}
?>
    <div id="content">
        <div class="container">
            <div class="card">
                <div class="card-header bg-primary"><p class="h4 text-white text-center">Add Category</div>
            </div>
            <div class="card-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="">Category Name:</label>
                      <input type="text" name="cname" id="name" class="form-control" onclick="addbutton()" onkeypress="check()" placeholder="Enter Category Name" aria-describedby="helpId" autocomplete="off">
                     <span id="cvalid" style="color:red"><?php echo $name_error;?></span>
                    </div>
    <div class="form-group">
        <button type="submit" name="add"class="btn btn-primary btn-block">ADD</button>
    </div>
                </form>
            </div>
            <?php
        $que3="SELECT * FROM category";
        $exes=mysqli_query($con,$que3);
        ?>
       
<?php $j=1;?>
<div class="table-responsive" id="table2">
      <table class="table table-borderless table table-hover table-dark mt-3" >
      <thead class="bg-warning">  
      <tr>
          <th>Category_id</th>
          <!-- <th>Category_Image</th> -->
          <th>Category_Name</th>
          <!-- <th>Operation</th> -->
        </tr>
        </thead>
        <?php
        while($output=mysqli_fetch_array($exes)){
        ?>
        <tr>
          <td><?php echo $j++;?></td>
          <!-- <td><img src="<?php echo $output["category_image"];?>" style="width:75px; height:75px;"></td> -->
          <td><?php echo $output["category_name"];?></td>
          <!-- <td>  <a href="delete.php?cid=<?php echo $output["cat_id"];?>" class="delte" onclick="return checkdelete()"><i class="fa fa-trash"></i></a></td> -->
        </tr>
        <?php
      }
      ?>
        </table>
    </div>
    
        </div>
        
          </div>
    </div>
    </div>
    
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
    <script>
function addbutton(){
        var x=document.getElementById("name").value;
        if(!x.trim()){
          document.getElementById("cvalid").innerHTML="Please Enter Category Name";
          document.getElementById("cvalid").style.color="red";  
        }
        // alert();
    }
    function check(){
        var x=document.getElementById("name").value;
        if(x.trim()){
          document.getElementById("cvalid").innerHTML="Validate Category Name";
          document.getElementById("cvalid").style.color="green";  
        }
    }
    if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
    </script>
</html>