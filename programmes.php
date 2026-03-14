<?php
include 'config/database.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Programmes</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav>
    <a href="index.php">Home</a>
    <a href="programmes.php">Programmes</a>
    <a href="search.php">Search</a>
</nav>

<div class="container">
    <h1>Available Programmes</h1>

    <?php
    $sql = "SELECT * FROM programmes WHERE published = 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            echo "<div class='card'>";
            echo "<h3>".$row['name']."</h3>";
            echo "<p>".$row['description']."</p>";
            echo "<p><strong>Level:</strong> ".$row['level']."</p>";
            echo "<a class='btn' href='programme-details.php?id=".$row['id']."'>View Details</a>";
            echo "</div>";
        }
    } else {
        echo "<p>No programmes found.</p>";
    }
    ?>
</div>

</body>
</html>
