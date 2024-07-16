<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Petition</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h2 {
            color: #333;
        }
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 0 auto;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        input[type="text"],
        textarea {
            width: calc(100% - 20px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea {
            height: 100px;
        }
        .center {
            text-align: center;
        }
        input[type="submit"] {
            background-color: #8E65ee;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #533b8c;
        }
    </style>
</head>
<body>

<h2>Update Petition</h2>
<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the selected petition ID from the form
    $petition_id = $_POST["petition"];

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

    // Fetch the existing petition data
    $sql_select = "SELECT * FROM petition1 WHERE id = $petition_id";
    $result_select = $conn->query($sql_select);

    if ($result_select->num_rows > 0) {
        $row = $result_select->fetch_assoc();
        // Display the existing petition data for updating
        echo "<form action='process_update.php' method='post'>";
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
        echo "<table>";
        echo "<tr><th>Field</th><th>Value</th></tr>";
        echo "<tr><td>Title</td><td><input type='text' name='title' value='" . $row['pet_title'] . "'></td></tr>";
        echo "<tr><td>Description</td><td><textarea name='description'>" . $row['pet_des'] . "</textarea></td></tr>";
        echo "<tr><td>Petition To</td><td><input type='text' name='petition_to' value='" . $row['pet_to'] . "'></td></tr>";
        echo "<tr><td>Petition By</td><td><input type='text' name='petition_by' value='" . $row['pet_by'] . "'></td></tr>";
        echo "<tr><td>Location</td><td><input type='text' name='location' value='" . $row['location'] . "'></td></tr>";
        // Add more rows for other fields you want to update
        echo "</table>";
        echo "<div class='center'><input type='submit' value='Update'></div>";
        echo "</form>";
    } else {
        echo "Petition not found";
    }

    // Close connection
    $conn->close();
}
?>

</body>
</html>
