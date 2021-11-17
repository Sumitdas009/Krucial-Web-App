
<?php include('partials-front/menu.php'); ?>

    <!-- products sEARCH Section Starts Here -->
    <section class="stationary-search text-center">
        <div class="container">

        <?php
            //get teh search keyword
            $search = $_POST['search'];
        ?>
            
            <h2>Products on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- products sEARCH Section Ends Here -->



    <!-- products MEnu Section Starts Here -->
    <section class="stationary-menu">
        <div class="container">
            <h2 class="text-center">Product Menu</h2>

            <?php 
                

                //SQL query to get product based on search
                $sql = "SELECT * FROM tbl_prodcuts WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count > 0)
                {
                    //products available
                    while($row = mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        ?>
                        <div class="stationary-menu-box">
                            <div class="stationary-menu-img">

                            <?php
                                if($image_name == "")
                                {
                                    //Image is not Available
                                    echo "<div class='error'>Image Not Available</div>";
                                }
                                else
                                {
                                  ?>
                                    <img src="<?php echo SITEURL; ?>images/product/<?php echo $image_name; ?>" class="img-responsive img-curve">
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

                                <a href="<?php echo SITEURL; ?>order.php?product_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>
                        <?php
                    }
                }
                else
                {
                    //products not available
                    echo "<div class='error'>Product Not Found</div>";
                }
            ?>
            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- products Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>