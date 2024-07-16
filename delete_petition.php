<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Petition</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        .message {
            margin-top: 20px;
            padding: 10px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .error {
            color: #8E65ee;
        }

        .success {
            color: #533b8c;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Delete Petition</h2>
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

            // Prepare and execute SQL delete statement
            $sql = "DELETE FROM petition1 WHERE id = $petition_id";

            if ($conn->query($sql) === TRUE) {
                echo "<div class='message success'>Petition deleted successfully</div>";
            } else {
                echo "<div class='message error'>Error deleting petition: " . $conn->error . "</div>";
            }

            // Close connection
            $conn->close();
        }
        ?>
    </div>
</body>

</html>
