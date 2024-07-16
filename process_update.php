<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the updated petition data from the form
    $id = $_POST["id"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $petition_to = $_POST["petition_to"];
    $petition_by = $_POST["petition_by"];
    $location = $_POST["location"];
    // Add more fields as needed

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

    // Prepare and execute SQL update statement
    $sql = "UPDATE petition1 SET pet_title='$title', pet_des='$description', pet_to='$petition_to', pet_by='$petition_by', location='$location' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Petition updated successfully";
    } else {
        echo "Error updating petition: " . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
