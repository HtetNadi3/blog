<?php

session_start();
require "./db/db.php";

$errors=[];

if (isset($_POST['login'])) {
  $name = trim($_POST['name']);
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);
  empty($email) ? $errors[] = "email required" : "";
  empty($password) ? $errors[] = "password required" : "";
  if (count($errors) === 0) {
      $email_check_qry = "SELECT * FROM users WHERE email=:email";
      $statement = $pdo->prepare($email_check_qry);
      $statement->bindParam(":email", $email, PDO::PARAM_STR);
      $statement->execute();
      $res = $statement->fetch();

      if($email === "admin@gmail.com" && $password === "admin" && $name === "admin"){
        $_SESSION['name'] = "admin";
        $_SESSION['admin'] = "admin";
        header("location:admin-dashboard.php");
      }else{
      if ($res) {
        
        if (password_verify($password, $res['password']) && $email == $res['email']) {

            $_SESSION['name'] = $res['name'];
            $_SESSION['photo'] = $res['photo'];
            
            header('location:index.php');
        } else {
            $errors[] = "password do not match";
        }
        } else {
        $errors[] = "Email not Exist";
        }
      }
  }
}

require("./partials/header.php");
require("./partials/navbar.php");
?>
  <section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Login Form</h2>

              <form method="post">

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="name"/>
                  <label class="form-label" for="form3Example1cg">Your Name</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" id="form3Example3cg" class="form-control form-control-lg" name="email"/>
                  <label class="form-label" for="form3Example3cg">Your Email</label>
                </div>

                
                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="password"/>
                  <label class="form-label" for="form3Example4cg">Password</label>
                </div>


                <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="login">Login</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Haven't  account? <a href="register.php"
                    class="fw-bold text-body"><u>Register here</u></a></p>

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
  