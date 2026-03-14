<?php
include 'config/database.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Programmes</title>
</head>
<body>

<h1>Search Programmes</h1>

<form method="GET" action="">
    <input type="text" name="keyword" placeholder="Enter programme name" required>
    <button type="submit">Search</button>
</form>

<?php
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];

    $sql = "SELECT * FROM programmes WHERE name LIKE '%$keyword%' AND published = 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<h3>".$row['name']."</h3>";
            echo "<p>".$row['description']."</p>";
            echo "<a href='programme-details.php?id=".$row['id']."'>View Details</a><br><br>";
        }
    } else {
        echo "<p>No programmes found.</p>";
    }
}
?>

</body>
</html>
