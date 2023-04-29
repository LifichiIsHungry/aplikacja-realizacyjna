<?php
require("lib/db.php");
require("lib/check_session.php");
require("lib/functions.php");

$doc = new DOMDocument();
$doc->loadHTML(file_get_contents("./html/edytujUsluge/edytujUsluge.html"));

// Edit service - apply
if(isset($_REQUEST["apply_edits"])) {
    $values = array();
    $values["realne_zakonczenie"] = $_REQUEST["realEndDate"];
    $values["realny_koszt"] = $_REQUEST["realCost"];

    $smt = $db->prepare("UPDATE Usluga SET realne_zakonczenie=:realne_zakonczenie,realny_koszt=:realny_koszt");

    header("Location: /php/uslugi.php");
}

// ID of service in edition is not set
if(!isset($_REQUEST["id"])) {
    header("Location: /php/uslugi.php");
}

// Fetch data
$smt = $db->prepare("SELECT Projekt.nazwa,Usluga.nazwa FROM Usluga INNER JOIN Projekt ON Projekt.id = Usluga.projekt WHERE Usluga.id = :id");
$smt->execute(["id" => $_REQUEST["id"]]);
$usluga = $smt->fetch();

// If there is no service with an specified id
// redirect to /php/uslugi.php
if ($usluga == false) {
    header("Location: /php/uslugi.php");
}

$service_input = "<input readonly=\"true\" type=\"text\" id=\"serviceName\" name=\"serviceName\" value=\"".$usluga[1]."\"/>";
append_html_to_element($doc, $doc->getElementById("serviceNameInputField"), $service_input);

$opt = "<option selected=\"true\">".$usluga[0]."</option>";
append_html_to_element($doc, $doc->getElementById("selected-project"), $opt);

$hidden = "<input type=\"hidden\" name=\"apply_edits\" value=\"".$_REQUEST["id"]."\"/>";
append_html_to_element($doc, $doc->getElementById("edit-form"), $hidden);

echo($doc->saveHTML());