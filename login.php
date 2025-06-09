<?php
// Database connection
$servername = "localhost"; // Change this if your database is on a different server
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$database = "fitness_db"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Hash the password
    //hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);// You should use a more secure hashing method
    
    // SQL query to check if the username and password match
    $sql = "SELECT * FROM user WHERE username='$username' and password='$password'";
    $result = $conn->query($sql);

    // Check if there's a match
    if ($result->num_rows == 1) {
        // Login successful
        echo "Login successful!";
        // You can redirect the user to another page here if needed
    } else {
        // Login failed
        echo "Invalid username or password.";
    }
}

// Close the connection
$conn->close();
?>