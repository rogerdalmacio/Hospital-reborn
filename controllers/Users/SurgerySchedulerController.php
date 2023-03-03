<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/Database.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/controllers/QueryController.php';

    class SurgerySchedulerQuery extends Query{

        public function submitSurgerySchedule(int $patient_id, string $doctor_type, string $surgery, string $appointmentDate, string $appointmentTime) {

            try {

            $date = Query::date();

            $query = "INSERT INTO `core_surgery_schedules`(`id`, `patient_id`, `doctor_type`, `surgery_type`, `appointment_date`, `appointment_time`,`status`, `created_at`, `updated_at`) 
            VALUES (null,'$patient_id','$doctor_type','$surgery','$appointmentDate','$appointmentTime','pending','$date','$date')";
            $execute = mysqli_query(Database::connect(), $query);

            echo "<script>
            alert('Schedule queued'); 
            window.history.back();
            </script>";

            } catch (Exception $e) {

                echo "<script>
                alert('Something went wrong'); 
                window.history.back();
                </script>";

            }

        }

        public function editSchedule(int $id, string $surgeryType, string $appointmentDate, string $appointmentTime) {
            
            $date = Query::date();

            $query = "UPDATE `core_surgery_schedules` SET `surgery_type`='$surgeryType',
            `appointment_date`='$appointmentDate',`appointment_time`='$appointmentTime',`updated_at`='$date' WHERE id = $id";
            $execute = mysqli_query(Database::connect(), $query);

            if($execute) {

                echo "Successfully updated";

            } else {

                echo "Something went wrong";

            }

        }

        public function deleteSchedule(int $id) {

            $query = "DELETE FROM `core_surgery_schedules` WHERE id = '$id'";
            $execute = mysqli_query(Database::connect(), $query);


            if($execute) {

                echo "Successfully deleted";

            } else {

                echo "Something went wrong";

            }

        }

        public function listOfSortedSurgerySchedules() {

            $query = "SELECT core_surgery_schedules.id, core_surgery_schedules.surgery_type, core_surgery_schedules.status, core_surgery_schedules.appointment_date, 
            core_surgery_schedules.doctor_type, core_surgery_schedules.appointment_time, core_patients.first_name as patient_first_name, 
            core_patients.last_name as patient_last_name
            FROM `core_surgery_schedules` 
            INNER JOIN `core_patients` 
            ON core_surgery_schedules.patient_id = core_patients.id 
            WHERE status = 'pending'
            ORDER BY appointment_date DESC";
            $execute = mysqli_query(Database::connect(), $query);

            return $execute;

        }

    }