<?php

  class Database {

    public static function connect() {

      $conn = mysqli_connect('185.229.112.3', 'u685566035_hospital', 'Hospital123456789', 'u685566035_hospital');

      return $conn;

    }

  }

 ?>   