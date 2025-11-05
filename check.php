<?php

$servername   = "localhost";
$username     = "root";
$password     = "";
$databasename = "studentdb";
$conn         = new mysqli($servername, $username, $password, $databasename);

$username = $_POST['un'];
$input_password = $_POST['pw'];

$query  = "SELECT * FROM user WHERE username = '$username' ";
$result = mysqli_query($conn, $query);

// Check if a user was found
if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result); // Use fetch_assoc for clearer column access

    if ($row['password'] == $input_password) {
        // Success
        header('location: home.php');
        exit;
    } else {
        // Incorrect Password
        header('location: index.php');
        exit;
    }
} else {
    // Incorrect Username (No rows found)
    header('location: index.php');
    exit;
}