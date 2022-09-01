<?php
/**
 * UPDATE RDV PAGE CONTROLLER
**/

// Models request
require_once 'services/render.php';
require_once "models/Appointment.php";

// Page title
$pageTitle = "Modifier RDV";
$pagePath = "rdv.update";

// Variables
$id = $_GET['id'];

// Date form
date_default_timezone_set('Europe/Paris');
$time = date('H:i:s');

// Classes instanciation
$appointmentM = new Appointment;

if(empty($_POST)){
      // Find rdv by id method
      $appointment = $appointmentM->getRdvByPatientId($id);
// Else, display all current rdv data
}else{
      // Variables
      $date = $_POST['date'];
      $time = $_POST['time'];
      $dateTime = $date.' '.$time;
      // Update rdv data method
      $appointmentM->update($dateTime);
      header('Location: listRdv.php');
      exit;
}

// View
render(__DIR__."/views/$pagePath", compact('pageTitle', 'appointment', 'id'));