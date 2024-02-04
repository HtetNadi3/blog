<?php
require "../db/db.php";
require("../partials/header.php");

$id = $_GET['id'];
$qry = "SELECT * FROM products WHERE product_id=:product_id";
$stmt = $pdo->prepare($qry);
$stmt->bindParam(":product_id", $id, PDO::PARAM_INT);
$stmt->execute();
$product = $stmt->fetch();
// print_r($product);
// die();
?>

<section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-200">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Edit Product</h2>

              <form action="../products/product-update.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="hiddenid" value="<?= $product['product_id'] ?>">
                <div>
                  <input type="hidden" name="oldPhoto" value="<?= $product['photo'] ?>">

                  <img src="../ProductGallery/<?= $product['photo'] ?>" width="80px" alt="">
                  <input class="form-control form-control-lg" id="formFileLg" type="file" name="photo" />
                </div>
                <div class="form-outline mb-2">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" name="name" value="<?= $product['name'] ?>" class="form-control form-control-lg">
                </div>
                <div class="form-outline mb-2">
                  <label for="name" class="form-label">Price</label>
                  <input type="text" name="price" value="<?= $product['price'] ?>" class="form-control form-control-lg">
                </div>
                <div class="form-outline mb-2">
                  <label for="name" class="form-label">is_featured</label>
                  <input type="text" name="is_featured" value="<?= $product['is_featured'] ?>" class="form-control form-control-lg">
                </div>
                <div class="form-outline mb-2">
                  <label for="name" class="form-label">Description</label>
                  <input type="text" name="description" value="<?= $product['description'] ?>" class="form-control form-control-lg">
                </div>
                <div class="form-outline mb-1">
                  <label for="categories">Choose a category:</label>

                  <select class="form-select form-select-sm w-50" name="category_id" aria-label="Small select example">
                    <?php
                    $qry = "SELECT * FROM categories";
                    $stmt = $pdo->prepare($qry);
                    $stmt->execute();
                    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($categories as $key => $category) : ?>
                      <?php
                      $selected = ($category['category_id'] == $product['category_id']) ? 'selected' : '';
                      ?>
                      <option value="<?= $category['category_id'] ?>" <?= $selected ?>><?= $category['category_name'] ?></option>
                    <?php endforeach ?>
                  </select>

                </div>

            </div>
            <div class="d-flex justify-content-center">
              <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="update">Update Product</button>
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