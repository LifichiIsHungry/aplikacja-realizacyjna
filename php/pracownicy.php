<?php
require("lib/db.php");
require("lib/functions.php");
require("lib/check_session.php");

$doc = new DOMDocument();
$doc->loadHTML(file_get_contents("./html/pracownicy/pracownicy.html"));

// Fetch data
$smt = $db->prepare("SELECT * FROM Pracownik ");
$smt->execute();

foreach($smt->fetchAll() as $pracownik) {
    $html_pracownik = "
    <tr>
        <td>".$pracownik[0]."</td>
        <td>".$pracownik[1]."</td>
        <td>".$pracownik[2]."</td>
        <td>".$pracownik[3]."</td>
        <td>".$pracownik[4]."</td>
        
    </tr>
    ";

    append_html_to_element($doc, $doc->getElementById("table-body-pracownicy"), $html_pracownik);
}

echo($doc->saveHTML());