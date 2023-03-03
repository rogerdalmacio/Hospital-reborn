<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/Database.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/controllers/QueryController.php';


    class MedTechQuery extends Query {

        public function listOfLaboratories(string $status) {

            $query = "SELECT core_patients.id as patient_id, core_patients.first_name, core_patients.last_name, core_laboratory_results.id as laboratory_results_id, 
            core_laboratory_results.test_name, core_laboratory_results.processed_by, core_laboratory_results.status, core_laboratory_results.examine_date
            FROM core_laboratory_results 
            INNER JOIN core_patients 
            ON core_laboratory_results.patient_id = core_patients.id
            WHERE status = '$status'";
            $execute = mysqli_query(Database::connect(), $query);

            $list = [];

            if($execute->num_rows > 0) {
                while($data = $execute->fetch_assoc()) {
                    $list[] = $data;
                }
            }

            return json_encode($list);

        }

        public function updateLaboratory() {

            $query = "";
            $execute = mysqli_query(Database::connect(), $query);

            if($execute) {

                echo "<script>
                alert('Laboratory updated'); 
                window.history.back();
                </script>";

            } else {

                echo "<script>
                alert('Something went wrong'); 
                window.history.back();
                </script>";

            }
        }

    }