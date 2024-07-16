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
        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
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

<div class="container">
    <h2>Select Petition to Delete:</h2>
    <form action="delete_petition.php" method="post">
        <label for="petition">Select Petition:</label>
        <select name="petition" id="petition">
            <?php
            // PHP code to fetch petition titles from MySQL database
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

            // Query to fetch petition titles
            $sql = "SELECT id, pet_title FROM petition1";
            $result = $conn->query($sql);

            // Display options for selecting a petition
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['pet_title'] . "</option>";
                }
            } else {
                echo "<option value=''>No petitions found</option>";
            }

            // Close connection
            $conn->close();
            ?>
        </select>
        <input type="submit" value="Delete">
    </form>
</div>

</body>
</html>
