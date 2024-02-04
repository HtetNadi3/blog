<?php
require "../db/db.php";
$id = $_GET['id'];
echo $id;
$qry = "DELETE FROM categories WHERE category_id=:category_id";
$s = $pdo->prepare($qry);
$s->bindParam("category_id", $id, PDO::PARAM_INT);
$res = $s->execute();
if ($res) {
  header("location:../admin-dashboard.php?message='Delete product Successful'");
}