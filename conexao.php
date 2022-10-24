<?php

  $server = 'localhost';
  $user = 'root';
  $password = '12345678';
  $database = 'db_EmpregosEtimB';

  $connection = new PDO("mysql:host=$server;dbname=$database", $user, $password);

?>
