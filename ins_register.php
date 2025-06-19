<?php
include 'conn.php';

$name = $_POST['name'];
$surname = $_POST['surname'];
$username = $_POST['username'];
$password = $_POST['password'];

$role_id = 2;
$is_active = 0;
// Priprema SQL upita sa placeholder-ima
$sql = "INSERT INTO user (name, surname, username, password, role_id, is_active) 
                    VALUES (:name, :surname, :username,  :password, :role_id, :is_active)";

// Pripremanje upita za izvršavanje
$stmt = $pdo->prepare($sql); //statment

// Vezivanje parametara i mapa
$stmt->bindParam(':name', $name);
$stmt->bindParam(':surname', $surname);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password);
$stmt->bindParam(':role_id', $role_id);
$stmt->bindParam(':is_active', $is_active);

// Pokušaj izvršavanja upita

$stmt->execute();

header("Location:index.php?registracija=1");