<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Sign-Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Event Sign-Up</h1>
    <form action="#" method="post">
        <div class="form-group">
            <label for="eventid">Event ID:</label>
            <input type="number" id="eventid" name="eventid" required>
        </div>
        <div class="form-group">
            <label for="prn">PRN:</label>
            <input type="number" id="prn" name="prn" required>
        </div>
        <input type="submit" value="Sign Up">
    </form>
</div>

<?php
// PHP code to handle form submission and insert data into the database
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

    // Prepare SQL statement to insert data into eventsign table
    $sql = "INSERT INTO eventsign (eventid, prn) VALUES (?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $eventid, $prn);

    // Set parameters and execute
    $eventid = $_POST["eventid"];
    $prn = $_POST["prn"];
    $stmt->execute();

    // Check if the query was successful
    if ($stmt->affected_rows > 0) {
        echo "<script>alert('Sign-up successful!');</script>";
    } else {
        echo "<script>alert('Error: Sign-up failed!');</script>";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>

</body>
</html>
