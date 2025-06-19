<?php
include 'conn.php';

$plant_id = $_POST["plant_id"];
$plant_name = $_POST["plant_name"]; // vadi iz polja forme sa navedenim name-om
$family_id = $_POST["plant_family_name"];
$size_id = $_POST["plant_size"];
$characteristic_id = $_POST["plant_characteristic"];
$price = $_POST["price"];
$current_stock = $_POST["current_stock"];

// Priprema SQL upita sa placeholder-ima
$sql = "UPDATE `plant` SET `plant_name` = :plant_name, `size_id` = :size_id, `family_id` = :family_id, `characteristic_id` = :characteristic_id, `price` = :price, `current_stock` = :current_stock 
        WHERE `plant_id` = :plant_id";

$stmt = $pdo->prepare($sql);

// Povezivanje parametara
$stmt->bindParam(':plant_name', $plant_name);
$stmt->bindParam(':size_id', $size_id);
$stmt->bindParam(':family_id', $family_id);
$stmt->bindParam(':characteristic_id', $characteristic_id);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':current_stock', $current_stock);
$stmt->bindParam(':plant_id', $plant_id);

// Izvršavanje naredbe
$stmt->execute();

header("Location:admin.php");
