<?php include('partials/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <br><br>

        <?php
        if (isset($_SESSION['add'])) 
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if (isset($_SESSION['upload'])) 
        {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }


        ?>

        <br><br>

        <!-- Add Category Form starts -->
        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30"> 
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>
                <tr>
                    <td>Upload Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>

                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <!-- Add category Form ends  -->

        <?php
        // check whether the submit button is clicked or not
        if (isset($_POST['submit'])) 
        {
            // echo "Clicked";

            $title = $_POST['title'];

            if (isset($_POST['featured'])) 
            {
                $featured = $_POST['featured'];
            } 
            else 
            {
                $featured = "No";
            }

            if (isset($_POST['active'])) 
            {
                $active = $_POST['active'];
            } 
            else 
            {
                $active = "No";
            }

            //check the image is set or not 
            // print_r($_FILES['image']);

            //die(); // break the code 

            if (isset($_FILES['image']['name'])) 
            {
                //upload image
                $image_name = $_FILES['image']['name'];

                    //upload image if only the image is selected
                    if($image_name != "")
                    {
                        // auto renaming the image name
                        // get the extension of our image
                        $ext = end(explode('.', $image_name));

                        //rename the image now
                        $image_name = "Product_category_".rand(000, 999).'.'.$ext;

                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "../images/category/".$image_name;

                        //finally upload the image
                        $upload = move_uploaded_file($source_path, $destination_path);

                        // check whether the image is uploaded or not
                        // if image is not uploaded then redirect with an error message
                        if ($upload == false) 
                        {
                            //set message
                            $_SESSION['upload'] = "<div class='error'> Failed to upload Image.</div>";
                            // Redirect to add category page
                            header('location:'.SITEURL.'admin/add-category.php');
                            // stop the process
                            die();
                        }
                    }
                    
            } 
            else 
            {
                //dont upload image and set the name
                $image_name = "";
            }

            // Inserting data to database 
            $sql = "INSERT INTO tbl_catagories SET
                title = '$title',
                image_name = '$image_name',
                featured = '$featured',
                active = '$active'
            ";

            //execute the query
            $res = mysqli_query($conn, $sql) or die(mysqli_error());


            // check the query
            if ($res == true) 
            {
                $_SESSION['add'] = "<div class='success'>Category Added Successfully. </div>";
                header('location:'.SITEURL.'admin/manage-category.php');
            } else 
            {
                $_SESSION['add'] = "<div class='error'>Failed To Add Category. </div>";
                header('location:'.SITEURL.'admin/add-category.php');
            }
        }


        ?>


    </div>

</div>



<?php include('partials/footer.php'); ?>