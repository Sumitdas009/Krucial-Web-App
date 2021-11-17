<?php include('partials-front/menu.php'); ?>

<?php
    //check whether the id is passed or not
    if(isset($_GET['category_id']))
    {
        $category_id = $_GET['category_id'];
        //Get the category title based on Category ID
        $sql = "SELECT title FROM tbl_catagories WHERE id=$category_id";

        //Execute the query
        $res = mysqli_query($conn,$sql);

        //Get the value from database
        $row = mysqli_fetch_assoc($res);

        //Get the title
        $category_title = $row['title'];
    }
    else
    {
        //Category not passed
        //Redirect to home page
        header('location:'.SITEURL);
    }
?>


    <!-- Products sEARCH Section Starts Here -->
    <section class="stationary-search text-center">
        <div class="container">
            
            <h2>Products on <a href="#" class="text-white">"<?php echo $category_title; ?>"</a></h2>

        </div>
    </section>
    <!-- Products sEARCH Section Ends Here -->



    <!-- Products MEnu Section Starts Here -->
    <section class="stationary-menu">
        <div class="container">
            <h2 class="text-center">Items Menu</h2>

            <?php

                //Create SQL query to get product based on selected category
                $sql2 = "SELECT * FROM tbl_prodcuts WHERE category_id = $category_id";

                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);

                $count2 = mysqli_num_rows($res2);

                if($count2>0)
                {
                    while($row2 = mysqli_fetch_assoc($res2))
                    {
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $price = $row2['price'];
                        $description = $row2['description'];
                        $image_name = $row2['image_name'];
                        ?>
                            <div class="stationary-menu-box">
                            <div class="stationary-menu-img">

                            <?php
                                if($image_name == "")
                                {
                                    echo "<div class='error'>Image Not Available.</div>";
                                }
                                else
                                {
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/product/<?php echo $image_name; ?>" alt="Files" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>

                                
                            </div>

                            <div class="stationary-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="stationary-price">$<?php echo $price; ?></p>
                                <p class="stationary-detail">
                                    <?php echo $description; ?>
                                </p>
                                <br>

                    <a href="<?php echo SITEURL; ?>order.php?product_id=<?php echo $id; ?>" class="btn btn-primary">Shop Now</a>
                </div>
            </div>

                        <?php
                    }
                }
                else
                {
                    echo "<div class='error'>Product Not Available</div>";
                }
            ?>
            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- Products Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>