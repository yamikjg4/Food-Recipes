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
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <title>Contact Us</title>
</head>
<body>
    <?php
    include('template/header.php');
    ?>
    <section class="bg-light py-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div id="div2" class="w-100 text-center text-sm-left">
                    <p class="lead text-center text-sm-left">If You Need to Register Contact us</p>
                    <a href="#con" class="btn btn-primary">Contact-Us</a>
                </div>
                <img src="picture/sub.png" alt="" class="w-50 img-fluid d-sm-block d-none"  id="flex1">
            </div>
        </div>
    </section>
    <section class="py-5 animate__animated animate__fadeIn animate__delay-30s" id="section1">
        <div class="container">
        <div class="row">
            <div class="col-md-6 col-12">
            <div class="card mx-auto w-75">
                  <img class="card-img-top img-fluid" src="picture/Yamik.jpg" alt="" width="300px" height="200px">
                  <div class="card-body text-sm-center text-left" id="body">
                      <h6 class="card-title">Yamik Gandhi</h6>
                      <p class="card-text">Mobile-NO:7069976533
                        Email:<a href = "mailto:20MCA022@charusat.edu.in" id="link1">20MCA022@charusat.edu.in</a>
                      </p>
                  </div>
              </div>
            </div>
            <div class="col-md-6 col-12">
            <div class="card w-75 mx-auto">
                  <img class="card-img-top img-fluid" src="picture/MCA.jfif" alt="" width="300px" height="200px">
                  <div class="card-body text-center">
                      <h6 class="card-title">Maharshi Patel</h6>
                      <p class="card-text">Mobile-NO:9265008857
                          Email:<a href = "mailto:20MCA083@charusat.edu.in" id="link1">20MCA083@charusat.edu.in</a>
                      </p>
                  </div>
              </div>
            </div>
        </div>    
     
   </div>
    </section>
   <section class="bg-secondary py-5 text-white text-center" id="con">
       <div class="container">
           <div class="row">
               <div class="col-6">
               <p class="h5">Chef Recipes</p>
                    <p>Address:Charusat University</p>
               </div>
               <div class="col-6">
               <p>Email:<a href="mailto:foodrecipes51@gmail.com" id="link2">&nbsp;foodrecipes51@gmail.com</a></p>
                    <p>Contact no:02642267156</p>
               </div>
           </div>
       </div>
   </section>
    <?php
    include('template/footer.php');
    ?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="script/script.js">
</script>
</html>