<?php
include("database.php");
session_start();
$error = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $password = $_POST["password"];

    if(!empty($email) && !empty($password) && !is_numeric($email)){
        $_SESSION["email"] =$email;

        $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if($result){
            if(mysqli_num_rows($result) > 0){
                $user_data = mysqli_fetch_assoc($result);
                $hased = password_verify($password, $user_data['password']);
                if($user_data["Password"] == $hased){
                    header("Location: dashboard.php");
                    die;
                }
            }
        }
        $error = "Invalid Username or Password";
    } else {
        $error = "Please fill all fields";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-image: linear-gradient(to right, blue, yellow);">
    <section class="vh-100">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5 ">
                                <h2 class="text-uppercase text-center mb-5">Sign In </h2>
                                <!-- <img src="/images/logo.png"> -->
                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                    <div>
                                        <label class="mt-1" for="">Email Address</label><br>
                                        <input class="mt-2 form-control form-control-lg" type="text" name="email" value="" placeholder="Enter Email">
                                        <p class="text-danger"><?php echo $error; ?></p>
                                    </div>
                                    <div>
                                        <label class="mt-1" for="">Password</label>
                                        <input class="mt-2 form-control form-control-lg" type="password" name="password" value="" placeholder="Enter Password">
                                        <p class="text-danger"><?php echo $error; ?></p>
                                    </div>
                                    <div>
                                        <input class="mt-3 w-100 btn btn-primary rounded-pill" type="submit" name="signin" value="Sign In">
                                        <p class="text-center text-muted mt-5 mb-0">You don't have an account? <a href="Register.php" class="fw-bold text-body"><u>Signup here</u></a></p><br>
                                    </div>
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
    <!-- Bootstrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>