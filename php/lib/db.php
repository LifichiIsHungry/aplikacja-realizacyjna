<?php

$connection_string = "mysql:host=localhost;dbname=App;charset=utf8mb4";
session_start();

try {
    $db = new PDO($connection_string, "root", "root");
} catch (Exception $e) {
    error_log($e->getMessage());
    exit();
}