<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Product</h1>

        <br><br>

        <?php
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">

            <!-- --------------------------------------------------------------------------------- -->
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Title of the product">
                    </td>
                </tr>
                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Description of the product"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>

                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category">
                            <?php
                            //create php code to display categories from db
                            //1.create sql queries to get active categories
                            $sql = "SELECT * FROM tbl_catagories WHERE active= 'Yes' ";

                            //execute sql query
                            $res = mysqli_query($conn, $sql);

                            //count rows to check whether we have categories or not
                            $count = mysqli_num_rows($res);

                            //if count is greater than zero then  we have categories else we donot have
                            if ($count > 0) 
                            {
                                //we have categories
                                while ($row = mysqli_fetch_assoc($res)) 
                                {
                                    //get the values of categories
                                    $id = $row['id'];
                                    $title = $row['title'];
                                    ?>
                                    <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                    <?php
                                }
                            }
                            else 
                            {
                                //we donot have categories
                                ?>
                                <option value="0">No category found</option>
                                <?php
                            }
                            ?>
                        </select>
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
                        <input type="submit" name="submit" value="Add Products" class="btn-secondary">
                    </td>
                </tr>
            </table>
            <!-- ------------------------------------------------------------------------- -->


        </form>

        <?php 
        
        // check whether the button is clicked or not
        if(isset($_POST['submit']))
        {
            //add the product in database
            // echo "clicked";

            //1.get the data from databse
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['category'];

            //check whether the buttons for active and featured are checked or not
            if(isset($_POST['featured']))
            {
                $featured = $_POST['featured'];
            }
            else
            {
                $featured = "No";
            }

            if(isset($_POST['active']))
            {
                $active = $_POST['active'];
            }
            else
            {
                $active = "No";
            }

            //2.upload the image if selected
            //check the select image button is selected or not

            if(isset($_FILES['image']['name']))
            {
                //check the image is selected or not
                $image_name = $_FILES['image']['name'];

                //check whether the image is selected or not
                if($image_name !="")
                {
                    //image is selected
                    //A. rename the image
                    $ext = end(explode('.', $image_name));

                    //CREATE new name
                    $image_name = "Product-Name-".rand(0000,9999).".".$ext;   //new image name may be  "product-name-"

                    //upload the image
                    //get teh src path and destination path

                    //Source path is the current location of the image
                    $src = $_FILES['image']['tmp_name'];

                    //destination path for the image to be uploaded
                    $dst = "../images/product/".$image_name;

                    //finally upload image product image
                    $upload = move_uploaded_file($src, $dst);

                    //check whether image uplaoded or not
                    if($upload == false)
                    {
                        //failed to uplaod the image
                        //redirect to add prodcut page with error message
                        $_SESSION['upload'] = "<div class = 'error'>failed to uplad image.</div>";
                        header('location:'.SITEURL.'admin/add-product.php');
                        //stop the process
                        die();
                    }
                }
        
            }
            else
            {
                $image_name= ""; //Setting default value as blank
            }

            //3.insert into databse

            //Create a sql query to save tor add product
            $sql2 = "INSERT INTO tbl_prodcuts SET
                title = '$title',
                description = '$description',
                price = $price,
                image_name = '$image_name',
                category_id = $category,
                featured = '$featured',
                active = '$active'

            ";
            //execute the Query
            $res2 = mysqli_query($conn, $sql2);
            //4.redirect with message to manage products page
            if($res2 == true)
            {
                $_SESSION['add'] = "<div class = 'success'>Product Added Successfully.</div>";
                header('location:'.SITEURL.'admin/manage-product.php');
            }
            else
            {
                $_SESSION['add'] = "<div class = 'error'>Failed to add prodcut.</div>";
                header('location:'.SITEURL.'admin/manage-product.php');
            }
            
        }
        
        
        ?>
    </div>
</div>

<?php include('partials/footer.php') ?>