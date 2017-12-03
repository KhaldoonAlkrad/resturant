<?php require 'classes.php'; ?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="description" content="Order your best meal from our super resturant" />
        <meta name="keywords" content="order,meal,resturant,drink,delivery" />
        <meta name="author" content="Khaldoon Al Krad" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>PHP Resturant</title>
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="mystyle.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src='//ajax.googleapis.com/ajax/libs/jquery/1/jquery.js'></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
        <script src="myscript.js"></script>
        <script>
            $(document).ready(function () {
                $("#content").load("menu.php");
            });

            $(document).ready(function () {
                $("#amenu").click(function () {
                    $("#content").load("menu.php");
                });
            });

            $(document).ready(function () {
                $("#ameals").click(function () {
                    $("#content").load("meals.php");
                });
            });

            $(document).ready(function () {
                $("#aproducts").click(function () {
                    $("#content").load("products.php");
                });
            });

            $(document).ready(function () {
                $("#amycart").click(function () {
                    $("#content").load("mycart.php");
                });
            });



            $(document).ready(function () {
                $("#formsignin").submit(function () {
                    $("#content").load("menu.php");
                });
            });
            $(document).ready(function () {
                $("#formsignin").submit(function () {

                });
            });
        </script>
    </head>
    <body >
        <header> <h1> PHP Restaurant</h1> </header>

        <div class="navbar">
            <a id="amenu" class="active">Menu</a>
            <a id="ameals" class="active">Meals</a>
            <a id="aproducts">Products</a>

            <a id="asignin" href="signin.php" style="float: right;">Sign in</a>
            <a id="asignup" href="signup.php" class="material-icons" style="float: right; font-size: 18px;" >&#xe7fe;</a>
            <div id="auserlist" class="dropdown" style="float: right; display: none">
                <button class="dropbtn fa">&#xf007; 
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a id="amyorders" >My Orders</a>
                    <a id="amyprofile" >My Profile</a>
                    <a id="asignout" >Sign out</a>
                </div>
            </div> 
            <a id="amycart"  class="fa" style="float: right;">&#xf07a;</a>
        </div>

        <div id="content">


        </div>

        <footer><h3> All Rights Reserved To Khaldoon Al Krad &reg; <?php echo date('Y') ?> </h3> </footer>

    </body>
</html>
