<?php include('partials-front/menu.php'); ?>

<section class="stationary-search text-center">
    <div class="container">

        <form action="<?php echo SITEURL; ?>product-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Products..." required>
            <input type="submit" name="submit" value="Search" class="btn btn-outline-dark">
        </form>

    </div>
</section>

<!-- Stationary Search Section Starts Here -->
<section class="stationary-menu">
    <div class="container">
        <h2 class="text-center">Items Menu</h2>

        <?php
        $sql = "SELECT * FROM tbl_prodcuts WHERE active = 'Yes' ";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if ($count > 0) {
            //products available
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['id'];
                $title = $row['title'];
                $description = $row['description'];
                $price = $row['price'];
                $image_name = $row['image_name'];

        ?>
                <div class="stationary-menu-box">
                    <div class="stationary-menu-img">

                        <?php
                        if ($image_name == "") {
                            echo "<div class='error'>Image Not available</div>";
                        } else {
                        ?>
                            <img src="<?php echo SITEURL; ?>images/product/<?php echo $image_name; ?>" alt="Ball Pen" class="img-responsive img-curve">
                        <?php
                        }
                        ?>

                    </div>

                    <div class="stationary-menu-desc">
                        <h4> <?php echo $title; ?></h4>
                        <p class="stationary-price">₹<?php echo $price; ?>
                        </p>
                        <p class="stationary-detail">
                            <?php echo $description; ?> <br><br>
                        </p>
                        <br>
                        <a href="<?php echo SITEURL; ?>order.php?product_id=<?php echo $id; ?>" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
        <?php
            }
        } else {
            //product not available
            echo "<div class='error'>Product not available</div>";
        }
        ?>




        <div class="clearfix"></div>



    </div>

    <p class="text-center">
        <a href="#">See All Items</a>
    </p>
</section>
<!-- Products Menu Section Ends Here -->

<?php include('partials-front/footer.php'); ?>