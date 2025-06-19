<?php

include 'conn.php';


$user_id = $_POST["user_id"];
$plant_id = $_POST["plant_id"];
$quantity = $_POST["quantity"];


$sql = "INSERT INTO cart (user_id, plant_id, quantity) 
                    VALUES (:user_id, :plant_id, :quantity)";

// Pripremanje upita za izvršavanje
$stmt = $pdo->prepare($sql); //statment

// Vezivanje parametara
$stmt->bindParam(':user_id', $user_id);
$stmt->bindParam(':plant_id', $plant_id);
$stmt->bindParam(':quantity', $quantity);

// Pokušaj izvršavanja upita

$stmt->execute();

header("Location:user.php?msg=uspesno");
