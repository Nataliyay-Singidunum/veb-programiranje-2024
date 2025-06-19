<?php
include 'conn.php';

$plant_id = $_GET['plant_id'];

$sql = "DELETE FROM `plant` WHERE `plant_id` = :plant_id";

$stmt = $pdo->prepare($sql);

// Povezivanje parametara
$stmt->bindParam(':plant_id', $plant_id);

// Izvršavanje naredbe
$stmt->execute();


header("Location:admin.php");
