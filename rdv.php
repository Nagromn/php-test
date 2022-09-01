<?php
/**
 * LIST RDV PAGE CONTROLLER
**/

// Models request
require_once 'services/render.php';
require_once "models/Appointment.php";

// Page title
$pageTitle = "Rendez-vous";
$pagePath = "rdv";

// Variables
$id = $_GET['id'];

// Classes instanciation
$appointmentM = new Appointment;

// Calling methods from classes
$appointment = $appointmentM->findById($id);

// View
render(__DIR__."/views/$pagePath", compact('pageTitle', 'appointment', 'id'));