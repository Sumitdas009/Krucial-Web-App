<?php
    //start Session
    
    session_start();


    //Create Constants to store Non Repeating Values
    define('SITEURL','http://localhost/minorproject/');
    define('LOCALHOST','localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME','ecom');

    $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error()); //Database connection
    $db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error()); //selecting Database
