
 <?php include('partials-front/menu.php'); ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Your Needs</h2>


            <?php 
                $sql = "SELECT * FROM tbl_catagories WHERE active = 'Yes' ";

                //Execute the query
                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    while($row = mysqli_fetch_assoc($res))
                    {
                        //Get the values
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];

                        ?>
                        <a href="<?php echo SITEURL; ?>category-products.php?category_id=<?php echo $id; ?>">
                        <div class="box-3 float-container">

                        <?php 
                            if($image_name == "")
                            {
                                echo "<div class='error'>Image not Found</div>";
                            }
                            else
                            {
                                ?>
                                <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Files" class="img-responsive img-curve">
                                <?php
                            }
                        ?>

                        <!-- <h3 class="float-text text-white">
                           <?php echo $title; ?> 
                        </h3> -->
                        <div class="middle">
                           <div class="text2"><?php echo $title; ?></div>
                        </div>
                        </div>
                        </a>
                        <?php
                    }
                }
                else
                {
                    echo "<div class='error'>Category not Found</div>";
                }
            ?>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


<?php include('partials-front/footer.php'); ?>