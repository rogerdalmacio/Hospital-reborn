<?php 

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/session/nutritionist.php';
    include_once  $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/Database.php';
    include_once  $_SERVER['DOCUMENT_ROOT'] . '/Hospital/controllers/Users/NutritionistController.php';

    $query = new NutritionistQuery;

    $nutritionist = $_SESSION['user_info']['first_name'] . ' ' . $_SESSION['user_info']['last_name'];

    $id = isset($_POST['id']) ? $_POST['id'] : null;

    if(isset($_POST['save'])) {

        $query->addOrEditDiet($id, $_POST['patient_id'], $_POST['classification'], $_POST['breakfast'], $_POST['lunch'], $_POST['dinner'], $nutritionist, $_POST['old_classification']);
        
    }

?>