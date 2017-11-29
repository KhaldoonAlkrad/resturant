<?php require 'classes.php'; ?>

<!doctype html>

<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="description" content="Order your best meal from our super resturant" />
        <meta name="keywords" content="order,meal,resturant,drink,delivery" />
        <meta name="author" content="Khaldoon Al Krad" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>PHP Resturant</title>
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <link rel="stylesheet" type="text/css" href="mystyle.css" />


    </head>

    <body >
        <header> <h1> PHP Resturant</h1> </header>
        <nav class="topnav" id="myTopnav">
            <a href="index.php" class="active">Home</a>
            <a href="menu.php">Menu</a>
            <a href="meals.php">Meals</a>
            <a href="mycart.php">My Cart</a>
            <a href="#myorders">My Orders</a>
            <a href="#myprofile">My Profile</a>
            <a href="signup.php">Register</a>
            <a href="signin.php">Sign in</a>
        </nav>

    <content>

        <div>
            <form method = "POST" action = "signup.php" autocomplete = "on">
                <fieldset>
                    <legend>Sign Up </legend> 
                    <input type="text" name="firstname" placeholder="First Name" value="" >
                    <input type="text" name="lastname" placeholder="Last Name" value="" >
                    <input type="text" name="address" placeholder="Address" value="" >
                    <input type="text" name="housenumber" placeholder="House Number" value="" >
                </fieldset>
                <fieldset>
                    <input type="text" name="email" placeholder="Email" value="" > 
                    <input type="text" name="username" placeholder="Username" value="" >
                    <input type="password" name="password" placeholder="Password" value="" > 
                    <?php
                    $account = new account("", "", "", 0, "", "", "");
                    $msg = $account->checkaccountinput();
                    ?>
                    <span class="error"><?php echo $msg; ?></span> 
                </fieldset>    
                <input type="submit" name="register" value="Register">  

            </form>

        </div>
    </content>

    <footer><h3>All Rights Reserved To Khaldoon Al Krad &reg; <?php echo date('Y') ?></h3></footer>

</body>

</html>

