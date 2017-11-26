<?php require 'connectdb.php'; ?>
<?php

$msg = $usernameErr = $passwordErr = $username = $password = "";

function selectsql($username, $password) {
    $con = connectionDB();
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    } else {
        $sql = "SELECT `id`, `username`, `password` FROM `account` WHERE `username`= BINARY '$username' AND `password`= BINARY '$password'";
        $result = $con->query($sql);
        if (isset($result)) {
            if ($result->num_rows <= 0) {
                global $msg;
                $msg = "username or password does not match";
            } else {
                header('Location:index.php');
            }
        }
    }
    $con->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    if ($username != "" && $password != "") {
        selectsql($username, $password);
    }
}


    