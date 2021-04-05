<?php

    if(!empty($_POST["submit"])){
         $fname=$_POST["firstname"];
         $lname=$_POST["lastname"];
         $content=$_POST["message"];
    
         echo '<script>alert("Your Message has been sent successfully")</script>';
    }
        
    else{
        echo '<script>alert("There is a problem, please try again!")</script>';
    }
    
?>