<?php
/**
 * DELETE PATIENT PAGE CONTROLLER
**/

// Requête Models
require_once "models/Patient.php";

// Page title
$pageTitle = "";
$pagePath = 'list.patient';

// Classes instanciation
$patientM = new Patient;

// Variables
$id = $_GET['id'];

// Calling deleting method
$patientM->delete($id);

// Redirect to patient list page
header('Location: listPatient.php');
exit;