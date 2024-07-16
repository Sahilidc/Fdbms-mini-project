<!DOCTYPE html>
<html>
<head>
    <title>Insert Pet Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #ddd;
            padding: 20px;
            border-radius: 10px;
        }
        h2 {
            color: #6a1b9a;
        }
        input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #6a1b9a;
            color: #fff;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #4a148c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 style="text-align: center;">Insert Pet Status</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="id">Pet ID:</label>
            <input type="text" id="id" name="id" required>
            <label for="status">Status:</label>
            <input type="text" id="status" name="status" value="open" required>
            <input type="submit" value="Insert">
        </form>
        
        <?php
        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Establish connection to the database
            $servername = "your_servername";
            $username = "your_username";
            $password = "your_password";
            $dbname = "your_database";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Retrieve values from the form
            $id = $_POST['id'];
            $status = $_POST['status'];

            // SQL query to insert values into petstatus table
            $sql = "INSERT INTO petstatus (id, status) VALUES ('$id', '$status')";

            if ($conn->query($sql) === TRUE) {
                echo "New record inserted successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
        ?>
    </div>
</body>
</html>
