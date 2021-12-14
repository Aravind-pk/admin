<?php
  define('HOST','istetkmce.in');
  define('DB','ezitmxze_test');
  define('USER','ezitmxze_tests');
  define('PASS','Istetkmce@2019');

  /* Database Connections */
  $connection =new mysqli(HOST,USER,PASS,DB);
    if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        
   return $connection;
?>