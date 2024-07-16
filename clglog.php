<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $servername = "localhost";
    $username = "root"; // Change this to your database username
    $password = ""; // Change this to your database password
    $dbname = "petiton1"; // Change this to your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO clglogin (name, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $email);

    // Set parameters and execute
    $name = $_POST["person"];
    $email = $_POST["mail"];
    $stmt->execute();

    // Close statement and connection
    $stmt->close();
    $conn->close();

    // Redirect to a success page or do other actions as needed
    header("Location: eventform.html "); // Change 'success.php' to your desired success page
    exit();
}
?>
