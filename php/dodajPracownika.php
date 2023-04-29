<?php
require("lib/db.php");
require("lib/check_session.php");
require("lib/functions.php");

$doc = new DOMDocument();
$doc->loadHTML(file_get_contents("./html/dodajPracownika/dodajPracownika.html"));

// Don't display site, add new project
// and reditect to /php/pracownicy.php
if (isset($_REQUEST["add_employee"])) {
    $values = array();
    $values["imie"] = $_REQUEST["name"];
    $values["nazwisko"] = $_REQUEST["surname"];
    $values["email"] = $_REQUEST["email"];
    $values["telefon"] = $_REQUEST["phone"];
    $values["nazwa_uzytkownika"] = $_REQUEST["username"];
    $values["haslo"] = $_REQUEST["password"];

    $stmt = $db->prepare("INSERT INTO Pracownik(imie,nazwisko,email,telefon,nazwa_uzytkownika,haslo) VALUES (:imie,:nazwisko,:email,:telefon,:nazwa_uzytkownika,:haslo);");

    $stmt->execute($values);
    header("Location: /php/pracownicy.php");
}

// Display site

echo($doc->saveHTML());

