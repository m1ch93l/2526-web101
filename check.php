<?php

// 1. Connection setup (Same as before)
$conn = new mysqli("localhost", "root", "", "studentdb");

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Get and clean up user input
$un = $_POST['un'];
$pw = $_POST['pw'];

// 2. Define the safe query template with a placeholder (?)
$sql = "SELECT password FROM user WHERE username = ?";

// 3. Prepare the query, which sends the template to the server
$stmt = $conn->prepare($sql);

// 4. Bind (attach) the user's input as a string ('s') to the placeholder
$stmt->bind_param("s", $un);

// 5. Run the query on the server
$stmt->execute();

// 6. Get the result
$result = $stmt->get_result();

// 7. Check if we found exactly one user
if ($result->num_rows === 1) {
    $row = $result->fetch_assoc(); 

    // 8. Check the password against the one in the database
    if ($row['password'] == $pw) {
        // Success! Log them in.
        header('location: home.php');
        exit;
    }
}

// If username not found OR password was wrong, send them back to login page
header('location: index.php');
exit;

?>