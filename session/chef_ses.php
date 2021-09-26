<?php
session_start();
if(!$_SESSION['User']){
    header("Location:login.php");
}
?>