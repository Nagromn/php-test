<?php
/**
 * DELETE RDV PAGE CONTROLLER
**/

// Requête Models
require_once "models/Appointment.php";

// Page title
$pageTitle = "";
$pagePath = 'list.rdv';

// Classes instanciation
$appointmentM = new Appointment;

// Variables
$id = $_GET['id'];

// Deleting rdv from database
$appointmentM->delete($id);

// Redirect to rdv list page
header('Location: listRdv.php');
exit;