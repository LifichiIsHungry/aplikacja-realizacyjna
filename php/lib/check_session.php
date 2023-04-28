<?php
session_start();

if (!isset($_SESSION["loggedin"])) {
    header("Location: /php/login.php");
    exit();
}
