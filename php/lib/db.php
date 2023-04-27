<?php

$connection_string = "mysql:host=localhost;dbname=App;charset=utf8mb4";

$options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Make the default fetch be an associative array
];

try {
    $db = new PDO($connection_string, "root", "", $options);
} catch (Exception $e) {
    error_log($e->getMessage());
    exit();
}