<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petiton1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement to insert form data into a table
$sql = "INSERT INTO crowd (occup, Amount, name, phone, email)
        VALUES ( ?, ?, ?, ?, ?)";

// Prepare and bind parameters
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssiss", $occasion, $amount, $name, $phone, $email);

// Assign form data to variable
$occasion = $_POST['occasion'];
$amount = $_POST['amount'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];

// Execute the prepared statement
if ($stmt->execute()) {
    echo "Feedback submitted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
