<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $scope = $_POST['scope'];
    $category = $_POST['category'];
    $title = $_POST['info'];
    $description = $_POST['det'];
    $petition_to = $_POST['petition_to'];
    $petition_by = $_POST['petition_by'];
    $petition_date = $_POST['petition_date'];
    $location = $_POST['location'];

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

    // Prepare SQL query with placeholders
    $sql = "INSERT INTO petition1 (scope, Cat, pet_title, pet_des, pet_to, pet_by, pet_date, location)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $scope, $category, $title, $description, $petition_to, $petition_by, $petition_date, $location);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Record inserted successfully";
        // Redirect to petition.html
        header("Location: homepage.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection   
    $stmt->close();
    $conn->close();
}
?>
