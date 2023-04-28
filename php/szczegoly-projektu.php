<?php
require("lib/db.php");
require("lib/check_session.php");

if(!isset($_REQUEST["id"])) {
    header("Location: /php/projekty.php");
}

$doc = new DOMDocument();
$doc->loadHTML(file_get_contents("./html/projekty-otwarte/projekty.html"));

echo($doc->saveHTML());