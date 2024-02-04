<?php
require "../db/db.php";
require "../partials/header.php";

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === "POST") {
  if (isset($_POST['create'])) {
    $category_name = trim($_POST['category_name']);

    empty($category_name) ? $errors[] = "category name required" : "";

    $qry = "INSERT INTO categories(category_name) values(:category_name)";
    $stmt = $pdo->prepare($qry);
    $stmt->bindParam(":category_name", $category_name, PDO::PARAM_STR);

    if ($stmt->execute()) {
      header("location:../admin-dashboard.php");
    } else {
      $errors[] = "OOps! Something went wrong. db insert errors";
    }
  }
}

require("../partials/navbar.php");

?>
<section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">

              <h1 lass="text-uppercase text-center mb-5">Create Category</h1>
              <form action="../categories/category-create.php" method="post">
                <div class="form-outline mb-4">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" name="category_name" class="form-control form-control-lg border">
                </div>
                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="create">Create Category</button>
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