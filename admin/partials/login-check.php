<?php

    //Authorization - Access control
    //Check whether the user is logged in ot not set
    if(!isset($_SESSION['user']))
    {
        $_SESSION['no-login-message']= "<div class='error'>Please log in to access admin panel</div>";
        header('location:'.SITEURL.'admin/login.php');
    }    

?>