<?Php
session_start();
// $id=;
$_SESSION['ids']=$_GET['id'];
if($_SESSION['ids']){
    header("location:detail.php");
    // echo '<script>alert();</script>';
}
?>