<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/session/hospital_staff.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/Database.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/controllers/QueryController.php';

    class HospitalStaffQuery extends Query{

        public function listOfHmoAndInsurance() {

            $query = "SELECT core_patient_hmo_and_insurances.patient_id, core_patients.first_name, core_patients.last_name, 
            core_patient_hmo_and_insurances.provider, core_patient_hmo_and_insurances.membership_id, core_patient_hmo_and_insurances.tier, 
            core_patient_hmo_and_insurances.application_date
            FROM core_patient_hmo_and_insurances
            INNER JOIN core_patients ON core_patient_hmo_and_insurances.patient_id = core_patients.id
            ";

            $execute = mysqli_query(Database::connect(), $query);

            $list = [];

            if($execute->num_rows > 0) {
                while($data = $execute->fetch_assoc()) {
                    $list[] = $data;
                }
            }

            return json_encode($list);

        }

        public function createLaboratory(int $patient_id, string $test_name, int $ammount) {

            $date = Query::date();
            $user = $_SESSION['user_info']['first_name'] . " " . $_SESSION['user_info']['last_name'];

            $query = "INSERT INTO `core_laboratory_results`(`id`, `patient_id`, `test_name`, `test_result`, `comments`, `amount`, 
            `examined_by`, `processed_by`, `examine_date`, `laboratory_result_date`, `created_at`, `updated_at`) 
            VALUES (null,'$patient_id','$test_name','','','$ammount','','$user','$date',null,'$date','$date')";

            $execute = mysqli_query(Database::connect(), $query);

            if($execute) {

                echo "<script>
                alert('Laboratory result submitted'); 
                window.history.back();
                </script>";

            } else {

                echo "<script>
                alert('Something went wrong'); 
                window.history.back();
                </script>";

            }

        }

        public function listOfLaboratoryResults(string $status) {

            $query = "SELECT * FROM core_laboratory_results WHERE status = '$status'";
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
    