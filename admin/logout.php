<?php 

    include('../config/constants.php');
    //1. Destroy the session
    session_destroy();
    //redirect to log in page
    header('location:'.SITEURL.'admin/login.php');
?>