<?php
require("lib/db.php");
require("lib/functions.php");
require("lib/check_session.php");

if(!isset($_REQUEST["id"])) {
    header("Location: /php/projekty.php");
}

$doc = new DOMDocument();
$doc->loadHTML(file_get_contents("./html/projekty-otwarte/projekty.html"));
// Fetch data
// $smt = $db->prepare("SELECT Projekt.status_realizacji,Usluga.nazwa,Usluga.planowane_zakonczenie,Usluga.planowany_koszt FROM Usluga INNER JOIN Projekt ON Projekt.id = Usluga.projekt WHERE Usluga.projekt = Projekt.id ");
// $smt->execute();

$smt = $db->prepare("SELECT Usluga.nazwa,Usluga.planowane_zakonczenie,Usluga.planowany_koszt FROM Usluga WHERE Usluga.projekt = :id_projektu");
$smt->execute(["id_projektu" => $_REQUEST["id"]]);

foreach($smt->fetchAll() as $projekt) {
    $html_projekt = "
    <tr>
        <td>".$projekt[0]."</td>
        <td>".$projekt[1]."</td>
        <td>".$projekt[2]."</td>
        <td>".$projekt[3]."</td>
        <td>".$projekt[4]."</td>


    </tr>
    ";

    append_html_to_element($doc, $doc->getElementById("table-body-projekty"), $html_projekt);
}

echo($doc->saveHTML());