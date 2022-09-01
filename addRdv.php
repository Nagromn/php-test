<?php
/**
 * ADD RDV PAGE CONTROLLER
**/

// Models request
require_once 'services/render.php';
require_once "models/Patient.php";
require_once "models/Appointment.php";

// Page title
$pageTitle = "Ajout de RDV";
$pagePath = "add.rdv";

// Classes instanciation
$patientM = new Patient;
$appointmentM = new Appointment;

// Calling methods from classes
$patients = $patientM->findAll();

if(!empty($_POST)){
      extract($_POST);
      $time = $_POST['time'];
      // Calling methods from classes
      $patients = $patientM->findAll();
      $appointment = $appointmentM->insert([
            ':dateHour' => $date.' '.$time,
            ':idPatients' => $idPatients
            ]
      );
      // Redirect to rdv list page
      header('Location: listRdv.php');
      exit;
}

// View
render(__DIR__."/views/$pagePath", compact('pageTitle', 'patients'));