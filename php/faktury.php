<?php
require("lib/db.php");
require("lib/functions.php");
require("lib/check_session.php");

$doc = new DOMDocument();
$doc->loadHTML(file_get_contents("./html/faktury/faktury.html"));

// Fetch data
$smt = $db->prepare("SELECT Projekt.nazwa,Faktura.numer,Faktura.data_wystawienia,Faktura.termin_zaplaty,Faktura.uniewazniona FROM Faktury INNER JOIN Projekt ON Projekt.id = Usluga.projekt");
$smt->execute();

foreach($smt->fetchAll() as $faktura) {
    $html_faktura = "
    <tr>
        <td>".$faktura[0]."</td>
        <td>".$faktura[1]."</td>
        <td>".$faktura[2]."</td>
        <td>".$faktura[3]."</td>
        <td>".$faktura[4]."</td>
        <td><button class=\"secondaryBtn\">Edycja</button></td>
    </tr>
    ";

    append_html_to_element($doc, $doc->getElementById("table-body-faktura"), $html_faktura);
}

echo($doc->saveHTML());