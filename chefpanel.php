<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style2.css">
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
    <title>Document</title>
</head>
<body>
<?php
include("template/template1.php");
?> 
<?php 
include("config.php");
?>   
<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-6 p-1">
                <div class="w-100" id="div1"><p class="h5 pt-5 text-center text-white">Category</p>
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
            <div class="col-md-3 col-6 p-1">
            <div class="w-100" id="div2"><p class="h5 pt-5 text-center text-white">Ingredant-Type</p>
            <?php
            $id=$_SESSION['u_id'];
            $count="SELECT COUNT(type_name)From ingredant_type WHERE id=$id ";
            $execute=mysqli_query($con,$count);
            $result=mysqli_fetch_array($execute);
            ?>
            <h6 class="text-center text-white">  <?php echo $result[0];?></h6>
    </div>
            </div>
            <div class="col-md-3 col-6 p-1">
            <div class="w-100" id="div3"><p class="h5 pt-5 text-center text-white">Food-Recipe</p>
            <?php
            $countque="SELECT COUNT(Food_Name) FROM food WHERE Chef_id=$id";
            $exek=mysqli_query($con,$countque);
            $resum=mysqli_fetch_array($exek);
            ?>
             <h6 class="text-center text-white">  <?php echo $resum[0];?></h6>
             </div>
            </div>
            <div class="col-md-3 col-6 p-1">
            <div class="w-100" id="div4"><p class="h5 pt-5 text-center text-white">Feedback
              <?php
              $query="SELECT count(feed_type) FROM feedback 
              JOIN food ON food.Food_id=feedback.Food_id
              Where food.Chef_id=$id";
              $executes=mysqli_query($con,$query);
              $res=mysqli_fetch_array($executes);
              ?>
              <h6 class="text-center text-white">  <?php echo $res[0];?></h6>
            </div>
            </div>
        </div>
    
    <div class="table-responsive" id="table4" style="display: none;">
   <table class="table table-dark mt-3">
        <thead class="bg-success">
        <th>Food Name</th>
          <th>Name</th>
          <th>Feedback type</th>
          <th>Comment</th>
        </thead>
        <tbody>      
          <?php
          $querys="SELECT * FROM feedback 
          JOIN food ON food.Food_id=feedback.Food_id
          Where food.Chef_id=$id";
          $repeat=mysqli_query($con,$querys);
          while ($shok=mysqli_fetch_array($repeat)) {
              ?> 
         <tr>
          <td><?php echo $shok["Food_Name"];?></td>
          <td><?php echo $shok["Name"]?></td>
          <td><?php echo $shok["feed_type"];?></td>
          <td><?php echo $shok["Comment"];?></td>
        </tr>
        <?php
          }
        ?>
        </tbody>

   </table>
   </div>
        <?php
        $que3="SELECT * FROM category";
        $exes=mysqli_query($con,$que3);
        ?>
        <tr>
          <?php $j=1;?>
          <div class="table-responsive" id="table1" style="display:none">
      <table class="table table-borderless table table-hover table-dark mt-3" >
      <thead class="bg-warning">  
        
      <tr>
          <th>Category_id</th>
          <!-- <th>Category_Image</th> -->
          <th>Category_Name</th>
          <!-- <th>Operation</th> -->
        </tr>
        </thead>
<?php        while($output=mysqli_fetch_array($exes)){ ?>

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
        
      <?php
      $showdata="SELECT type_id,type_name FROM ingredant_type WHERE id=$id";
      $execute1=mysqli_query($con,$showdata);
      ?>
      <?php $i=1;?>
       <div class="table-responsive-sm" id="table2" style="display:none">
      <table class="table table-borderless table table-hover table-dark mt-3" >
      <thead class="bg-warning">  
      <tr>
          <th>Type_id</th>
          <th>Type_Name</th>
          <!-- <th>Delete</th> -->
          <!-- <th>Operation</th> -->
        </tr>
        </thead>
        <?php
        while($result1=mysqli_fetch_array($execute1))
      {
     ?>
          <td><?php echo $i++?></td>
          <td><?php echo $result1["type_name"];?></td>
          <!-- <td> <a href="delete1.php?id=<?php echo $result1["type_id"];?>" class="delte" onclick="return checkdelete()">
            <i class="fa fa-trash"></i></a></td>
          <td>  <a href="delete.php?cid=<?php echo $output["cat_id"];?>" class="delte" onclick="return checkdelete()"><i class="fa fa-trash"></i></a></td> -->
        </tr>
        <?php
      }
      ?>
      <?php
      $l=1;
      $num_pages=5;
      if(isset($_GET['page'])){
        $page=$_GET['page'];
      }
      else{
        $page=1;
      }
      $start_page=($page-1)*05;
      $show="SELECT Food_Name,category.category_name,Food_Image,Food_id from food join category on food.Cat_id=category.cat_id WHERE Chef_id=$id limit $start_page,$num_pages";
      $resm=mysqli_query($con,$show);
      ?>
        </table>
          </div> 
          <div class="table-responsive-sm" id="table3">
            <table class="table table-borderless table-hover table-dark mt-3">
              <thead class="bg-success">
                <tr>
                    <th>Food_id</th>
                    <th>Food_Image</th>
                    <th>Food_Name</th>
                    <th>Category</th>
                    <th>Delete</th>
                    </tr>
              </thead>
              <?php
                while($arr2=mysqli_fetch_array($resm)){
                ?>
              <tbody>
              <tr>
                <td class="align-middle"><?php echo $arr2["Food_id"];?></td>
                <td><img src="<?php echo $arr2["Food_Image"];?>" class="image-fluid" width="90px" height="100px"></td>
                <td class="align-middle"><?php echo $arr2["Food_Name"];?></td>
                <td class="align-middle"><?php echo $arr2["category_name"];?></td>
                <td class="align-middle"><a href="delete1.php?cid=<?php echo $arr2["Food_id"];?>" class="delte" onclick="return checkdelete()"><i class="fa fa-trash"></i></a></td> 
              </tr>
              <?php
                }
              ?>
              </tbody>
            </table>
            <?php
            $countno="SELECT Food_Name,category.category_name,Food_Image,Food_id from food join category on category.cat_id=food.Cat_id WHERE Chef_id=$id";
            $ressu=mysqli_query($con,$countno);
            $no=mysqli_num_rows($ressu);
            $total_page=ceil($no/$num_pages);
           for($k=1;$k<=$total_page;$k++){
            ?>
         <a class="btn btn-primary btn-inline-block btn-sm"href="chefpanel.php?page=<?php echo $k?>"><?php echo $k;?></a>
<?php
           }
?>
    </div>
    </div>
          
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
                    $('#table4').hide(150);
                    $('#table3').hide();
                });
                $('#div2').click(function(){
                  $('#table1').hide(150);
                  $('#table4').hide(150);
                  $('#table3').hide();
                  $('#table2').toggle(300);
                });
                $('#div3').click(function(){
                  $('#table3').toggle(300);
                  $('#table4').hide(150);
                    $('#table2').hide(150);
                    $('#table1').hide();
                });
                $('#div4').click(function(){
                  $('#table4').toggle(300);
                  $('#table3').hide(150);
                    $('#table2').hide(150);
                    $('#table1').hide();
                });
                
            });
            function checkdelete(){
              return confirm("Are You Delete This Record");
            }
        </script>

</body>
</html>
