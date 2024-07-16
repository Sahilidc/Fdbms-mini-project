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

// Check if the "Women's Rights" button is clicked
if (isset($_POST['womens_rights'])) {
    // Query to fetch petitions with category 'Women's Rights'
    $sql = "SELECT * FROM petition1 WHERE Cat = 'Women\'s Rights'";
    $result = $conn->query($sql);
} else {
    // Default query to fetch all petitions
    $sql = "SELECT * FROM petition1";
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purple Petitions - Women's Rights</title>
    <link rel="stylesheet" href="purple.css">
</head>
<body>
    <div class="container">
        <h2>Purple Petitions - Women's Rights</h2>
        <form method="post">
            <input type="submit" name="womens_rights" value="Women's Rights">
        </form>
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<div class="petition">';
                echo '<h3>' . $row["pet_title"] . '</h3>';
                echo '<p><strong>ID:</strong> ' . $row["id"] . '</p>';
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
