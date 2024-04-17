<?php
// MySQLi configuration
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$database = "your_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sample data
$name = "John Doe";
$email = "john@example.com";
$age = 30;

// Prepare SQL query
$sql = "INSERT INTO your_table_name (name, email, age) VALUES (?, ?, ?)";

// Prepare statement
$stmt = $conn->prepare($sql);

// Bind parameters
$stmt->bind_param("ssi", $name, $email, $age);

// Execute statement
if ($stmt->execute()) {
    echo "New record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
