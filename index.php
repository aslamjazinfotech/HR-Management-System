<?php
include("database.php");
session_start();
$error = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $password = $_POST["password"];

    if(!empty($email) && !empty($password) && !is_numeric($email)){
        $_SESSION["email"] =$email;

        $query = "select * from users where email = '$email' limit 1";
        $result = mysqli_query($conn, $query);

        if($result){
            if($result && mysqli_num_rows($result) > 0){
                $user_data = mysqli_fetch_assoc($result);

                if($user_data['Password'] == $password){
                    header("Location:dashboard.php");
                    die;

                }
            }
        }
        $error = "Invalid Username Or Password";
    }
    $error = "Invalid Username Or Password";
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
    <div class="container bg-white rounded-3 mt-5 w-25">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="text-center">
                <img class=" m-4" src="/images/logo.png">
            </div>
            <h6 class="mt-2">Sign In</h6>
            <label class="mt-1" for="">Email Address</label><br>
            <input class="mt-2 form-control" type="text" name="email" value="" placeholder="Enter Email">
            <p class="text-danger"><?php echo $error;?></p>
            <label class="mt-1" for="">Password</label>
            <input class="mt-2 form-control" type="password" name="password" value="" placeholder="Enter Password">
            <p class="text-danger"><?php echo $error;?></p>
            <input class="mt-3 w-100 btn btn-primary rounded-pill" type="submit" name="signin" value="Sign In"><br>
            <div class="text-center mt-3"><a href="#">Forget Password ?</a></div><br>
    </div>
    </form>
    </div>


    <!-- Bootstrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>