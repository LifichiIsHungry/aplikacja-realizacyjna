<?php
require("lib/db.php");

// If user is logged in, redirect to projekty.php
if (isset($_SESSION["loggedin"])) {
    header("Location: /php/projekty.php");
    exit();
}

// Authenticate user
if (isset($_REQUEST["authenticate"])) {
    if (empty($_REQUEST["user"]) || empty($_REQUEST["password"])) {
        // User or password empty, load page
        echo(file_get_contents("./html/login/login.html"));
        exit();
    }

    // Check data
    $smt = $db->prepare("SELECT * from Pracownik WHERE nazwa_uzytkownika = :user");
    $smt->execute(["user" => $_REQUEST["user"]]);
    $user = $smt->fetch();

    if (count($user) == 0) {
        // There is no user named $user
        echo(file_get_contents("./html/login/login.html"));
        exit();
    }

    if ($user["haslo"] != $_REQUEST["password"]) {
        // Password is not correct
        echo(file_get_contents("./html/login/login.html"));
        exit();
    }

    // Everything is all right, redirect to projekty.php
    $_SESSION["loggedin"] = true;
    header("Location: /php/projekty.php");
    exit();
}

echo(file_get_contents("./html/login/login.html"));