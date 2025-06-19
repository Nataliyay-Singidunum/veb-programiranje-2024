<?php
$server = "localhost"; // Server na kojem se nalazi baza podataka
$dbname = "ispit_web"; // Ime baze podataka
$username = "root"; // Korisničko ime za pristup bazi podataka
$password = ""; // Lozinka za pristup bazi podataka

$pdo = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
// Postavljanje PDO error mode na exception
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // ovo su predefinisani atributi koji se ne menjaju
// echo "Konekcija uspešno uspostavljena";
