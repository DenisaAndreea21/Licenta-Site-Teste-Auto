<?php

$dsn = "mysql:host=localhost;dbname=traseusigur";
$dbusername = "root";
$dbpassword = "";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Nu s-a reusit conectarea la baza de date: " . $e->getMessage();
    die();
}