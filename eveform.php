<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $prn = $_POST["prn"];
    $department = $_POST["department"];
    $event_title = $_POST["event_title"];
    $event_description = $_POST["event_description"];
    $preferred_clubs = $_POST["preferred_clubs"];

    // Database connection parameters
    $servername = "localhost"; // Change this to your server name
    $username = "root"; // Change this to your username
    $password = ""; // Change this to your password
    $dbname = "petiton1"; // Change this to your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO event (PRN, departmen, evetitle, evedesc, club) VALUES (?, ?, ?, ?, ?)");

    // Bind parameters
    $stmt->bind_param("iisss", $prn, $department, $event_title, $event_description, $preferred_clubs);

    // Execute statement
    if ($stmt->execute()) {
        // Record inserted successfully, redirect to evelist.php
        header("Location: evelist.php");
        exit(); // Make sure to exit after redirection to prevent further execution
    } else {
        echo "Error: " . $conn->error;
    }
    
    // Close statement and connection
    $stmt->close();
    $conn->close();
    
}
?>
