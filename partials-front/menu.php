<!-- <?php include('config/constants.php'); ?> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Krucial</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
    <!-- CSS only -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"> -->
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">

        <div class="container">



            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>landing.php">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>products.php">Products</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>admin/index.php" target="_blank">Admin Login</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>shopping/index.php" target="_blank">Online Pharmacy</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->