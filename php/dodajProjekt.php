<?php
require("lib/db.php");
require("lib/check_session.php");
require("lib/functions.php");

$doc = new DOMDocument();
$doc->loadHTML(file_get_contents("./html/dodajProjekt/dodajProjekt.html"));

// Don't display site, add new project
// and reditect to /php/projekty.php
if (isset($_REQUEST["add_project"])) {
    $values = array();
    $values["nazwa"] = $_REQUEST["projectName"];
    $values["rozpoczecie"] = $_REQUEST["startDate"];
    $values["planowane_zakonczenie"] = $_REQUEST["plannedEnd"];
    $values["przewidywane_zyski"] = $_REQUEST["expectedProfits"];
    $values["przewidywane_koszta"] = $_REQUEST["expectedExpenses"];
    $values["organizacja"] = $_REQUEST["organization"];
    $values["handlowiec"] = $_REQUEST["seller"];
    $values["opiekun"] = $_REQUEST["manager"];
    $values["ksiegowosc"] = $_REQUEST["accounting"];
    $values["kary_umowne"] = 0.00;
    $values["status_realizacji"] = "W toku";

    $stmt = $db->prepare("INSERT INTO Projekt(nazwa,handlowiec,opiekun,ksiegowosc,organizacja,rozpoczecie,planowane_zakonczenie,przewidywane_zyski,przewidywane_koszta,kary_umowne,status_realizacji) VALUES (:nazwa,:handlowiec,:opiekun,:ksiegowosc,:organizacja,:rozpoczecie,:planowane_zakonczenie,:przewidywane_zyski,:przewidywane_koszta,:kary_umowne,:status_realizacji);");

    $stmt->execute($values);
    header("Location: /php/projekty.php");
}

// Display site

// Fetch organizations
$smt = $db->prepare("SELECT * FROM Organizacja");
$smt->execute();
$org_option_fields = "";
foreach ($smt->fetchAll() as $organization) {
    $option_fields .= "<option value=\"".$organization["id"]."\">".$organization["nazwa"]."</option>";
}
append_html_to_element($doc, $doc->getElementById("organization"), $option_fields);

//  Fetch workers
$smt = $db->prepare("SELECT * FROM Pracownik");
$smt->execute();
$worker_option_fields = "";
foreach ($smt->fetchAll() as $worker) {
    $worker_option_fields .= "<option value=\"".$worker["id"]."\">".$worker["imie"]." ".$worker["nazwisko"]."</option>";
}
append_html_to_element($doc, $doc->getElementById("seller"), $worker_option_fields);
append_html_to_element($doc, $doc->getElementById("manager"), $worker_option_fields);
append_html_to_element($doc, $doc->getElementById("accounting"), $worker_option_fields);

echo($doc->saveHTML());