<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="icon" href="LogoMakerCa-1629816030209.PNG">
    <style>
        .edit{
            color: white;
        }
        .delte:hover{
            color: red;
        }
    </style>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- FONTAWESOME : https://kit.fontawesome.com/a23e6feb03.js -->
    <link rel="stylesheet"   href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.  5/jquery.mCustomScrollbar.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<?php
include("template/template.php");
  ?>
        <div id="content">
        <div class="container">   
      <div class="row">
          <div class="col-md-4 col-6 p-1">
              <div id="div1"class="w-100 div"><p class="h5 text-center pt-5 text-white">Chef</p>
            <?php
            include ("config.php");
            $que1="SELECT COUNT(UserName)From admin WHERE role_id=2";
            $exe=mysqli_query($con,$que1);
            $arr=mysqli_fetch_array($exe);
            // $row=mysqli_num_rows($exe);
            ?>
            <h6 class="text-center text-white"><?php echo $arr[0];?></h6>
            </div>
          </div>
          <div class="col-md-4 col-6 p-1">
              <div id="div2"class="w-100 div"><p class="h5 text-center pt-5 text-white">Categories</p>
              <?php
            // include ("config.php");
            $que2="SELECT COUNT(category_name)From category";
            $exe1=mysqli_query($con,$que2);
            $arr1=mysqli_fetch_array($exe1);
            // $row=mysqli_num_rows($exe);
            ?>
            <h6 class="text-center text-white"><?php echo $arr1[0];?></h6>
            </div>
          </div>
          <div class="col-md-4 col-6 p-1">
              <div id="div3"class="w-100 div"><p class="h5 text-center pt-5 text-white">Food-Recipes</p>
              <?php
            // include ("config.php");
            $que3="SELECT COUNT(Food_Name)From food";
            $exe2=mysqli_query($con,$que3);
            $arr2=mysqli_fetch_array($exe2);
            // $row=mysqli_num_rows($exe);
            ?>
             <h6 class="text-center text-white"><?php echo $arr2[0];?></h6>
            </div>
          </div>
      </div>
    
        <?php 
        $query="SELECT id,UserName,Email,role.role_name,Profile FROM admin JOIN role ON role.role_id=admin.role_id
        WHERE role.role_id=2";
        $execute=mysqli_query($con,$query);?>
 <?php $i=1;?>
       
          <div class="table-responive-sm" id="table1" style="display: none;">
      <table class="table table-borderless table table-hover table-dark mt-3">
      <thead class="bg-success">  
      <tr>
           <th>Id</th>
           <th>Profile</th>
           <th>UserName</th>
           <th>Email-Id</th>
           <th>Role-Name</th>
           <th>Operation</th>
        </tr>
      </thead>
      <?php
      while( $result=mysqli_fetch_array($execute)){
        ?>
        <tr>
         
            <td><?php echo $i++;?></td>
            <td><img src="<?php echo $result["Profile"];?>" style="height:85px;width:75px;" class="img-fluid"></td>
            <td><?php echo $result["UserName"];?></td>
            <td><?php echo $result["Email"];?></td>
            <td><?php echo $result["role_name"];?></td>
            <td><a href="edit.php?id=<?php echo $result["id"];?>" class="edit"><i class="fa fa-edit"></i></a>
            <a href="delete.php?id=<?php echo $result["id"];?>" class="delte" onclick="return checkdelete()">
            <i class="fa fa-trash"></i></a>
        </td>
        </tr>
        <?php
       }
        ?>
     
        </table>
      </div>
       
    
        <?php
        $que3="SELECT * FROM category";
        $exes=mysqli_query($con,$que3);
        ?>
       
<?php $j=1;?>
<div class="table-responsive-sm" id="table2" style="display:none">
      <table class="table table-borderless table table-hover table-dark mt-3" >
      <thead class="bg-warning">  
      <tr>
          <th>Category_id</th>
          <!-- <th>Category_Image</th> -->
          <th>Category_Name</th>
          <th>Operation</th>
        </tr>
        </thead>
        <?php
        while($output=mysqli_fetch_array($exes)){
        ?>
        <tr>
          <td><?php echo $j++;?></td>
          <!-- <td><img src="<?php echo $output["category_image"];?>" style="width:75px; height:75px;"></td> -->
          <td><?php echo $output["category_name"];?></td>
          <td>  <a href="delete.php?cid=<?php echo $output["cat_id"];?>" class="delte" onclick="return checkdelete()"><i class="fa fa-trash"></i></a></td>
        </tr>
        <?php
      }
      ?>
        </table>
    </div>
    <?php $k=1;?>
<div class="table-responsive-sm" id="table3" style="display: none;">
      <table class="table table-borderless table table-hover table-dark mt-3" >
      <thead class="bg-warning">  
      <tr>
          <th>Food_id</th>
          <th>Food_Image</th>
          <th>Food_Name</th>
          <th>Category_Name</th>
          <th>Chef_Name</th>
        </tr>
        </thead>
        <?php
        $sqlquery="SELECT * FROM food join admin ON admin.id=food.Chef_id  join category ON category.cat_id=food.Cat_id ";
        $resum=mysqli_query($con,$sqlquery);
        while($output=mysqli_fetch_array($resum)){
        ?>
        <tr>
          <td><?php echo $k++;?></td>
          <td><img src="<?php echo $output["Food_Image"];?>" style="width:75px; height:75px;"></td>
          <td><?php echo $output['Food_Name'];?></td>
          <td><?php echo $output["category_name"];?></td>
          <td><?php echo $output['UserName'];?></td>
        </tr>
        <?php
      }
      ?>
        </table>
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
                $('#div1').click(function(){
                    $('#table1').toggle(300);
                    $('#table2').hide(150);
                    $('#table3').hide(150);
                });
                $('#div2').click(function(){
                  $('#table1').hide(150);
                  $('#table2').toggle(300);
                  $('#table3').hide(150);
                });
                $('#div3').click(function(){
                  $('#table1').hide(150);
                  $('#table3').toggle(300);
                  $('#table2').hide(150);
                });
            });
            function checkdelete(){
              return confirm("Are You Delete This Record");
            }
        </script>

</html>