<?php 

    include('../config/constants.php');

    if(isset($_GET['id']) && isset($_GET['image_name']))
    {
        //Get Id and image name
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];
        //remove the image if available
        if($image_name != "")
        {
            //Get the image path
            $path = "../images/product/".$image_name;

            $remove = unlink($path);

            //Check whether the image is removed or normalizer_get_raw_decomposition
            if($remove == false)
            {
                $_SESSION['upload'] = "<div class= 'error'>Failed to Remove image file.</div>";
                header('location:'.SITEURL.'admin/manage-product.php');
                die();
            }
        }
        //Delete product from database
        $sql = "DELETE FROM tbl_prodcuts where id= $id";

        $res = mysqli_query($conn , $sql);
        //Redirect tp manage product with session message
        if($res == true)
        {
            $_SESSION['delete'] = "<div class= 'success'>Product deleted successfully.</div>";
            header('location:'.SITEURL.'admin/manage-product.php');
        }
        else
        {
            $_SESSION['delete'] = "<div class= 'error'>failed to delete product.</div>";
            header('location:'.SITEURL.'admin/manage-product.php');
        }

        //Redirect tp manage product with session message
    }
    else
    {
        $_SESSION['unauthorize'] = "<div class= 'error'>Unauthorized Access.</div>";
        header('location:'.SITEURL.'admin/manage-product.php');
    }

?>