<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="icon" href="LogoMakerCa-1629816030209.PNG">
    <title>Login</title>
    <?php 
    include ('config.php');
    ?>
</head>

<body id="id1">
    <div class="login">
        <img src="https://cdn3.iconfinder.com/data/icons/login-5/512/LOGIN_6-512.png" class="people">
        <h1>Login Here</h1>
        <form action="#" method="POST" onsubmit="return validation()">
            <p>Email Id</p>
            <input type="email" id="typeemail" class="form-control" onclick="email1()" onkeypress="email()" placeholder="Enter Email" name="username" autocomplete="off" />
            <span id="email"></span>
            <p>Password</p>
            <input type="password"  placeholder="Enter Password" onclick="pass()" onkeypress="password()" id="pwd" maxlength="10" name="hidden"/>
            <span id="password" style="display: block;"></span>
            <a href="#" class="mt-3" onclick="alertmsg()" >Forget Password</a>
            <input type="Submit" value="Login" class="form-control mt-3" name="submit" />
        </form>
    </div>
    <?php
if(isset($_POST['submit'])){
    session_start();
    $email=$_POST['username'];
    $password=$_POST['hidden'];
    $que1="SELECT * FROM admin WHERE Email='$email' AND role_id=1";
    $exe1=mysqli_query($con,$que1);
    $no=mysqli_num_rows($exe1);
    if($no>0){
       $admin=mysqli_fetch_array($exe1);
        $_SESSION['admin']=$admin["UserName"];
       if($password==$admin["Password"]){
        header("Location:admindash.php");
       }
       else{
           
        ?>
        <script>
            alert("Invalid Password");
            </script>
        <?php
       }
    }
    else{
   echo '<script>alert("Invalid User")</script>';
    }
}
?>
    <script>
        function alertmsg(){
            alert("Contact To Admin");
        }
        function email1() {
            var a = document.getElementById("typeemail").value;
            if (!a.trim()) {
                document.getElementById("email").innerHTML = "*Pls Enter Email";
                document.getElementById("email").style.color = "Blue";
            } else {
               
            }


        }

        function email() {
            var a = document.getElementById("typeemail").value;
            regex = /^[\w\d._%+-]+@(?:[\w\d-]+\.)+(\w{2,})(,|$)/;
            if (a.trim()) {
                if (regex.test(a)) {
                    document.getElementById("email").innerHTML = "VeriFied Email";
                    document.getElementById("email").style.color = "green";
                } else {
                    document.getElementById("email").innerHTML = "Not VeriFied Email";
                    // document.getElementById("email").style.visibility = "visible";
                    document.getElementById("email").style.color = "red";
                }
            }
            else {
                document.getElementById("email").innerHTML = "*Pls Add Data";
                //document.getElementById("email").style.visibility = "visible";
                document.getElementById("email").style.color = "Blue";
            }
        }

        function pass() {
            var a = document.getElementById("pwd").value;
            if (!a.trim()) {
                document.getElementById("password").innerHTML = "*Pls Enter Password";
                document.getElementById("password").style.color = "Blue";
            } else {

            }
        }

        function password() {
            var a = document.getElementById("pwd").value;
            // regex = /((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20})/;
           if(a.trim()){
               var x=a.length;
               if(x>=7 && x<=10){
                document.getElementById("password").innerHTML = "Verified Password";
                document.getElementById("password").style.color = "green";
               }
               else{
                document.getElementById("password").innerHTML = "InVerified Password";
                document.getElementById("password").style.color = "Red";
               }
           }

        }
        function validation(){
            var a = document.getElementById("typeemail").value;
            var b = document.getElementById("pwd").value;

            if(!a.trim()){
                alert("Please Enter Email id");
                return false;
            }
            else if(!b.trim()){
                alert("Please Enter Password");
                return false;
            }
            else{
                true;
            }
        }
    </script>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>