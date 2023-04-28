<?php

// If user is logged in, redirect to projekty.php
if (isset($_SESSION["loggedin"])) {
    header("Location: /php/projekty.php");
    exit();
}

echo(file_get_contents("./html/landingpage/index.html"));