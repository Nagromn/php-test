<?php
/**
 * PROFILE PATIENT PAGE CONTROLLER
**/

// Models request
require_once 'services/render.php';
require_once "models/Patient.php";
require_once "models/Appointment.php";

// Page title
$pageTitle = "Profil patient";
$pagePath = "profile.patient";

// Variables
$id = $_GET['id'];

// Classes instanciation
$patientM = new Patient;
$appointmentM = new Appointment;

// Calling methods from classes
$patient = $patientM->findById($id);
$appointments = $appointmentM->getAllRdvByPatientId($id);

// View
render(__DIR__."/views/$pagePath", compact('pageTitle', 'patient', 'appointments', 'id'));