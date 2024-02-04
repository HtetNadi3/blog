<?php
require "../db/db.php";
require("../partials/header.php");

$id = $_GET['id'];
$qry = "SELECT * FROM categories WHERE category_id=:category_id";
$stmt = $pdo->prepare($qry);
$stmt->bindParam(":category_id", $id, PDO::PARAM_INT);
$stmt->execute();
$category = $stmt->fetch();
// print_r($category);
// die();
?>

<section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">

              <h1 lass="text-uppercase text-center mb-5">Edit Category</h1>
              <form action="../categories/category-update.php" method="post">

              <input type="hidden" name="hiddenid" value="<?= $category['category_id'] ?>">

                <div class="form-outline mb-4">
                  <label for="category_name" class="form-label">Name</label>
                  <input type="text" name="category_name" value="<?= $category['category_name'] ?>" class="form-control form-control-lg border">
                </div>
                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="update">Update Category</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
require("../partials/footer.php");
?>