<?php require 'handelingsignin.php'; ?>
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
            <a href="#products">Porducts</a>
            <a href="#mycart">My Cart</a>
            <a href="#myorders">My Orders</a>
            <a href="#myprofile">My Profile</a>
            <a href="signup.php">Register</a>
            <a href="signin.php">Sign in</a>
        </nav>

    <content>

        <div>
            <form method = "POST" action = "signin.php" autocomplete = "on">
                <fieldset>
                    <legend>Sign in</legend> 
                    <input type="text" name="username" placeholder="Username" value="" >
                     <span class="error"><?php echo $usernameErr;?></span>
                     <input type="password" name="password" placeholder="Password" value="" > 
                    <span class="error"><?php echo $passwordErr;?></span>
                      <span class="error"><?php echo $msg; ?></span> 
                </fieldset>     
                <input type="submit" name="signin" value="Sign in">  
                
            </form>
            
        </div>
    </content>

     <footer><h3> All Rights Reserved To Khaldoon Al Krad &reg; <?php echo date('Y') ?> </h3> </footer>

</body>

</html>