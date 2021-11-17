<?php include('partials/menu.php'); ?>
      <!-- Main Content section Starts -->
      <div class="main-content">
      <div class="wrapper">
              <h1>DASHBOARD</h2>
              <br><br>
            <?php
                    if(isset($_SESSION['login']))
                        {
                            echo $_SESSION['login'];
                            unset($_SESSION['login']);
                        }
            ?>
            <br><br>
              <div class ="col-4 text-center"> 
                  <?php 
                    $sql = "SELECT * FROM tbl_catagories";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);

                  ?>
                  <h1><?php echo $count; ?></h1>
                  <br />
                  Categories
              </div>

              <div class ="col-4 text-center">
                  
                <?php 
                $sql2 = "SELECT * FROM tbl_prodcuts";
                $res2 = mysqli_query($conn, $sql2);
                $count2 = mysqli_num_rows($res2);
                ?>
                  <h1><?php echo $count2; ?></h1>
                  <br />
                  Products
              </div>

              <div class ="col-4 text-center">
                <?php 
                $sql3 = "SELECT * FROM tbl_order";
                $res3 = mysqli_query($conn, $sql3);
                $count3 = mysqli_num_rows($res3);
                ?> 
                  <h1><?php echo $count3; ?></h1>
                  <br />
                  Total Orders
              </div>

              <div class ="col-4 text-center"> 
                <?php

                    $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status = 'Delivered'";
                    $res4 = mysqli_query($conn, $sql4);
                    $row4 = mysqli_fetch_assoc($res4);

                    $total_income = $row4['Total'];
                ?>
                  <h1>$<?php echo $total_income; ?></h1>
                  <br />
                  Total Income
              </div>

              <div class="clearfix"></div>
         </div>
      </div> 
      <!-- Main Content Ends -->



<?php include("partials/footer.php") ?>