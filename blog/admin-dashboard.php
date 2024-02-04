<?php
session_start();
$admin = isset($_SESSION['admin']);
require "./partials/header.php";
require "./db/db.php";
?>
<?php if ($admin) : ?>
  <div class="row">
    <h2>Admin Dashboard</h2>
    <div class="col-4 p-4">
      <ul class="list-group list-group-light">
        <li><a class="list-group-item" href="#users">Users Listing</a></li>
        <li><a class="list-group-item" href="#products">Products</a></li>
        <li><a class="list-group-item" href="#categories">Categories</a></li>
        <li><a class="list-group-item" href="#order">Order</a></li>
      </ul>
    </div>
    <div class="col-8">
      <?php
      if (isset($_GET['message'])) {
        $res = $_GET['message'];
        echo "<p class='text-success p-2 text-center mb-2 border border-success' onclick='this.remove()'>$res</p>";
      }
      ?>
      <section class="mb-4">
        <h4 id="user">User Listing</h4>

        <table class="table align-middle mb-0 bg-white">
          <thead class="bg-light">
            <tr>
              <th>Photo</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>

            <?php
            $qry = "SELECT * FROM users ORDER BY name ASC LIMIT 5";
            $stmt = $pdo->prepare($qry);
            $stmt->execute();
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($users as $key => $user) : ?>

              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <img src="./Gallery/<?= $user['photo'] ?>" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                  </div>
                </td>
                <td>
                  <p class="fw-normal mb-1"><?= $user['name'] ?></p>
                </td>
                <td>
                  <p class="fw-normal mb-1"><?= $user['email'] ?></p>
                </td>
                <td>
                  <p class="fw-normal mb-1"><?= $user['phone'] ?></p>
                </td>
                <td>
                  <p class="fw-normal mb-1"><?= $user['address'] ?></p>
                </td>
                <td>
                  <a href="user-edit.php?id=<?= $user['user_id'] ?>" class="btn btn-sm btn-rounded btn-primary">
                    Edit
                  </a>
                  <a href="user-del.php?id=<?= $user['user_id'] ?>" class="btn btn-sm btn-rounded btn-danger" onclick="return confirm('Are you Sure?')">
                    Delete
                  </a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </section>
      <section class="mb-5">

        <h4 id="products">Products</h4>

        <a href="products/product-create.php" class="btn btn-success btn-rounded">Create product</a>

        <table class="table align-middle mb-0 bg-white">

          <thead class="bg-light">
            <th>Photo</th>
            <th>Name</th>
            <th>Price</th>
            <th>Is_Featured</th>
            <th>Description</th>
            <th>Category</th>
            <th>action</th>
          </thead>
          <tbody>

            <?php
            $qry = "SELECT p.*, c.category_name
            FROM products p
            LEFT JOIN categories c ON p.category_id = c.category_id";

            $stmt = $pdo->prepare($qry);
            $stmt->execute();
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($products as $key => $product) : ?>

              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <img src="ProductGallery/<?= $product['photo'] ?>" alt="" style="width: 60px; height: 60px" class="rounded" />
                  </div>
                </td>

                <td>
                  <p class="fw-normal mb-1"><?= $product['name'] ?></p>
                </td>
                <td>
                  <p class="fw-normal mb-1"><?= $product['price'] ?></p>
                </td>
                <td>
                  <p class="fw-normal mb-1"><?= $product['is_featured'] ?></p>
                </td>

                <td>
                  <p class="fw-normal mb-1"><?= $product['description'] ?></p>
                </td>

                <td>
                  <?= $product['category_name']; ?>
                </td>
                <td>
                  <a href="products/product-edit.php?id=<?= $product['product_id'] ?>" class="btn btn-sm btn-rounded btn-primary">
                    Edit
                  </a>
                  <a href="products/product-del.php?id=<?= $product['product_id'] ?>" class="btn btn-sm btn-rounded btn-danger" onclick="return confirm('Are you Sure to delete this product?')">
                    Delete
                  </a>
                </td>
              <?php endforeach ?>
              </tr>
          </tbody>
        </table>
      </section>

      <section class="mb-4">
        <h4 id="categories">Categories</h4>

        <a href="categories/category-create.php" class="btn btn-success btn-rounded">Create Category</a>
        <table class="table align-middle mb-0 bg-white">
          <thead class="bg-light">
            <tr>
              <th>Name</th>
              <th class="ps-5">action</th>
            </tr>
          </thead>
          <tbody>

            <?php
            $qry = "SELECT * FROM categories";
            $stmt = $pdo->prepare($qry);
            $stmt->execute();
            $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($categories as $key => $category) : ?>


              <tr>
                <td>
                  <p class="fw-normal mb-1"><?= $category['category_name'] ?></p>
                </td>
                <td>
                  <a href="categories/category-edit.php?id=<?= $category['category_id'] ?>" class="btn btn-sm btn-rounded btn-primary">
                    Edit
                  </a>
                  <a href="categories/category-del.php?id=<?= $category['category_id'] ?>" class="btn btn-sm btn-rounded btn-danger" onclick="return confirm('Are you Sure to delete this category?')">
                    Delete
                  </a>
                </td>
              <?php endforeach ?>

              </tr>
          </tbody>
        </table>

      </section>
      <section>
        <h4 id="order">Order</h4>
      </section>
    </div>
  </div>

<?php else : ?>
  <?php header('location:index.php') ?>
<?php endif ?>
<?php require "./partials/footer.php"; ?>