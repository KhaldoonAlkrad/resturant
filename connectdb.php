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


