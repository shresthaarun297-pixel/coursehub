<?php
include 'config/database.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Programmes</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav>
    <a href="index.php">Home</a>
    <a href="programmes.php">Programmes</a>
    <a href="search.php">Search</a>
</nav>

<div class="container">
    <h1>Search Programmes</h1>

    <form method="GET" action="">
        <input type="text" name="keyword" placeholder="Enter programme name">

        <select name="level">
            <option value="">All Levels</option>
            <option value="Undergraduate">Undergraduate</option>
            <option value="Postgraduate">Postgraduate</option>
        </select>

        <button type="submit">Search</button>
    </form>

    <?php
    if (isset($_GET['keyword']) || isset($_GET['level'])) {
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
        $level = isset($_GET['level']) ? $_GET['level'] : '';

        $sql = "SELECT * FROM programmes WHERE published = 1";

        if (!empty($keyword)) {
            $sql .= " AND name LIKE '%$keyword%'";
        }

        if (!empty($level)) {
            $sql .= " AND level = '$level'";
        }

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
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
    }
    ?>
</div>

</body>
</html>
