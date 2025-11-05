<?php

$servername   = "localhost";
$username     = "root";
$password     = "";
$databasename = "studentdb";
$conn         = new mysqli($servername, $username, $password, $databasename);

$username = $_POST['un'];
$password = $_POST['pw'];

$query  = "SELECT * FROM user WHERE username = '$username' ";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_array($result)) {
    if ($row['password'] == $password) {
        header('location: home.php');
    } else {
        header('location: index.php');
    }
}