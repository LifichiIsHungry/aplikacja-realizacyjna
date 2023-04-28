<?php
require("lib/db.php");
require("lib/check_session.php");

$doc = new DOMDocument();
$doc->loadHTML(file_get_contents("./html/projekty/projekty.html"));
$container = $doc->getElementById("body-main-projekty");

$smt = $db->prepare("SELECT * FROM Projekt");
$smt->execute();

foreach ($smt->fetchAll() as $projekt) {
    $html_projekt = "
    <div class=\"projectBox\">
        <h2 class=\"projectBox-title\">".$projekt["nazwa"]."</h2>
        <div class=\"projectBox-info\">
            <p>Planowany zysk:</p><span>".$projekt["przewidywane_zyski"]." zł</span>
            <p>Data zakończenia:</p><span>".$projekt["planowane_zakonczenie"]."</span>
            <p>Status realizacji: </p><span>".$projekt["status_realizacji"]."</span>
        </div>
        <button class=\"secondaryBtn\" onclick=\"location.href = '/php/szczegoly-projektu.php?id=". $projekt["id"] ."'\">Szczegóły</button>
    </div>
    ";

    $fragment = $doc->createDocumentFragment();
    $fragment->appendXML($html_projekt);
    $container->appendChild($fragment);
}

echo($doc->saveHTML());