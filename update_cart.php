<?php
include 'conn.php';

$cart_id = $_POST['cart_id'];
$quantity = $_POST['new_quantity'];
// Priprema SQL upita za ažuriranje
$sql = "UPDATE cart SET quantity = :quantity WHERE cart_id = :cart_id";

// Pripremanje upita za izvršavanje
$stmt = $pdo->prepare($sql);

// Bindovanje parametara
$stmt->bindParam(':quantity', $quantity);
$stmt->bindParam(':cart_id', $cart_id);

// Izvršavanje upita
$stmt->execute();

header("Location:cart.php");
