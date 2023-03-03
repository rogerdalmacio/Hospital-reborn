<?php 

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/session/doctor.php';
    include_once  $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/Database.php';
    include_once  $_SERVER['DOCUMENT_ROOT'] . '/Hospital/controllers/Users/DoctorController.php';

    $query = new DoctorQuery;

    $patient_search = $query->patientSearch($_POST['query']);

?>