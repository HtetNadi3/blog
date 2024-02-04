<?php
// require "config.php";

  $host ="localhost";
$dbname = "php_test";
$user = "root";
$password = "Hnd2232003";
$dsn = "mysql:host=$host;dbname=$dbname;charset=UTF8";
try{
$pdo=new PDO($dsn,$user, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
// if($pdo){
//   echo "db connected";
// }


}catch (PDOException $e){
  echo $e->getMessage();
}

