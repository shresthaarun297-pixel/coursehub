<?php
include 'config/database.php';

$id = $_GET['id'];

$sql = "SELECT * FROM programmes WHERE id = $id";
$result = $conn->query($sql);
$programme = $result->fetch_assoc();

echo "<h1>".$programme['name']."</h1>";
echo "<p>".$programme['description']."</p>";

$modules = $conn->query("SELECT * FROM modules WHERE programme_id = $id ORDER BY year");

$currentYear = 0;

echo "<h2>Modules</h2>";

while($row = $modules->fetch_assoc()){

    if($currentYear != $row['year']){
        $currentYear = $row['year'];
        echo "<h3>Year ".$currentYear."</h3>";
    }

    echo "<p>".$row['module_name']."</p>";
}
?>
