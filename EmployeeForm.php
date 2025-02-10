<?php

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
            <label class="mt-2" for="">First Name</label><br>
            <input class="mt-2 form-control" type="text" name="f-name" value="" placeholder="First Name">
            <label class="mt-2" for="">Last Name</label>
            <input class="mt-2 form-control" type="text" name="L-name" value="" placeholder="Last Name">
            <label class="mt-2" for="">Email Address</label><br>
            <input class="mt-2 form-control" type="email" name="email" value="" placeholder="Email">
            <label class="mt-2" for=""> Country </label>
            <input type="text" class="form-control" name="country" value="" placeholder="Country">
            <label class="mt-2" for=""> Phone Number </label>
            <input type="phone" class="form-control" name="phone" value="" placeholder="Phone No">
            <label class="mt-2" for=""> Gender </label><br> 
            <input type="radio" name="gender" value="" placeholder="Gender">Male <br>
            <input type="radio" name="gender" value="" placeholder="Gender">Female <br>
            <label class="mt-2" for="">Joining Date</label>
            <input type="date" class="form-control" value="" placeholder="Joining Date">
            <input class="mt-3 w-100 btn btn-primary rounded-pill" type="submit" name="signin" value="Sign In"><br>
            <div class="text-center mt-3"><a href="#">Forget Password ?</a></div><br>
    </div>
    </form>
    </div>


    <!-- Bootstrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>