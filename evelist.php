<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .event {
            background-color: #fff;
            border-radius: 5px;
            margin-bottom: 20px;
            padding: 20px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .event:hover {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .event h2 {
            color: #555;
            margin-top: 0;
        }

        .event p {
            color: #777;
        }

        .event a {
            color: #007bff;
            text-decoration: none;
        }

        .event a:hover {
            text-decoration: underline;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            padding: 10px 20px;
            color: #fff;
        }

        .sign-event {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }

        .sign-event:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<h1>Event List</h1>
<div class="topbar">
    <h1>Event List</h1>
    <a href="evesign.php" class="sign-event">Sign Event</a>
    <a href="feedback.html">Feedback</a>
</div>

<div class="container">
    <?php
    // Your PHP code to fetch and display event list goes here
    // Example PHP code to fetch events from the database
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

    $sql = "SELECT * FROM event";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo '<div class="event">';
            echo '<h2>' . $row["evetitle"] . '</h2>';
            echo '<p><strong>ID:</strong> ' . $row["eventid"] . '</p>';
            echo '<p><strong>Department:</strong> ' . $row["departmen"] . '</p>';
            echo '<p><strong>Description:</strong> ' . $row["evedesc"] . '</p>';
            echo '<p><strong>Preferred Clubs:</strong> ' . $row["club"] . '</p>';
            echo '</div>';
        }
    } else {
        echo "No events found.";
    }
    $conn->close();
    ?>
</div>

</body>
</html>
