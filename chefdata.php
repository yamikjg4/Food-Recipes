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
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap');
</style>
    <title>Document</title>
</head>
<body>
    <?php include('template/header.php');?>
    <?php include('config.php');
   session_start();
   $id=$_SESSION['id'];
    ?>
    <section class="py-5">
        <div class="container">
        <div class="media">
            <?php 
               $que="SELECT * FROM admin WHERE id=$id";
               $exe=mysqli_query($con,$que);
               while ($res=mysqli_fetch_array($exe)) {
                   ?>
            <a class="d-flex align-self-end" href="#">
              <img src="<?php echo $res["Profile"];?>" alt="" class="img-fluid" style="width:15rem;height:18rem;">
          </a>
            <div class="media-body p-5">
                <h5 style="font-family:Playfair+Display&display=swap"><?php echo $res["UserName"];?></h5>
                <p class="lead">Email:<a href="mailto:<?php echo $res["Email"];?>" id="link3"><?php echo $res["Email"];?></a></p>
            </div>
            <?php
               }?>
        </div>
        </div>
    </section>
    <section class="py-5 animate__animated animate__fadeInLeft animate__delay-30s">
           <div class="container">
             <!-- row -->
             <div class="row">
               <!-- col 1 -->
               <div class="col-md-3 col-4">
               <div class="card">
                   <div class="card-header bg-primary"><p class="h5 text-white text-center">Filter</p></div>
                   <!-- Card Body -->
                   <div class="card-body">
                   <div class="input-group">
   <input list="output" type="text" class="form-control" name="chef" placeholder="Search Chef" id="search">
 
   <span class="input-group-btn pl-1">
        <button class="btn btn-primary" name="show"><i class="fa fa-search" aria-hidden="true"></i></button>
   </span>
</div>
<?php
$sql="SELECT * FROM food JOIN category ON category.cat_id=food.Cat_id GROUP By category.category_name";
$exe=mysqli_query($con,$sql);
while($result=mysqli_fetch_array($exe)){
?>
<br>
<input type="checkbox" id="category" name="category[]" value="<?php echo $result["Cat_id"];?>"><label class="ml-1"><?php echo $result["category_name"];?></label>
<?php } ?>
</form>
                   </div>
               </div>
               </div>
               <div class="col-md-9 col-8">
                   <div class="row">
                    <?php
                  $l=1;
                  $num_pages=9;
                  if(isset($_GET['page'])){
                    $page=$_GET['page'];
                  }
                  else{
                    $page=1;
                  }
                  $start_page=($page-1)*9;
                  $show="SELECT * FROM food where Chef_id=$id limit $start_page,$num_pages";
                  $resm=mysqli_query($con,$show);
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
                  <a href="detail.php?id=<?php echo $resp["Food_id"];?>" class="btn btn-info">Info Chef</a>
                  <!-- <p class="card-text">Text</p> -->
                </div>
                       
                       </div>
                       </div>
                      <?php
                        }
                    }
                    else{
                        echo "No Data Found";
                    }
                      ?> 
                   </div>
                   <?php
                //    $id=$_GET['id'];
            $countno="SELECT * FROM food WHERE Chef_id=$id";
            $ressum=mysqli_query($con,$countno);
            $no=mysqli_num_rows($ressum);
            $total_page=ceil($no/$num_pages);
           for($k=1;$k<=$total_page;$k++){
            ?>
         <a class="btn btn-primary btn-inline-block btn-sm" href="chefdata.php?page=<?php echo $k;?>"><?php echo $k;?></a>
<?php
           }
?>
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