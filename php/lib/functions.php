<?php

function append_html_to_element($document, $element, $html_str) {
    $fragment = $document->createDocumentFragment();
    $fragment->appendXML($html_str);
    $element->appendChild($fragment);
}