<?php include('../config/constants.php'); ?>

<html>
    <head>
        <title>Login - Book Order System</title>
        <link rel="stylesheet" href="../css/admin1.css">
    </head>

<body>

    <div class="login">
        <h1 class="text-center">Login</h1>
        <br><br>
        <?php
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            
            if(isset($_SESSION['no-login-message']))
            {
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
            }
        ?>
        <br><br>
        <!-- login form starts here -->
        <form action="" method="POST" class="text-center">
            Username: <br>
            <input type="text" name="username" placeholder="Enter Username"><br><br>
            Password: <br>
            <input type="password" name="password" placeholder="Enter Password"><br><br>

            <input type="submit" name="submit" value="Login" class="btn-primary">
            <br><br>
        </form>
        <!-- login form ends here -->
    </div>
</body>
</html>

<?php 
    //whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
         $username = $_POST['username'];
         $password = md5($_POST['password']);

         //2. Sql to check whether the user with username and password exists or not
         $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

         //3.execute the query
         $res= mysqli_query($conn,$sql);

         $count = mysqli_num_rows($res);

         if($count==1)
         {
            //user available
            $_SESSION['login'] = "<div class='success'>Login Successful. </div>";
            $_SESSION['user'] = $username;
             //redirect to home page
            header('location:'.SITEURL.'admin/');
         }
         else
         {
             //user not available
             $_SESSION['login'] = "<div class='error test-center'>Login UnSuccessful. </div>";
             //redirect to home page
             header('location:'.SITEURL.'admin/login.php');
         }
    }

?>