<?php
/**
 * PATIENT PAGE CONTROLLER
**/

// Models request
require_once 'services/render.php';
require_once "models/Patient.php";

// Page title
$pageTitle = "Nouveau patient";
$pagePath = "add.patient";

// Classes instanciation
$patientM = new Patient;

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
      // Redirect to list patient page
      header('Location: listPatient.php');
      exit;
}

// View
render(__DIR__."/views/$pagePath", compact('pageTitle'));