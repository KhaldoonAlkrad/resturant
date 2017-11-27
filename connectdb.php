<?php

// Connect with database ///////////////////////////////////////////////////////////////////////////////
function connectionDB() {
    $hostname = 'localhost';
    $databasenaam = 'resturant';
    $username = 'root';
    $password = '';
    $conn = new mysqli($hostname, $username, $password, $databasenaam);
    return $conn;
}


// Test the input /////////////////////////////////////////////////////////////////
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


// Account Entity Functions /////////////////////////////////////////////////////////////
function addaccount($firstname, $lastname, $address, $housenumber, $email, $username, $password) {
    $con = connectionDB();
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    } else {
        $sql = "INSERT INTO `account`(`role`, `firstname`, `lastname`, `address`, `housenumber`, `email`, `username`, `password`) VALUES ('customer','$firstname','$lastname','$address','$housenumber','$email','$username','$password')";
        echo $sql;
        $result = $con->query($sql);
        if (isset($result)) {
            global $msgSuc;
            $msgSuc = "Your Account Has Been Created Successfully!";
        }
    }
    $con->close();
}

function checkifaccountexist($username, $email) {

    $con = connectionDB();
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    } else {
        $sql = "SELECT `username`, `email` FROM `account` WHERE `username`= '$username' OR `email`= '$email'";
        $result = $con->query($sql);
        if ($result->num_rows >= 1) {
            return true;
        } else {
            return false;
        }
    }
}

//Meal Entity Functions /////////////////////////////////////////////////////////////

function getmeals() {
    $con = connectionDB();
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    } else {
        $sql = "SELECT `id`, `name`, `price`, `description`, `imagename`, `categoryid`  FROM `meal`";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td class='meals' rowspan=2> " . "<img src=images/" . $row['imagename'] . "></td>";
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