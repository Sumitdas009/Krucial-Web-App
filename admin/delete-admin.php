<?php 
     
     //Include constants.php. file here
     include('../config/constants.php');

    //1. Get the ID of admin to be deleted
    echo $id = $_GET['id'];

    //2. Create SQL Query to delete admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    //execute the Query

    $res = mysqli_query($conn,$sql);

    //Check wheather the Query executed successfully
    if($res==true)
    {
        // echo "Admin deleted";
        $_SESSION['delete'] = "<div class='success'>Admin Deleted successfully.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else{
        // 
        $_SESSION['delete'] = "<div class='error'>failed to delete admin. Try again later.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    //3. Redirect to manage Admin Page with message.

?>