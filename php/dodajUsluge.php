<?php
require("lib/db.php");
require("lib/check_session.php");
require("lib/functions.php");

$doc = new DOMDocument();
$doc->loadHTML(file_get_contents("/php/html/dodajUsluge/dodajUsluge.php"));