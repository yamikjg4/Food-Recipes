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
    <title>Document</title>
</head>
<body>
  <?php include('config.php');?>
  <?php include('template/header.php');?>  
  <section class="bg-light py-5" id="section1">
      <div class="container">
          <div class="d-flex justify-content-between align-items-center">
            <div>
                <p class="lead text-md-left text-center">Cooking With Chef</p>
                <a href="#chef" class="btn btn-primary">Chef</a>
            </div>
            <div id="carouselExampleSlidesOnly" class="carousel slide d-sm-block d-none" data-ride="carousel">
  <div class="carousel-inner" style="width:400px;">
    <div class="carousel-item active" id="sliders1">
      <img class="d-block img-fluid" src="picture/Ranveer_Brar.png" alt="First slide" style="width:100%;height:350px; background-size:cover;">
    </div>
    <div class="carousel-item" id="sliders1">
      <img class="d-block img-fluid" src="picture/sanj.png" alt="Second slide" style="width:100%;height:350px; background-size:cover;">
    </div>
    <div class="carousel-item" id="sliders1">
      <img class="d-block img-fluid" src="picture/maxresdefault.png" alt="Third slide" style="width:100%;height:350px; background-size:cover;">
    </div>
  </div>
</div>
          </div>
      </div>
  </section>
  <section id="chef" class="animate__animated animate__fadeInLeft animate__delay-30s mt-2">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-4">
          <div class="card mt-2">
            <div class="card-header text-center text-white bg-primary">Search-Chef</div>
            <div class="card-body py-3">
              <form action="<?php echo $_SERVER['PHP_SELF']?>"method="GET">
            <div class="input-group">
   <input type="text" class="form-control" name="chef" autocomplete="off">
   <span class="input-group-btn pl-1">
        <button class="btn btn-primary" name="show"><i class="fa fa-search" aria-hidden="true"></i></button>
   </span>
</div>
</form>
              </div>
            </div>
          </div>
          <div class="col-md-9 col-sm-8">
            <div class="row">
              <?php
              if(isset($_GET['show'])){
                $chef=$_GET['chef'];
                $l=1;
                $num_pages=9;
                if(isset($_GET['page'])){
                  $page=$_GET['page'];
                }
                else{
                  $page=1;
                }
                $start_page=($page-1)*9;
                $que="SELECT * FROM admin WHERE UserName like '%$chef%' AND role_id=2 limit $start_page,$num_pages";
                $exe=mysqli_query($con,$que);
               ?>
              <meta http-equiv="refresh" content="60; URL='chefinfo.php'" /> 
                <?php // unset($_POST['show']);
              }
              else{
               
                $l=1;
                $num_pages=9;
                if(isset($_GET['page'])){
                  $page=$_GET['page'];
                }
                else{
                  $page=1;
                }
                $start_page=($page-1)*9;
               $que="SELECT id,UserName,Profile FROM admin WHERE role_id=2 limit $start_page,$num_pages";
               $exe=mysqli_query($con,$que);
               if (!$exe) {
                   $alert="No data Found"; ?>
 <meta http-equiv="refresh" content="4; URL='chefinfo.php'" /> 
               <?php
               }
              }
              $check=mysqli_num_rows($exe)>0;
              if($check){
                while ($res=mysqli_fetch_array($exe)) {
                  ?>
        
          
           
          
 <div class="col-md-4 col-6 mt-2">
            <!-- <div class="card-deck"> -->
              <div class="card">
                <img class="card-img-top img-fluid" src="<?php echo $res["Profile"]; ?>" alt="" style="width:300px;height:300px;background-size:cover;">
                <div class="card-body text-center">
                  <h4 class="card-title text-center"><?php echo $res["UserName"]; ?></h4>
                  <a href="chefdata.php?id=<?php echo $res["id"];?>" class="btn btn-info">Info Chef</a>
                  <!-- <p class="card-text">Text</p> -->
                </div>
              <!-- </div> -->
             
            </div> 
            
            
             </div>
             <?php }
            }
           else{
             echo "No Chef Avalible Here";
           }
                ?>
                </div>
                <?php
            $countno="SELECT UserName,Profile FROM admin WHERE role_id=2";
            $ressu=mysqli_query($con,$countno);
            $no=mysqli_num_rows($ressu);
            $total_page=ceil($no/$num_pages);
           for($k=1;$k<=$total_page;$k++){
            ?>
         <a class="my-3 btn btn-primary btn-inline-block btn-sm"href="chefinfo.php?page=<?php echo $k?>"><?php echo $k;?></a>
<?php
           }
?>
          </div>
          
        </div>
        
      </div>
    <!-- </div> -->
  </section>
  <!-- Content -->
<section class="py-5">
           <div class="container">
             <!-- row -->
             <div class="row">
               <!-- col 1 -->
               <div class="col-md-3 col-4">
              <!-- contain -->
               </div>
             </div>
           </div>
</section>
  <?php include('template/footer.php');?>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="script/script.js"></script>
</html>