<?php
session_start();
$id=$_GET['id'];
$_SESSION['id']=$id;
echo $_SESSION['id'];
if($_SESSION['id']){
    header("location:chefdata.php");
}
?>