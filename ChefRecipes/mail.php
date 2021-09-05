<?php
$to=$_SESSION['email'];
            $subject="For New Chef Registation";
            $message="(UserName)Email: ".$_SESSION['email'].'(Password)Password: '.$_SESSION['pass'];
             if(mail($to,$subject,$message,$message1)){
                echo' <script>
                alert("Mail Send Sucessfully");
                true;
            </script>';  
             }
             else{
                echo' <script>
                alert("E-Mail not found");
                return false;
            </script>';  
             }
             ?>