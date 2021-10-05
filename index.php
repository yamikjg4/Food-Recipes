<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- FONTAWESOME : https://kit.fontawesome.com/a23e6feb03.js -->
    <link rel="stylesheet"   href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.  5/jquery.mCustomScrollbar.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styled.css">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="icon" href="LogoMakerCa-1629816030209.png">
    <style>
@import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');
</style>
    <title>Home</title>
</head>
<?php include('config.php');?>
<body id="color">
<div class="loader" id="loader">
<img src="loader.gif" alt="" class="image-fluid img">
<p class="heading">Chef-Recipes</p>
</div>    
<div id="content">
    <?php include("template/header.php");?>
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" id="sliders">
      <img class="d-block img-fluid" src="https://wallpaperforu.com/wp-content/uploads/2020/08/food-wallpaper-200802192358221152x864.jpg" alt="First slide" style="width:100%;height:600px; background-size:cover;">
    </div>
    <div class="carousel-item" id="sliders">
      <img class="d-block" src="https://images.unsplash.com/photo-1528279027-68f0d7fce9f1?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTB8fGp1bmslMjBmb29kfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&w=1000&q=80" alt="Second slide" style="width:100%;height:600px; background-size:cover;">
    </div>
    <div class="carousel-item" id="sliders">
      <img class="d-block" src="https://wallpaperaccess.com/full/271681.jpg" alt="Third slide" style="width:100%;height:600px; background-size:cover;">
    </div>
  </div>
</div>
<?php
    // $checked=[];
    if (isset($_POST['show'])) {
      if(!(empty($_POST['food'])) && isset($_POST['category'])){
        $food=$_POST['food'];
       $sql="SELECT * FROM food WHERE Food_Name like'%$food%' AND Cat_id IN (".implode(",",$_POST['category']).")";
       $resm=mysqli_query($con, $sql);
      }
      else if(!(empty($_POST['food'])) && !(isset($_POST['category']))){
        $food=$_POST['food'];
        $sql="SELECT * FROM food WHERE Food_Name like'%$food%'";
        $resm=mysqli_query($con, $sql);
      }
      else if(empty($_POST['food']) && isset($_POST['category'])){
        $sql="SELECT * FROM food WHERE Cat_id IN (".implode(",",$_POST['category']).")";
        $resm=mysqli_query($con, $sql);
      }
      else if(empty($_POST['food']) && !(isset($_POST['category']))){
        $sql="SELECT * FROM food";
        $resm=mysqli_query($con, $sql);
      }
    } else {
        $l=1;
        $num_pages=9;
        if (isset($_GET['page'])) {
            $page=$_GET['page'];
        } else {
            $page=1;
        }
        $start_page=($page-1)*9;
        $show="SELECT * FROM food limit $start_page,$num_pages";
        $resm=mysqli_query($con, $show);
    } ?>
    <section class="py-5 animate__animated animate__fadeInLeft animate__delay-30s">
           <div class="container">
             <!-- row -->
             <div class="row">
               <!-- col 1 -->
               <div class="col-md-3 col-4">
               <div class="card">
                 <form action="" method="post">
                   <div class="card-header bg-primary"><p class="h5 text-white text-center">Filter</p></div>
                   <!-- Card Body -->
                   <div class="card-body">
                   <div class="input-group">
   <input list="output1" type="text" class="form-control" name="food" placeholder="Search Food" id="search1" autocomplete="off">
   <datalist id="output1">
        <!-- <option val="value">display test</option> -->
      </datalist>
   <span class="input-group-btn pl-1">
        <button class="btn btn-primary" name="show"><i class="fa fa-search" aria-hidden="true"></i></button>
   </span>
</div>
<ul class="list-group">
<?php
$sql="SELECT * FROM food JOIN category ON category.cat_id=food.Cat_id GROUP By category.category_name";
    $exe=mysqli_query($con, $sql);
    while ($result=mysqli_fetch_array($exe)) {
        if (isset($_GET['size'])) :
    if (in_array($result["cat_id"], $_POST['category'])) :
        $size_check='checked="checked"'; else : $size_check="";
        endif;
        endif; ?>
<li class="list-group-item">
  <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input" name="category[]" id="" value="<?php echo $result["cat_id"]; ?>" <?=@$size_check?> >
     
      <label>
      <?php echo $result["category_name"]; ?>
    </label>
  </div>
  <!-- <input type="checkbox" id="category" name="category[]" value=""><label class="ml-1"></label> -->
  </li>
<?php
    } ?>
</ul>
</form>
                   </div>
               </div>
               </div>
               <div class="col-md-9 col-8">
                   <div class="row">
                    <?php
                    if (mysqli_num_rows($resm)>0) {
                        while ($resp=mysqli_fetch_array($resm)) {
                            ?>
                       <div class="col-md-4 col-6">
                       <div class="card">
                         <div class="inner">
              <img class="card-img-top img-fluid" src="<?php echo $resp["Food_Image"]; ?>" alt="" style="width:300px;height:300px;background-size:cover;">
              </div> 
              <div class="card-body text-center">
                  <h5 class="card-title text-center"><?php echo $resp["Food_Name"]; ?></h5>
                  <a href="session.php?id=<?php echo $resp["Food_id"]; ?>" class="btn btn-info">Show Recipe</a>
                  <!-- <p class="card-text">Text</p> -->
                </div>
                       
                       </div>
                       </div>
                      <?php
                        }
    }
                    else{
                        echo "No Data Found Here";
                    }?> 
                   </div>
                   <?php
                   if (!isset($_POST['show'])) {
                       //    $id=$_GET['id'];
            $countno="SELECT * FROM food";
                       $ressum=mysqli_query($con, $countno);
                       $no=mysqli_num_rows($ressum);
                       $total_page=ceil($no/$num_pages);
                       for ($k=1;$k<=$total_page;$k++) {
                           ?>
         <a class="my-3 btn btn-primary btn-inline-block btn-sm" href="index.php?page=<?php echo $k; ?>"><?php echo $k; ?></a>
<?php
                       }
                   }
?>
               </div>
             </div>
           </div>
</section>
    <?php include('template/footer.php')
    ?>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="script/script.js"></script>
</html>