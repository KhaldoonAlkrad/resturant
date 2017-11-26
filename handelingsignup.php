<?php require 'connectdb.php'; ?>
<?php

$msgErr = $usernameErr = $passwordErr = $firstnameErr = $lastnameErr = $emailErr = $addressErr = $housenumberErr = $address = $housenumber = $firstname = $lastname = $username = $password = $email = $msgSuc = "";



function insertsql($firstname, $lastname, $address, $housenumber, $email, $username, $password) {
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

function checkifexist($username, $email) {

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["firstname"])) {
        $firstname = test_input($_POST["firstname"]);
        if ($firstname == "") {
            $firstnameErr = "firstname can not be empty <br>";
        }
    }
    if (isset($_POST["lastname"])) {
        $lastname = test_input($_POST["lastname"]);
        if ($lastname == "") {
            $lastnameErr = "lastname can not be empty";
        }
    }
    if (isset($_POST["address"])) {
        $address = test_input($_POST["address"]);
        if ($address == "") {
            $addressErr = "address can not be empty";
        }
    }
    if (isset($_POST["housenumber"])) {
        $housenumber = test_input($_POST["housenumber"]);
        if ($housenumber == "") {
            $housenumberErr = "house number can not be empty";
        }
    }
    if (isset($_POST["email"])) {
        $email = test_input($_POST["email"]);
        if ($email == "") {
            $emailErr = "email can not be empty";
        }
    }
    if (isset($_POST["username"])) {
        $username = test_input($_POST["username"]);
        if ($username == "") {
            $usernameErr = "username can not be empty <br>";
        }
    }
    if (isset($_POST["password"])) {
        $password = test_input($_POST["password"]);
        if ($password == "") {
            $passwordErr = "password can not be empty";
        }
    }

    if ($username != "" && $password != "" && $firstname != "" && $lastname != "" && $email != "" && $address != "" && $housenumber != "") {
        $ex = checkifexist($username, $email);
        if ($ex == false) {
            
            insertsql($firstname, $lastname,$address, $housenumber, $email, $username, $password);
        } else {
            $msgErr = "the username or the email that you have enterd is al ready exist! Please choose another one";
        }
    }
}


        