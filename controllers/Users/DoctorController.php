<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/Database.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/controllers/QueryController.php';

    class DoctorQuery extends Query{

        public function appointmentList() {

            $query = "SELECT core_surgery_schedules.id, core_surgery_schedules.patient_id, core_patients.first_name, core_patients.last_name, 
            core_surgery_schedules.surgery_type, core_surgery_schedules.appointment_date
            FROM `core_surgery_schedules`
            INNER JOIN core_patients ON core_surgery_schedules.patient_id = core_patients.id ";

            $execute = mysqli_query(Database::connect(), $query);

            return $execute;

        }

        public function patientSearch(string $search_query) {

            $query = "SELECT * FROM `core_patients` WHERE `id` LIKE '$search_query' OR `first_name` LIKE '%$search_query%' OR `last_name` LIKE '$search_query'";
            $execute = mysqli_query(Database::connect(), $query);

            $output = '';

            if($execute->num_rows > 0) {
                while($data = $execute->fetch_assoc()) {
                    $output .= '<li class="list-group-item"><p data-id="'.$data['id'].'">'.$data['first_name']. " " . $data['last_name'].'</p></li>';
                }
            }else {
                $output .= '<p>No results found.</p>';
            }

            echo $output;

        }

    }