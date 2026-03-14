<?php
include 'config/database.php';

$sql = "SELECT * FROM programmes WHERE published = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        echo "<h3>".$row['name']."</h3>";
        echo "<p>".$row['description']."</p>";
        echo "<a href='programme-details.php?id=".$row['id']."'>View Details</a><br><br>";
    }
} else {
    echo "No programmes found";
}
?>