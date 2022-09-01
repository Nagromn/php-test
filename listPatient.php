<?php
/**
 * LIST PATIENT PAGE CONTROLLER
**/

// Models request
require_once 'services/render.php';
require_once "models/Patient.php";

// Page title
$pageTitle = "Liste patients";
$pagePath = "list.patient";

// Classes instanciation
$patientM = new Patient;

// Calling methods from classes
$patients = $patientM->findAll();

// View
render(__DIR__."/views/$pagePath", compact('pageTitle', 'patients'));