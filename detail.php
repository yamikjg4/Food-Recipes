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
@import url('https://fonts.googleapis.com/css2?family=Lora&display=swap');
</style>
    <title>Document</title>
</head>
<body>
    <?php include('config.php');?>
    <?php 
    $id=$_GET['id'];
    $sql="SELECT * FROM food 
    Join process ON food.Food_id=process.Food_id
    WHERE food.Food_id=$id";
    $res=mysqli_query($con,$sql);
   $array=mysqli_fetch_array($res);
    ?>
    <?php include('template/header.php');?>
    <section class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12">
                    <img src="<?php echo $array["Food_Image"];?>" alt="" srcset="" class="img-fluid">
                </div>
                <div class="col-md-6 col-12 py-5">
                <center> <h3 class="pb-1"><?php echo $array["Food_Name"];?></h3>
                   <span class="bg-secondary p-1 text-white">Total-Time:<?php echo $array["Total_Time"];?>
                </span>
                <a href="#feed" class="d-block pt-1 linked">Be First Person Review</a>
                </center>
            </div>
        </div>
    </section>
    <section class="py-2  animate__animated animate__fadeIn animate__delay-30s">
        <div class="container">
        <h5 class="text-center text-sm-left text-success">Ingredant</h5>
        <?php 
        $sql2="SELECT * FROM ingremant JOIN ingredant_type ON ingremant.type_id=ingredant_type.type_id WHERE Food_id=$id";
        $exes=mysqli_query($con,$sql2);
       
        ?>
        <table class="table">
            <tr>
                <th>Ingredant_Name</th>
                <th>Type_Name</th>
                <th>Qty</th>
            </tr>
            <?php
             while ($result=mysqli_fetch_array($exes)) {
                 ?>
            <tr>
                <td><?php echo $result["ing_name"]?></td>
                <td><?php echo $result["type_name"]?></td>
                <td><?php echo $result["qty"]?></td>
             </tr>
        <?php
             }
        ?>
        </table>
        </div>
         </section>
         <section class="py-3  animate__animated animate__fadeIn animate__delay-30s">
             <div class="container">
                 <h5 class="text-success">Process</h5>
                 <pre style="font-family: 'Lora', serif;font-size:16px;"><?php echo $array["Process"];?></pre>
                 <span>Vidolink:&nbsp;<?php if($array["Link"]){echo $array["Link"]; }else{echo "Link Not avalible";}?></span>
             </div>
         </section>
        <section class="py-3" id="feed">
           <div class="container">
               <div class="card">
                   <div class="card-header"><h5 class="text-success text-center">Feedback</h5></div>
                   <div class="card-body">
                       <form action="#" method="post">
                           <div class="form-group">
                             <label for="">UserName</label>
                             <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                             <!-- <small id="helpId" class="text-muted">Help text</small> -->
                           </div>
                           <div class="form-group">
                             <label for="">Feedback Type:</label>
                             <select name="" id="" class="form-control">
                                 <option value="1" disabled="disable" selected>Select Feedback Type</option>
                                 <option value="Excelente">Excelente</option>
                                 <option value="Good">Good</option>
                                 <option value="Better">Better</option>
                                 <option value="Bad">Bad</option>
                             </select>
                           </div>
                           <div class="form-group">
                               <label for="my-input">Comment</label>
                               <textarea class="form-control" name="process" id="autoresizing" placeholder="Enter Food Recipes"></textarea>
                           </div>
                           <div class="text-center">
                             <button class="btn btn-primary">Send Feedback</button>
                           </div>
                       </form>
                   </div>
               </div>
           </div>
        </section>
    <?php include('template/footer.php');?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="script/script.js"></script>
</html>