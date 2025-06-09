<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];
    $date = $_POST['date'];
    $plan = $_POST['plan'];

    // Database connection parameters
    $servername = "localhost"; // Replace with your server name
    $username = "root"; // Replace with your database username
    $password = ""; // Replace with your database password
    $dbname = "fitness_db"; // Replace with your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to insert data into the database
    $sql = "INSERT INTO users (name, email, phone, city, gender, date, plan)
            VALUES ('$name', '$email', '$phone', '$city', '$gender', '$date', '$plan')";


if ($conn->query($sql) === TRUE) {
    if ($conn->affected_rows > 0) {
        echo "New record created successfully";
    } else {
        echo "No data was inserted";
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

    // Close connection
    $conn->close();
}
?>