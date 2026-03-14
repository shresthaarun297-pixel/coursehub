<?php
include 'config/database.php';

$id = $_GET['id'];

$sql = "SELECT * FROM programmes WHERE id = $id";
$result = $conn->query($sql);
$programme = $result->fetch_assoc();

echo "<h1>".$programme['name']."</h1>";
echo "<p>".$programme['description']."</p>";

$modules = $conn->query("SELECT * FROM modules WHERE programme_id = $id");

echo "<h2>Modules</h2>";

while($row = $modules->fetch_assoc()){
    echo "<p>Year ".$row['year']." - ".$row['module_name']."</p>";
}
?>
