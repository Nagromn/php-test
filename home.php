<?php
/**
 * HOME PAGE CONTROLLER
**/

// Models request
require_once 'services/render.php';

// Page title
$pageTitle = "Accueil";
$pagePath = "home";

// View
render(__DIR__."/views/$pagePath", compact('pageTitle'));