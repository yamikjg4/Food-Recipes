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
    <link rel="stylesheet" href="css/style1.css">
    <link rel="icon" href="LogoMakerCa-1629816030209.png">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <title>Document</title>
</head>
<body>
    <?php
    include('template/template.php');
    include('config.php');
    ?>
     <div id="content">
         <div class="container">
         <div class="table-responsive">
         <table class="table table-dark">
            <thead>
                <th>Food Name</th>
                <th>Feedback Type</th>
                <th>Total Response</th>
                <th>Chef Name</th>
            </thead>
            <tbody>
                <?php
                $sql="SELECT Food_Name,UserName,COUNT(feed_type) As responses,feed_type FROM feedback 
                JOIN food ON food.Food_id=feedback.Food_id
                JOIN admin ON admin.id=food.Chef_id
                GROUP BY feed_type;";
                $execute=mysqli_query($con,$sql);
                while($res=mysqli_fetch_array($execute)){
                    ?>
                <tr>
                <td><?php echo $res['Food_Name'];?></td>
                <td><?php echo $res['feed_type'];?></td>
                <td><?php echo $res['2'];?></td>
                <td><?php echo $res['UserName'];?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
         </table>
         </div>
            </div>
          </div>
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
            });
            </script>
</body>
</html>