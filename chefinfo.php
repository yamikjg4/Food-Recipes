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
    <link rel="icon" href="LogoMakerCa-1629816030209.png">
    <title>Document</title>
</head>
<body>
  <?php include('template/header.php');?>  
  <section class="bg-light py-5" id="section1">
      <div class="container">
          <div class="d-flex justify-content-between align-items-center">
            <div>
                <p class="lead text-md-left text-center">Cooking With Chef</p>
                <a href="#chef" class="btn btn-primary">Chef</a>
            </div>
            <div id="carouselExampleSlidesOnly" class="carousel slide d-sm-block d-none" data-ride="carousel">
  <div class="carousel-inner" style="width:350px;">
    <div class="carousel-item active" id="sliders1">
      <img class="d-block img-fluid" src="picture/Ranveer_Brar.png" alt="First slide" style="width:100%;height:350px; background-size: 100% 100%;">
    </div>
    <div class="carousel-item" id="sliders1">
      <img class="d-block img-fluid" src="picture/sanj.png" alt="Second slide" style="width:100%;height:350px; background-size: 100% 100%;">
    </div>
    <div class="carousel-item" id="sliders1">
      <img class="d-block img-fluid" src="picture/maxresdefault.png" alt="Third slide" style="width:100%;height:350px; background-size: 100% 100%;">
    </div>
  </div>
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