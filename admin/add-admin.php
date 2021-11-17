<?php include("partials/menu.php") ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br /> <br/>

        <?php 
          if(isset($SESSION['add']))
          {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
          }
        ?>


     <form action="" method ="POST">
        <table class="tbl-30">
           <tr>
             <td>Full Name: </td>
             <td>
                <input type="text" name="full_name" placeholder="Enter Your Name">
             </td>
           </tr>

           <tr>
             <td>Username: </td>
             <td>
                <input type="text" name="username" placeholder="Your Username">
             </td>
           </tr>

           <tr>
             <td>Password: </td>
               <td>
                  <input type="password" name="password" placeholder="Your Password">
               </td>
           </tr>

           <tr>
             <td colspan ="2">
                <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
             </td>
           </tr>
       </table>
      </form>
    </div>
</div> 

<?php include("partials/footer.php"); ?>


<?php 
    //process the value from form and save it in database
    //Check wheather the button is clicked or not
    if(isset($_POST['submit']))
    {
        //Button clicked
        // echo 'Button Clicked';

        //Get the data from the form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //SQL Query to save the date into database
        $sql = "INSERT INTO tbl_admin SET
             full_name = '$full_name',
             username = '$username',
             password = '$password'
        ";

        //3. Execute Query and save data in data base
        $res = mysqli_query($conn,$sql) or die(mysqli_error());

        //$. Check wheather the query is executed data is inserted or not and display appropriate message
          if($res == TRUE)
          {
            //data inserted
            // echo "data inserted";
            //Create a session variable to display message
            $SESSION['add'] = "admin added successfully";
            //Redirect page to manage-admin
            header("location:".SITEURL.'admin/manage-admin.php');
          }
          else
          {
            //data failed to insert
            //  echo "Faied to insert data";
            //Create a session variable to display message
            $SESSION['add'] = "failed to add admin";
            //Redirect page to add-admin
            header("location:".SITEURL.'admin/add-admin.php');
          }
    }
    
?>