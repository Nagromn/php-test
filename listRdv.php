<?php
/**
 * LIST RDV PAGE CONTROLLER
**/

// Models request
require_once 'services/render.php';
require_once "models/Appointment.php";

// Page title
$pageTitle = "Liste des RDV";
$pagePath = "list.rdv";

// Classes instanciation
$appointmentM = new Appointment;

// Calling methods from classes
$appointments = $appointmentM->getAllRdv();

// View
render(__DIR__."/views/$pagePath", compact('pageTitle', 'appointments'));