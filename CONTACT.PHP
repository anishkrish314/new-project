<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get user inputs
  $name = $_POST['name'];
  $phone = $_POST['phone'];                   

// Database connection parameters
$servername = "localhost"; // Assuming the database is hosted on the same server
$username = "root"; // Assuming the username is root
$password = ""; // Assuming the password is empty for localhost
$database = "fitness_db"; // Name of the database

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

  // Insert user inputs into database
    $sql = "INSERT INTO contact (name, phone) VALUES ('$name', '$phone')";

    if ($conn->query($sql) === TRUE) {
      if ($conn->affected_rows > 0) {
          echo "New record created successfully";
      } else {
          echo "No data was inserted";
      }
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}  

// Close connection
$conn->close();
?>
