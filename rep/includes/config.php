<?php
  // define('DB_HOST','istetkmce.in');
  // define('DB_NAME','ezitmxze_test');
  // define('DB_USER','ezitmxze_tests');
  // define('DB_PASS','Istetkmce@2019');

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','ezitmzxe_test');
//Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>