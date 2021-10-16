<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="icon" href="LogoMakerCa-1629816030209.PNG">
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
    include("config.php");
    ?>
    <?php
    $type_err='';
    $id=$_SESSION['u_id'];
    // $id=$_SESSION['id'];
    if(isset($_POST['submit'])){
        $type=$_POST['type'];
        if(empty($type)){
            $type_err="Please Enter Ingreadent Type";
        }
        // if(!empty($type)){
        //     if(strlen($type)>3 && strlen($type)<50){
        //         $type_err="Not Expected Name";
        //     }
        // }
        else{
        $ques="SELECT * FROM ingredant_type WHERE type_name='$type' AND id=$id";
        $exe=mysqli_query($con,$ques);
        $row=mysqli_num_rows($exe);
        if($row>0){
            $type_err="Already Avalible";
        }
        else{
            $insert="INSERT INTO ingredant_type(type_name, id) VALUES ('$type',$id)";
            $execute=mysqli_query($con,$insert);
            if($exe){
                echo '<script>alert("Ingredant type Add sucessfully");</script>';
            }
            else{
                echo '<script>alert("Unexpacted Error");</script>';
            }
        }
        }
    }
    ?>
    <div id="content">
        <div class="container">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white text-center">Ingredant-Type</h4>
                </div>
                <div class="card-body">
                    <form action="#" method="post">
                        <div class="form-group">
                          <label for="">Ingredant-type</label>
                          <input type="text" name="type" id="fname" class="form-control" placeholder="" aria-describedby="helpId" onclick="first()" onkeypress="firstname()" autocomplete="off">
                        <span id="fvalid" style="color:red;"><?php echo $type_err;?></span>
                        </div>
                        <div class="form-group">
                           <button type="submit" name="submit" class="btn btn-primary btn-block">Add Type</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
          </div> 
     </div>

    </div>
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
        });
    </script>
<script>
    function first() {
    var cheffirst = document.getElementById("fname").value;
    if (!(cheffirst.trim())) {
        document.getElementById("fvalid").innerHTML = "Pls Enter Chef First Name";
        document.getElementById("fvalid").style.color = "red";
    }
    // else{
    //     document.getElementById("fvalid").style.display="none";
    // }
}

function firstname() {
    var cheffirst = document.getElementById("fname").value;
    if (cheffirst.trim()) {
        if (cheffirst.length >= 1 && cheffirst.length <= 50) {
            document.getElementById("fvalid").innerHTML = "Valid Chef First Name";
            document.getElementById("fvalid").style.color = "green";
        } else {
            document.getElementById("fvalid").innerHTML = "InValid Chef First Name";
            document.getElementById("fvalid").style.color = "Red";
        }
    }
}
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}

    </script>
</html>