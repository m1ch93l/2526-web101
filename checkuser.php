<?php include "database.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query  = "SELECT * FROM user";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {

    if ($row['username'] == $username && $row['password'] == $password) {
        echo "Successfully Login";
    } else {
        echo "Login Failed";
    }

}
