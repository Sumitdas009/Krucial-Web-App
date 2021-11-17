<?php include('partials-front/menu.php'); ?>

<!-- Products sEARCH Section Starts Here -->
<section class="stationary-search text-center">
    <div class="container">

        <form action="<?php echo SITEURL; ?>product-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Products..." required>
            <input type="submit" name="submit" value="Search" class="btn btn-outline-dark">
        </form>

    </div>
</section>
<!-- Products Search Section Ends Here -->
<?php
if (isset($_SESSION['order'])) {
    echo $_SESSION['order'];
    unset($_SESSION['order']);
}
?>
<!-- Categories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Your Needs</h2>


        <?php
        $sql = "SELECT * FROM tbl_catagories WHERE active = 'Yes' AND featured = 'Yes' LIMIT 3";

        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);

        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                //Get the values like id , title ,image_name
                $id = $row['id'];
                $title = $row['title'];
                $image_name = $row['image_name'];
        ?>
                <a href="<?php echo SITEURL; ?>category-products.php?category_id=<?php echo $id; ?>">
                    <div class="box-3 float-container">

                        <?php
                        if ($image_name == "") {
                            echo "<div class='error'>image not available</div>";
                        } else {
                            //Image available
                        ?>
                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Google Mart" class="img-responsive img-curve">
                        <?php
                        }
                        ?>


                        <div class="middle">
                            <div class="text2"><?php echo $title; ?></div>
                        </div>

                        <!-- <h3 class="float-text text-white"><?php echo $title; ?> </h3> -->
                    </div>
                </a>
        <?php
            }
        } else {
            echo "<div class = 'error'>Category not added </div>";
        }
        ?>



        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->

<!-- Product MEnu Section Starts Here -->
<section class="stationary-menu">
    <div class="container">
        <h2 class="text-center">Items Menu</h2>

        <?php
        //getting  products from database that are active and featured

        $sql2 = "SELECT * FROM tbl_prodcuts WHERE active = 'Yes' AND featured = 'Yes' LIMIT 3";

        $res2 = mysqli_query($conn, $sql2);
        $count2 = mysqli_num_rows($res2);

        if ($count2 > 0) {
            while ($row = mysqli_fetch_assoc($res2)) {
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
                $image_name = $row['image_name'];

        ?>
                <div class="stationary-menu-box">
                    <div class="stationary-menu-img">
                        <?php
                        if ($image_name == "") {
                            echo "<div class='error'>Image Not available</div>";
                        } else {
                            //image available
                        ?>
                            <img src="<?php echo SITEURL; ?>images/product/<?php echo $image_name; ?>" alt="Ball Pen" class="img-responsive img-curve">
                        <?php
                        }
                        ?>

                    </div>

                    <div class="stationary-menu-desc">
                        <h4><?php echo $title; ?></h4>
                        <p class="stationary-price">₹<?php echo $price; ?></p>
                        <p class="stationary-detail">
                            <?php echo $description; ?>
                            <!-- <br><br> -->
                        </p>
                        <br>

                        <a href="<?php echo SITEURL; ?>order.php?product_id=<?php echo $id; ?>" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>

        <?php

            }
        } else {
            echo "<div class = 'error'>Product Not avilable </div>";
        }

        ?>





        <div class="clearfix"></div>
    </div>

    <p class="text-center">
        <a href="#">See All Items</a>
    </p>
</section>
<!-- Product Menu Section Ends Here -->

<?php include('partials-front/footer.php'); ?>