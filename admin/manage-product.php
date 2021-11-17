<?php include("partials/menu.php") ?>

<div class="main-content">
      <div class="wrapper">
        <h1>Manage Product</h2>
             <br /> <br />
            <a href="<?php echo SITEURL; ?>admin/add-product.php" class="btn-primary">Add Product</a>

            <br /> <br /> <br /> 

            <?php 
               if(isset($_SESSION['add']))
               {
                  echo $_SESSION['add'];
                  unset($_SESSION['add']);
               }

               if(isset($_SESSION['delete']))
               {
                  echo $_SESSION['delete'];
                  unset($_SESSION['delete']);
               }
               if(isset($_SESSION['upload']))
               {
                  echo $_SESSION['upload'];
                  unset($_SESSION['upload']);
               }
               if(isset($_SESSION['unauthorize']))
               {
                  echo $_SESSION['unauthorize'];
                  unset($_SESSION['unauthorize']);
               }
               if(isset($_SESSION['update']))
               {
                  echo $_SESSION['update'];
                  unset($_SESSION['update']);
               }

            ?>

            <table class="tbl-full">
                 <tr>
                   <th>S.N.</th> 
                   <th>Title</th>
                   <th>Price</th>
                   <th>Image</th>
                   <th>featured</th>
                   <th>Active</th>
                   <th>Actions</th>
                </tr>
               
                  <?php
                     //Create a  SQL query to get all the food
                     $sql = "SELECT * FROM tbl_prodcuts";

                     $res = mysqli_query($conn, $sql);

                     $count = mysqli_num_rows($res);

                     //Create Serial number variable and set Default value as 1
                     $sn=1;

                     if($count>0)
                     {
                        //we have products in database
                        //get the product from the data base
                        while($row = mysqli_fetch_assoc($res))
                        {
                           //Get the value from individual columns
                           $id = $row['id'];
                           $title = $row['title'];
                           $price = $row['price'];
                           $image_name = $row['image_name'];
                           $featured = $row['featured'];
                           $active = $row['active'];
                           ?>
                              <tr>
                                 <td><?php echo $sn++; ?></td>    
                                 <td><?php echo $title; ?></td>
                                 <td><?php echo $price; ?></td>
                                 <td>
                                    <?php 
                                       //Check Whether image is not or not
                                       if($image_name == "")
                                       {
                                          echo "<div class='error'>Image not added.</div>";
                                       }
                                       else
                                       {
                                          ?>
                                             <img src="<?php echo SITEURL; ?>image/product/<?php echo $image_name; ?>" width="100px">
                                          <?php
                                       }
                                    ?>
                                 </td>
                                 <td><?php echo $featured; ?></td>
                                 <td><?php echo $active; ?></td>
                                 <td>
                                    <a href="<?php echo SITEURL; ?>admin/update-product.php?id=<?php echo $id; ?>" class="btn-secondary">Update Product</a>
                                    <a href="<?php echo SITEURL; ?>admin/delete-product.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Product</a>
                                 </td>
                              </tr>
                           <?php
                        }
                     }
                     else
                     {
                        //prodcuts not added in the database
                        echo "<tr><td colspan = '7' class= 'error'>Products not added yet</td></tr>";
                     }
                  ?>   
            </table>
      </div>
   </div>
<?php include("partials/footer.php") ?>