<?php
require "./db/db.php";
$id = $_GET['id'];
echo $id;
$qry = "DELETE FROM users WHERE user_id=:user_id";
$s=$pdo->prepare($qry);
$s->bindParam("user_id",$id,PDO::PARAM_INT);
$res = $s->execute();
if($res){
  header("location:admin-dashboard.php?message='Delete Successful'");
}
?>