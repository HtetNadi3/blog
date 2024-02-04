<?php
require "./db/db.php";
require("./partials/header.php");

$errors=[];
$date = new DateTime('now');
$now = $date->format("Y-m-d H:i:s");

if($_SERVER['REQUEST_METHOD']==="POST"){
  // echo "Yes";
  if(isset($_REQUEST['register'])){
    // echo "yes";
    $name =trim($_REQUEST['name']);
    $email =trim($_REQUEST['email']);
    $password =trim($_REQUEST['password']);
    $password = password_hash($password, PASSWORD_BCRYPT);
    $phone =trim($_REQUEST['phone']);
    $photoName =$_FILES['photo']['name'];
    $photoTmpName=$_FILES['photo']['tmp_name'];
    move_uploaded_file($photoTmpName,"Gallery/$photoName");
    $address =trim($_REQUEST['address']);
    
    empty($name) ? $errors[] = "name required" : "";
    empty($email) ? $errors[] = "email required" : "";
    empty($password) ? $errors[] = "password required" : "";
    empty($phone) ? $errors[] = "phone required" : "";
    empty($photoTmpName) ? $errors[] = "photo required" : "";
    empty($address) ? $errors[] = "address required" : "";

    $emailCheck ="SELECT * FROM users WHERE email=:email";
    $stmt = $pdo->prepare($emailCheck);
    $stmt->bindParam(':email',$email, PDO::PARAM_STR);
    $stmt->execute();
    $res = $stmt->fetch();
    if($res){
      $errors[]="Email is already exist";
    }else{
      $qry="INSERT INTO users(name,email,password,phone,photo,address,created_date,updated_date) VALUES (:name,:email,:password,:phone,:photo,:address,:created_date,:updated_date)";
      
      $s = $pdo->prepare($qry);
      $s->bindParam(":name", $name, PDO::PARAM_STR);
      $s->bindParam(":email", $email, PDO::PARAM_STR);
      $s->bindParam(":password", $password, PDO::PARAM_STR);
      $s->bindParam(":phone", $phone, PDO::PARAM_STR);
      $s->bindParam(":photo", $photoName, PDO::PARAM_STR);
      $s->bindParam(":address", $address, PDO::PARAM_STR);
      $s->bindParam(":created_date", $now, PDO::PARAM_STR);
      $s->bindParam(":updated_date", $now, PDO::PARAM_STR);    
    
      if($s->execute()){
        header("location: login.php");
      }else{
        $errors[]="OOps! Something went wrong. db insert errors";
      }
    }
  }
  
}

require("./partials/navbar.php");
//require("./partials/carousel.php");
?>

<section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">

              <h2 class="text-uppercase text-center mb-5">Create an account</h2>

              <form action="register.php" method="post" enctype="multipart/form-data">

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="name"/>
                  <label class="form-label" for="form3Example1cg">Your Name</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" id="form3Example3cg" class="form-control form-control-lg" name="email"/>
                  <label class="form-label" for="form3Example3cg">Your Email</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="phone" id="form3Example3cg" class="form-control form-control-lg" name="phone"/>
                  <label class="form-label" for="form3Example3cg">Phone Number</label>
                </div>

                <div class="form-outline mb-4">
                  <h6 class="mb-2 ms-2 pb-1 form-label">Upload photo </h6>
                  <input class="form-control form-control-lg" id="formFileLg" type="file" name="photo"/>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example3cg" class="form-control form-control-lg" name="address"/>
                  <label class="form-label" for="form3Example3cg">Address</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="password"/>
                  <label class="form-label" for="form3Example4cg">Password</label>
                </div>

                <!-- <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cdg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                </div> -->

                <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="register">Register</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login.php"
                    class="fw-bold text-body"><u>Login here</u></a></p>

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
  