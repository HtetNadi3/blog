<?php
// print_r($_REQUEST);
require "./db/db.php";
require "./partials/header.php";
$errors = [];

if (isset($_POST['update'])) {
  //echo "true";
  $user_id = $_POST['hiddenid']; //hidden id ko phan yan
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $oldPhoto = $_POST['oldPhoto'];
  $pname = $_FILES['photo']['name'];
  $tmpname = $_FILES['photo']['tmp_name'];

  if ($pname) {
    move_uploaded_file($_tmp, "Gallery/$pname");
  } else {
    $pname = $oldPhoto;
  }

  empty($name) ? $errors[] = "name required" : "";
  empty($phone) ? $errors[] = "phone required" : "";
  empty($email) ? $errors[] = "email required" : "";
  empty($address) ? $errors[] = "address required" : "";
  empty($pname) ? $errors[] = "photo required" : "";

  if (count($errors) === 0) {
    $upQry = "UPDATE users SET name=:name, phone=:phone, email=:email, address=:address, photo=:photo WHERE user_id=:user_id";
    $stmt = $pdo->prepare($upQry);
    $stmt->bindParam(":name", $name, PDO::PARAM_STR);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->bindParam(":photo", $pname, PDO::PARAM_STR);
    $stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
    $stmt->bindParam(":address", $address, PDO::PARAM_STR);
    $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
    $res = $stmt->execute();
    if ($res) {
      header("location:admin-dashboard.php");
    } else {
      die("error");
    }
  } else {
    $errors[] = 'incorrect';
  }
}
?>
<h3 class="w-50 m-auto p-5"><?php require "errors.php" ?></h3>