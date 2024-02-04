<?php
require "../db/db.php";
require "../partials/header.php";

$errors = [];
$date = new DateTime('now');
$now = $date->format("Y-m-d H:i:s");

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  // echo "Yes";
  if (isset($_REQUEST['create'])) {
    // echo "yes";
    $name = trim($_REQUEST['name']);
    $price = trim($_REQUEST['price']);
    $description = trim($_REQUEST['description']);
    $is_featured = $_REQUEST['is_featured'];
    $category_id = $_REQUEST['category_id'];
    $photoName = $_FILES['photo']['name'];
    $photoTmpName = $_FILES['photo']['tmp_name'];
    move_uploaded_file($photoTmpName, "../ProductGallery/$photoName");

    empty($name) ? $errors[] = "name required" : "";
    empty($price) ? $errors[] = "price required" : "";
    empty($description) ? $errors[] = "description required" : "";
    empty($is_featured) ? $errors[] = "is_featured required" : "";
    empty($category_id) ? $errors[] = "category required" : "";
    empty($photoTmpName) ? $errors[] = "photo required" : "";

    $qry = "INSERT INTO products(name,price,photo,description,category_id,is_featured,created_date,updated_date) VALUES (:name,:price,:photo,:description,:category_id,:is_featured,:created_date,:updated_date)";

    $s = $pdo->prepare($qry);
    $s->bindParam(":name", $name, PDO::PARAM_STR);
    $s->bindParam(":price", $price, PDO::PARAM_STR);
    $s->bindParam(":photo", $photoName, PDO::PARAM_STR);
    $s->bindParam(":description", $description, PDO::PARAM_STR);
    $s->bindParam(":category_id",$category_id,PDO::PARAM_INT);
    $s->bindParam(":is_featured", $is_featured, PDO::PARAM_STR);
    $s->bindParam(":created_date", $now, PDO::PARAM_STR);
    $s->bindParam(":updated_date", $now, PDO::PARAM_STR);

    if ($s->execute()) {
      header("location:../admin-dashboard.php");
    } else {
      $errors[] = "OOps! Something went wrong. db insert errors";
    }
  }
}



require("../partials/navbar.php");
//require("./partials/carousel.php");
?>


<section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-200">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">

              <h2 class="text-uppercase text-center mb-5 mt-3">Create a product</h2>

              <form action="../products/product-create.php" method="post" enctype="multipart/form-data">
                <div class="form-outline mb-4">
                  <h6 class="mb-2 ms-2 pb-1 form-label">Upload Product photo </h6>
                  <input class="form-control form-control-lg" id="formFileLg" type="file" name="photo" />
                </div>
                <div class="form-outline mb-4">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" name="name" class="form-control form-control-lg">
                </div>
                <div class="form-outline mb-4">
                  <label for="name" class="form-label">Price</label>
                  <input type="text" name="price" class="form-control form-control-lg">
                </div>
                <div class="form-outline mb-4">
                  <label for="name" class="form-label">is_featured</label>
                  <input type="text" name="is_featured" class="form-control form-control-lg">
                </div>
                <div class="form-outline mb-4">
                  <label for="name" class="form-label">Description</label>
                  <input type="text" name="description" class="form-control form-control-lg">
                </div>
                <div class="form-outline mb-4">
                  <label for="categories">Choose a category:</label>

                  <select class="form-select form-select-sm w-50" aria-label="Small select example" name="category_id">
                    <option selected>Open this categories menu</option>

                    <?php
                    $qry = "SELECT * FROM categories";
                    $stmt = $pdo->prepare($qry);
                    $stmt->execute();
                    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($categories as $key => $category) : ?>
                      <option value="<?= $category['category_id'] ?>"><?= $category['category_name'] ?></option>
                    <?php endforeach ?>
                  </select>

                </div>
                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="create">Create Product</button>
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