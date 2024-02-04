<?php
require "./db/db.php";
require("./partials/header.php");

$id = $_GET['id'];
$qry = "SELECT * FROM users WHERE user_id=:user_id";
$stmt = $pdo->prepare($qry);
$stmt->bindParam(":user_id", $id, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch();
// print_r($user);
// die();
?>

<section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">

              <h2 class="text-uppercase text-center mb-5">Edit Form</h2>

              <form action="user-update.php" method="post" enctype="multipart/form-data">

                <input type="hidden" name="hiddenid" value="<?= $user['user_id'] ?>">
                <div class="form-outline">
                  <label for="name" class="form-label ms-2">Name</label>
                  <input type="text" value="<?= $user['name'] ?>" id="form3Example1cg" class="form-control form-control-lg" name="name" />
                </div>

                <div class="form-outline">
                <label for="email" class="form-label ms-2">Email</label>
                  <input type="email" value="<?= $user['email'] ?>" id="form3Example3cg" class="form-control form-control-lg" name="email" />
                </div>

                <div class="form-outline">
                <label for="phone" class="form-label ms-2">Phone</label>
                  <input type="phone" value="<?= $user['phone'] ?>" id="form3Example3cg" class="form-control form-control-lg" name="phone" />
                </div>

                <div>
                  <input type="hidden" name="oldPhoto" value="<?= $user['photo'] ?>">
                  <img src="./Gallery/<?= $user['photo'] ?>" width="150px" alt="">
                  <input class="form-control form-control-lg" id="formFileLg" type="file" name="photo" />
                </div>


                <div class="form-outline">
                <label for="address" class="form-label ms-2">Address</label>
                  <input type="text" value="<?= $user['address'] ?>" id="form3Example3cg" class="form-control form-control-lg" name="address" />
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="update">Update</button>
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
require("./partials/footer.php");
?>