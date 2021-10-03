<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- FONTAWESOME : https://kit.fontawesome.com/a23e6feb03.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.  5/jquery.mCustomScrollbar.min.css">
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
          <div class="d-flex justify-content-between align-items-center text-sm-left text-center">
            <div class="w-100">
                <p class="lead text-sm-left text-center">Cooking With Chef</p>
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
  <section id="chef" class="py-1 animate__animated animate__fadeInLeft animate__delay-30s mt-2">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-4">
          <div class="card mt-2">
            <div class="card-header text-center text-white bg-primary">Search-Chef</div>
            <div class="card-body py-3">
              <form action="#" method="POST">
            <div class="input-group">
            <input list="output" type="text" name="chef" class="form-control" id="search" autocomplete="off">
      <datalist id="output">
        <!-- <option val="value">display test</option> -->
      </datalist>
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
              if(isset($_POST['show'])){
                $chef=$_POST['chef'];
                $que="SELECT * FROM admin WHERE UserName like '%$chef%' AND role_id=2";
                $exe=mysqli_query($con,$que);
               ?>
              <!-- <meta http-equiv="refresh" content="60; URL='chefinfo.php'" />  -->
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
               
              }
              $check=mysqli_num_rows($exe)>0;
              if($check){
                while ($res=mysqli_fetch_array($exe)) {
                      // echo '<option value="'.$res['UserName'].'">"'.$res['UserName'].'"</option>';
                  ?>
        
          
           
          
 <div class="col-md-4 col-6 mt-2">
            <!-- <div class="card-deck"> -->
              <div class="card">
                <img class="card-img-top img-fluid" src="<?php echo $res["Profile"]; ?>" alt="" style="width:300px;height:300px;background-size:cover;">
                <div class="card-body text-center">
                  <!-- <form action="#" method="POST"> -->
                  <h4 class="card-title text-center"><?php echo $res["UserName"]; ?></h4>
                  <a href="data.php?id=<?php echo $res["id"];?>" class="btn btn-info">Show Info</a>
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
                if (!isset($_POST['show'])) {
                    $countno="SELECT UserName,Profile FROM admin WHERE role_id=2";
                    $ressu=mysqli_query($con, $countno);
                    $no=mysqli_num_rows($ressu);
                    $total_page=ceil($no/$num_pages);
                    for ($k=1;$k<=$total_page;$k++) {
                        ?>
         <a class="my-3 btn btn-primary btn-inline-block btn-sm"href="chefinfo.php?page=<?php echo $k?>"><?php echo $k; ?></a>
<?php
                    }
                }
?>
          </div>
          
        </div>
        
      </div>
    <!-- </div> -->
  </section>
  <!-- Content -->

  <?php include('template/footer.php');?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="script/script.js"></script>
<!-- <script type="text/javascript">
  $(document).ready(function(){
    $("#search").keypress(function(event){
      $.ajax({
        type:'POST',
        url:'search.php',
        data:{
          name:$("#search").val(),
        },
        success:function(data){
          event.preventDefault();
          console.log("hi");
          $("#output").html(data);
        }
      });
    });
   });
</script> -->
</html>