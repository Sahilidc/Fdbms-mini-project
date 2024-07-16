<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Get form data
    $username = $_POST["username"];
    $user_id = $_POST["userid"];

    // SQL query to check if user ID already exists
    $sql_check = "SELECT COUNT(*) AS count FROM user WHERE userid = '$user_id'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        $row = $result_check->fetch_assoc();
        if ($row["count"] > 0) {
            // User ID already exists, throw error
            echo "User ID already exists";
        } else {
            // SQL query to insert new record
            $sql_insert = "INSERT INTO user (userid, username) VALUES ('$user_id', '$username')";
            if ($conn->query($sql_insert) === TRUE) {
                // New record inserted successfully, redirect to #
                header("Location: sign.html");
                exit();
            } else {
                echo "Error: " . $sql_insert . "<br>" . $conn->error;
            }
        }
    } else {
        echo "Error: " . $sql_check . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
