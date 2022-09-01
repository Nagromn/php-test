<?php
/**
 * ADD PATIENT RDV PAGE CONTROLLER
**/

// Models request
require_once 'services/render.php';
require_once "models/Patient.php";
require_once "models/Appointment.php";

// Page title
$pageTitle = "";
$pagePath = "add.patient.rdv";

// Classes instanciation
$patientM = new Patient;
$appointmentM = new Appointment;

// Calling methods from classes
if(!empty($_POST)){
      extract($_POST);
      // Insert new data into database
      $patientM->insert(
            [
            ':lastname' => $lastname,
            ':firstname' => $firstname,
            ':birthdate' => $birthdate,
            ':phone' => $phone,
            ':mail' => $mail
            ]
      );

      $patient = $patientM->findAll();
      // Get last inserted id
      $last_id = end($patient);
      $id = $last_id['id'];
      $time = $_POST['time'];
      $appointmentM->insert(
            [
            ':dateHour' => $date.' '.$time,
            ':idPatients' => $id
            ]
      );
      
      // Redirect to patient list page
      header('Location: listPatient.php');
      exit;
}

// View
render(__DIR__."/views/$pagePath", compact('pageTitle'));