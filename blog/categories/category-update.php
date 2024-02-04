<?php
print_r($_REQUEST);
require "../db/db.php";
require "../partials/header.php";
$errors = [];

if (isset($_POST['update'])) {
  $category_id = $_POST['hiddenid']; 
  $category_name = $_POST['category_name'];

  empty($category_name) ? $errors[] = "category name required" : "";
  

  if (count($errors) === 0) {
    $upQry = "UPDATE categories SET category_name=:category_name WHERE category_id=:category_id";
    $stmt = $pdo->prepare($upQry);
    $stmt->bindParam(":category_name", $category_name, PDO::PARAM_STR);
    
    $stmt->bindParam(":category_id", $category_id, PDO::PARAM_INT);
    $res = $stmt->execute();
    
    if ($res) {
      header("location:../admin-dashboard.php");
    } else {
      die("error");
    }
  } else {
    $errors[] = 'incorrect';
  }
}
?>
<h3 class="w-50 m-auto p-5"><?php require "../errors.php" ?></h3>