<?php
require("lib/db.php");
require("lib/functions.php");
require("lib/check_session.php");

$doc = new DOMDocument();
$doc->loadHTML(file_get_contents("./html/uslugi/uslugi.html"));

// Fetch data
$smt = $db->prepare("SELECT Projekt.nazwa,Usluga.nazwa,Usluga.planowane_zakonczenie,Usluga.planowany_koszt,Usluga.uwagi FROM Usluga INNER JOIN Projekt ON Projekt.id = Usluga.projekt WHERE Usluga.realne_zakonczenie IS NULL");
$smt->execute();

foreach($smt->fetchAll() as $usluga) {
    $html_usluga = "
    <tr>
        <td>".$usluga[0]."</td>
        <td>
            <div class=\"circle yellow\"></div>
        </td>
        <td>".$usluga[1]."</td>
        <td>".$usluga[2]."</td>
        <td>".$usluga[3]."</td>
        <td>".$usluga[4]."</td>
        <td><button class=\"secondaryBtn\">Edycja</button></td>
    </tr>
    ";

    append_html_to_element($doc, $doc->getElementById("table-body-uslugi"), $html_usluga);
}

echo($doc->saveHTML());