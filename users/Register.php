<?php

include("database.php");

$cpasserr = "";
$err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $cpassword = $_POST["cpassword"];
  $gender = $_POST['gender'] ?? '';

  $query = "select * from users where email = '$email' limit 1";
  $result = mysqli_query($conn, $query);

  if (!empty($result)) {
    if (!empty($username) && !empty($email) && !empty($password) && !empty($gender)) {
      if ($cpassword == $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users`(Username, email, password, cpassword, gender) VALUES('$username','$email','$hash','$hash','$gender')";
        if (mysqli_query($conn, $sql)) {
          header("Location:index.php");
          die;
        }
      } else {
        $cpasserr = "*Password And Confirm Password Must Be Same ";
      }
    } else {
      $err = "*Required Field";
    }
  } else {
    echo '<script>
        alert("The Email Is Already Exist");
    </script>';
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-image: linear-gradient(to right, blue, yellow);">
  <section class="vh-100">
    <div class="mask d-flex align-items-center h-100">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card" style="border-radius: 15px;">
              <div class="card-body p-5">
                <h2 class="text-uppercase text-center mb-5">Create an account</h2>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                  <div class=" mb-3">
                    <label class="form-label" for="">Your Name</label>
                    <input type="text" id="" class="form-control form-control-lg" name="name" />
                    <span class="text-danger"><?php echo $err; ?></span>
                  </div>
                  <div class=" mb-3">
                    <label class="form-label" for="">Your Email</label>
                    <input type="email" id="" class="form-control form-control-lg" name="email" />
                    <span class="text-danger"><?php echo $err; ?></span>
                  </div>
                  <div class=" mb-3">
                    <input type="radio" id="" name="gender" value="M" />
                    <label class="form-label" for="">Male</label>
                    <input type="radio" id="" name="gender" value="F" />
                    <label class="form-label" for="">Female</label>
                    <span class="text-danger"><?php echo $err; ?></span>
                  </div>
                  <div class=" mb-3">
                    <label class="form-label" for="">Password</label>
                    <input type="password" id="" class="form-control form-control-lg" name="password" />
                    <span class="text-danger"><?php echo $err; ?></span>
                  </div>
                  <div class=" mb-3">
                    <label class="form-label" for="">Confirm Password</label>
                    <input type="password" id="" class="form-control form-control-lg" name="cpassword" />
                    <span class="text-danger"><?php echo $cpasserr; ?></span>
                  </div>
                  <div class="">
                    <button type="submit" name="signup" class="btn btn-primary w-100 rounded-pill">Register</button>
                  </div>

                  <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="index.php " class="fw-bold text-body"><u>Login here</u></a></p>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Bootstrap Script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>