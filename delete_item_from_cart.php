<?php
include 'conn.php';

$cart_id = $_GET['cart_id'];

$sql = "DELETE FROM cart WHERE cart_id = :cart_id";

// Pripremanje upita za izvršavanje
$stmt = $pdo->prepare($sql);

// Bindovanje parametara
$stmt->bindParam(':cart_id', $cart_id);

// Izvršavanje upita
$stmt->execute();


header("Location:cart.php");
