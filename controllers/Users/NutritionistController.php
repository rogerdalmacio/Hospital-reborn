<?php 

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/Database.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/controllers/QueryController.php';

    class NutritionistQuery extends Query {

        public function addOrEditDiet($id, int $patientid, string $classification, string $breakfast, string $lunch, string $dinner, string $nutritionist) {

            if($id == null) {

                $this->addDiet($id, $patientid, $classification, $breakfast, $lunch, $dinner, $nutritionist);

            } else {

                $this->editDiet($id, $breakfast, $lunch, $dinner);

            }

        }

        public function addDiet($id, int $patientid, string $classification, string $breakfast, string $lunch, string $dinner, string $nutritionist) {

            $date = Query::date();

            $query = "INSERT INTO `core_patient_diets`(`id`, `patient_id`, `nutritionist`, `classification`, `breakfast`, `lunch`, `dinner`, `created_at`, `update_at`) 
            VALUES (null,'$patientid','$nutritionist','$classification','$breakfast','$lunch','$dinner','$date','$date')";
            $execute = mysqli_query(Database::connect(), $query);

            if($execute) {

                echo "<script>
                alert('Diet Successfully added'); 
                window.history.back();
                </script>";

            } else {

                echo "<script>
                alert('Something went wrong'); 
                window.history.back();
                </script>";

            }

        }

        public function editDiet($id, string $breakfast, string $lunch, string $dinner,) {

            $date = Query::date();

            $query = "UPDATE `core_patient_diets` 
            SET `breakfast`='$breakfast',`lunch`='$lunch',`dinner`='$dinner',`update_at`='$date' 
            WHERE id = $id";
            $execute = mysqli_query(Database::connect(), $query);

            if($execute) {
                echo "<script>
                alert('Diet Successfully updated'); 
                window.history.back();
                </script>";
            } else {
                echo "<script>
                alert('Something went wrong'); 
                window.history.back();
                </script>";
            }

        }

        public function patientsWithDiet(string $classification) {

            $query = "SELECT core_patients.id as patient_id, core_patients.first_name, core_patients.last_name, core_patient_diets.id as patient_diets_id, 
            core_patient_diets.nutritionist, core_patient_diets.classification, core_patient_diets.breakfast, core_patient_diets.lunch, core_patient_diets.dinner 
            FROM core_patients 
            LEFT JOIN core_patient_diets 
            ON core_patients.id = core_patient_diets.patient_id
            WHERE classification = $classification OR classification = ''";
            $execute = mysqli_query(Database::connect(), $query);

            $list = [];

            if($execute->num_rows > 0) {
                while($data = $execute->fetch_assoc()) {
                    $list[] = $data;
                }
            }

            return json_encode($list);

        }

    }