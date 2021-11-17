<?php include("partials/menu.php") ?>

<div class="main-content">
   <div class="wrapper">
      <h1>Manage Category</h2>
         <br /> <br />

         <?php
         if (isset($_SESSION['add'])) 
         {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
         }

         if (isset($_SESION['remove'])) {
            echo $_SESSION['remove'];
            unset($_SESSION['remove']);
         }

         if (isset($_SESION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
         }

         if (isset($_SESION['no-category-found'])) {
            echo $_SESSION['no-category-found'];
            unset($_SESSION['no-category-found']);
         }

         if (isset($_SESION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
         }

         if (isset($_SESION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
         }

         if (isset($_SESION['failed-remove'])) {
            echo $_SESSION['failed-remove'];
            unset($_SESSION['failed-remove']);
         }


         ?>
         <br><br>


         <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Category</a>
         <br /> <br /> <br />

         <table class="tbl-full">
            <tr>
               <th>S.N.</th>
               <th>Title</th>
               <th>Image</th>
               <th>Featured</th>
               <th>Active</th>
               <th>Actions</th>
            </tr>

            <?php

            //get allcategories from database
            $sql = "SELECT * FROM tbl_catagories";

            //execute query
            $res = mysqli_query($conn, $sql);

            //count rows
            $count = mysqli_num_rows($res);

            //create serial number varibles
            $sn = 1;

            //check the data in datbase
            if ($count > 0) 
            {
               //we have data in database
               //get the data
               while ($row = mysqli_fetch_assoc($res))
               {
                  $id = $row['id'];
                  $title = $row['title'];
                  $image_name = $row['image_name'];
                  $featured = $row['featured'];
                  $active = $row['active'];

                 ?>


                  <tr>
                     <td><?php echo $sn++; ?>.</td>
                     <td><?php echo $title; ?></td>

                     <td>
                        <?php
                        //check image name is available
                        if ($image_name != "") 
                        {
                           //display the image
                        ?>
                           <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="100px">
                        <?php
                        } 
                        else 
                        {
                           //display the messsage
                           echo "<div class='error'>Image not added.</div>";
                        }

                        ?>

                     </td>

                     <td><?php echo $featured; ?></< /td>
                     <td><?php echo $active; ?></< /td>
                     <td>
                        <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Update Category</a>
                        <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Category</a>
                     </td>
                  </tr> 
                   <?php
                     }
               } 
                  else 
                  {
                     //we dont have data in databse
                        ?> 
                  <tr>
                  <td colspan="6">
                     <div class="error"> No category added</div>
                  </td>
                  </tr>


                <?php
            }
               ?>
         </table>

         <?php include("partials/footer.php") ?>