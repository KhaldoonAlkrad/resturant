<?php require 'connectdb.php'; ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
        <?php
        selectsql();

        function selectsql() {
            $con = connectionDB();
            if ($con->connect_error) {
                die("Connection failed: " . $con->connect_error);
            } else {
                $sql = "SELECT `id`, `name`, `price`, `type`, `description`, `imagename`, `categoryid`  FROM `meal`";
                $result = $con->query($sql);
                
                if ($result->num_rows > 0) {
                    echo "<table>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='meals' rowspan=2> "."<img src=images/".$row['imagename']."></td>";
                        echo "<td class='meals mealname'colspan=2>" . $row['name'] . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td class='meals'> " . $row['description'] . "</td>";
                        echo "<td class='meals'> &euro;" . $row['price'] . "</td>";
                        echo "<tr>";
                        
                    }
                    echo "</table>";
                }
                $con->close();
            }
        }
        ?>
    </content>

    <footer><h3> All Rights Reserved To Khaldoon Al Krad &reg; <?php echo date('Y') ?> </h3> </footer>

</body>
</html>

