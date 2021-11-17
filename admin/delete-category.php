<?php 

    //include constants page
    include('../config/constants.php');

    //echo "Delete Page";
    // check whether the image name and the id is set or not
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        //get the values from db and delete

        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //remove the physical image file
        if($image_name != "")
        {
            //image availabe delet it
            $path = "../images/category/".$image_name;
            //remove the image
            $remove = unlink($path);

            //if failed to remove the image then add an error message and stop the process
            if($remove==false)
            {
                //set the session message
                $_SESSION['remove'] = "<div class='error'>Failed to Remove category image </div>";
                //redirect to manage category page
                header('location:'.SITEURL.'admin/manage-category.php');

                //stop the process
                die();

            }

        }


        //delete data from database
        $sql = "DELETE FROM tbl_catagories WHERE id=$id";

        //execute the query
        $res = mysqli_query($conn, $sql);

        //check whether the data is deleted ornot
        if($res==true)
        {
            //set success message and redirect
            $_SESSION['delete'] = "<div class='success'>Category deleted successfully.</div>";
            //redirect to manage category
            header('location:'.SITEURL.'admin/manage-category.php'); 
        }
        else
        {
            //set fail message and redirect
            $_SESSION['delete'] = "<div class='error'>Failed to delete category.</div>";
            //redirect to manage category
            header('location:'.SITEURL.'admin/manage-category.php'); 
        }


        //redirect to manage category page with message
    }
    else
    {
        //redirect to manage category page
        header('location:'.SITEURL.'admin/manage-category.php');

    }
