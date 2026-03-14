<?php
include 'config/database.php';

$id = $_GET['id'];

$sql = "SELECT * FROM programmes WHERE id = $id";
$result = $conn->query($sql);
$programme = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Programme Details</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav>
    <a href="index.php">Home</a>
    <a href="programmes.php">Programmes</a>
    <a href="search.php">Search</a>
</nav>

<div class="container">
    <div class="card">
        <h1><?php echo $programme['name']; ?></h1>
        <p><?php echo $programme['description']; ?></p>
        <p><strong>Level:</strong> <?php echo $programme['level']; ?></p>
    </div>

    <div class="card">
        <h2>Modules</h2>

        <?php
        $modules = $conn->query("SELECT * FROM modules WHERE programme_id = $id ORDER BY year");

        $currentYear = 0;

        while($row = $modules->fetch_assoc()){
            if($currentYear != $row['year']){
                $currentYear = $row['year'];
                echo "<h3>Year ".$currentYear."</h3>";
            }

            echo "<p>".$row['module_name']."</p>";
        }
        ?>
    </div>
</div>

</body>
</html>
