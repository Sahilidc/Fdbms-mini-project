<?php
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

// Query to fetch all petitions
$sql = "SELECT * FROM petition1"; // Assuming your table name is "petitions"
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purple Petitions</title>
    <link rel="stylesheet" href="purple.css">
</head>
<body>
    <div class="container">
        <h2>Purple Petitions</h2>
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<div class="petition">';
                echo '<h3>' . $row["pet_title"] . '</h3>';
                echo '<p><strong>Category:</strong> ' . $row["Cat"] . '</p>';
                echo '<p><strong>Description:</strong> ' . $row["pet_des"] . '</p>';
                echo '<p><strong>Location:</strong> ' . $row["location"] . '</p>';
                echo '<p><strong>Petition To:</strong> ' . $row["pet_to"] . '</p>';
                echo '<p><strong>Petition By:</strong> ' . $row["pet_by"] . '</p>';
                echo '<p><strong>Date:</strong> ' . $row["pet_date"] . '</p>';
                echo '</div>';
            }
        } else {
            echo "No petitions found.";
        }
        ?>
    </div>
</body>
</html>

<?php
// Close connection
$conn->close();
?>
