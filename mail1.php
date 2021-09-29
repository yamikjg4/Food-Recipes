<?php
$to=$_SESSION['email'];
$line="\n";
            $subject="For New Chef Renewer Details";
            $message = 'Hi '.$_SESSION['user'].$line.'Your email Id:'.$_SESSION['email'].$line.'Updated Password:'.$_SESSION['pass'];
             if(mail($to,$subject,$message)){
                echo' <script>
                alert("Mail Send Sucessfully");
                true;
            </script>';
            // header("location:true.php");  
             }
             else{
                echo' <script>
                alert("E-Mail not found");
                return false;
            </script>';  
             }
             ?>