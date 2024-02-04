<?php
print_r($_REQUEST);
require "../db/db.php";
require "../partials/header.php";
$errors = [];

if (isset($_POST['update'])) {
  //echo "true";
  $product_id = $_POST['hiddenid']; //hidden id ko phan yan
  $name = $_POST['name'];
  $price = $_POST['price'];
  $is_featured = $_POST['is_featured'];
  $description = $_POST['description'];
  $category_id = $_POST['category_id'];
  $oldPhoto = $_POST['oldPhoto'];
  $pname = $_FILES['photo']['name'];
  $tmpname = $_FILES['photo']['tmp_name'];

  if ($pname) {
    move_uploaded_file($tmpname, "../ProductGallery/$pname");
  } else {
    $pname = $oldPhoto;
  }

  empty($name) ? $errors[] = "name required" : "";
  empty($price) ? $errors[] = "price required" : "";
  empty($description) ? $errors[] = "description required" : "";
  empty($pname) ? $errors[] = "photo required" : "";
  //die('hjjj');

  if (count($errors) === 0) {
    $upQry = "UPDATE products SET name=:name, price=:price, is_featured=:is_featured, description=:description,category_id=:category_id, photo=:photo WHERE product_id=:product_id";
    $stmt = $pdo->prepare($upQry);
    $stmt->bindParam(":name", $name, PDO::PARAM_STR);
    $stmt->bindParam(":price", $price, PDO::PARAM_STR);
    $stmt->bindParam(":is_featured", $is_featured, PDO::PARAM_STR);
    $stmt->bindParam(":description", $description, PDO::PARAM_STR);
    $stmt->bindParam(":category_id", $category_id, PDO::PARAM_INT);
    $stmt->bindParam(":photo", $pname, PDO::PARAM_STR);
    $stmt->bindParam(":product_id", $product_id, PDO::PARAM_INT);
    $res = $stmt->execute();
    // echo $name;
    // echo $price;
    
    if ($res) {
      header("location:../admin-dashboard.php");
      exit();
    } else {
      die("error");
    }
  } else {
    $errors[] = 'incorrect';
  }
}
?>
<h3 class="w-50 m-auto p-5"><?php require "../errors.php" ?></h3>