<?php
require("lib/db.php");
require("lib/check_session.php");
require("lib/functions.php");

$doc = new DOMDocument();
$doc->loadHTML(file_get_contents("./html/dodajUsluge/dodajUsluge.html"));

if (isset($_REQUEST["add_service"])) {
    // Add new service
    $values = array();
    $values["nazwa"] = $_REQUEST["serviceName"];
    $values["planowane_zakonczenie"] = $_REQUEST["plannedEndDate"];
    $values["planowany_koszt"] = $_REQUEST["plannedCost"];
    $values["projekt"] = $_REQUEST["select-project"];
    $values["uwagi"] = $_REQUEST["comments"];

    $stmt = $db->prepare("INSERT INTO Usluga(nazwa,planowane_zakonczenie,planowany_koszt,projekt,uwagi) VALUES (:nazwa,:planowane_zakonczenie,:planowany_koszt,:projekt,:uwagi)");
    $stmt->execute($values);

    header("Location: /php/uslugi.php");
}

// Fetch projects
$smt = $db->prepare("SELECT id,nazwa FROM Projekt");
$smt->execute();

$html_projects_options = "";
foreach($smt->fetchAll() as $project) {
    $html_projects_options .= "<option value=\"".$project["id"]."\">".$project["nazwa"]."</option>\n";
}

append_html_to_element($doc, $doc->getElementById("select-project"), $html_projects_options);
echo($doc->saveHTML());