<?php 
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/Database.php';


    class AuthController{

        public function authenticate(string $username, string $password) {

            $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
            $execute = mysqli_query(Database::connect(), $query);
            $data = mysqli_fetch_array($execute);
            
            return $data;

        }

        public static function user(int $id, string $roles) {

            switch($roles) {

                case 'DOCTOR' :

                    $query = "SELECT * FROM core_doctors WHERE user_id = '$id'";
                    $execute = mysqli_query(Database::connect(), $query);
                    $data = mysqli_fetch_assoc($execute);
                    $_SESSION['user_info'] = $data;
                    $_SESSION['status'] = 'doctors';

                    echo "<script> 
                        alert('success') 
                        window.location.href = '../views/doctors'
                    </script>";

                    break;

                case 'HOSPITAL STAFF' :

                    $query = "SELECT * FROM core_hospitalstaffs WHERE user_id = '$id'";
                    $execute = mysqli_query(Database::connect(), $query);
                    $data = mysqli_fetch_assoc($execute);
                    $_SESSION['user_info'] = $data;
                    $_SESSION['status'] = 'hospitalstaffs';

                    echo "<script> 
                        alert('success') 
                        window.location.href = '../views/hospitalstaffs'
                    </script>";
                    break;

                case 'MEDTECH' :

                    $query = "SELECT * FROM core_medtechs WHERE user_id = '$id'";
                    $execute = mysqli_query(Database::connect(), $query);
                    $data = mysqli_fetch_assoc($execute);
                    $_SESSION['user_info'] = $data;
                    $_SESSION['status'] = 'medtechs';

                    echo "<script> 
                        alert('success') 
                        window.location.href = '../views/medtechs'
                    </script>";

                    break;

                case 'NUTRITIONIST' :

                    $query = "SELECT * FROM core_nutritionists WHERE user_id = '$id'";
                    $execute = mysqli_query(Database::connect(), $query);
                    $data = mysqli_fetch_assoc($execute);
                    $_SESSION['user_info'] = $data;
                    $_SESSION['status'] = 'nutritionists';

                    echo "<script> 
                        alert('success') 
                        window.location.href = '../views/nutritionists'
                    </script>";

                    break;

                case 'SURGERY SCHEDULER' :

                    $query = "SELECT * FROM core_surgeryschedulers WHERE user_id = '$id'";
                    $execute = mysqli_query(Database::connect(), $query);
                    $data = mysqli_fetch_assoc($execute);
                    $_SESSION['user_info'] = $data;
                    $_SESSION['status'] = 'surgeryschedulers';

                    echo "<script> 
                        alert('success') 
                        window.location.href = '../views/surgeryschedulers'
                    </script>";

                    break;

                default :

                    echo "<script> 
                        alert('Unkown User') 
                        window.history.back()
                    </script>";

                    break;

            }

        }

    }