<?php
include 'conn.php';

$user_id = $_GET['user_id']; // ovi podaci se vade iz linka kako su prosledjeni kod admina
$status =  $_GET['status'];

$upit = "UPDATE user SET is_active = :is_active WHERE user_id = :user_id";

$stmt = $pdo->prepare($upit);
// Veži nove parametre
$stmt->bindParam(':user_id', $user_id);
$stmt->bindParam(':is_active', $status);

// Izvrši ažuriranje
$stmt->execute();

header("Location:admin.php");
