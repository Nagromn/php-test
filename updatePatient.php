<?php
/**
 * UPDATE PATIENT PAGE CONTROLLER
**/

// Models request
require_once 'services/render.php';
require_once "models/Patient.php";

// Page title
$pageTitle = "Modifier patient";
$pagePath = "patient.update";

// Global variable
$id = $_GET['id'];

// Classes instanciation
$patientM = new Patient;

if(empty($_POST)){
      // Find patient by id method
      $patient = $patientM->findById($id);
// Else, display all current patient personal data
}else{
      // Variables
      $id = $_GET['id'];
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $birthdate = $_POST['birthdate'];
      $phone = $_POST['phone'];
      $mail = $_POST['mail'];

      // Update patient data method
      $patientM->update(
            $id,
            $firstname,
            $lastname,
            $birthdate,
            $phone,
            $mail
      );
      // Redirect to patient list page
      header('Location: listPatient.php');
      exit;
}

// View
render(__DIR__."/views/$pagePath", compact('pageTitle', 'patient', 'id'));