<?php include "database.php";

$username = $_POST['username'];

$query = "SELECT * FROM user";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);

if ($row['username'] == $username) {
    echo "Successfully Login";
}else {
    echo "Login Failed";
}
?>