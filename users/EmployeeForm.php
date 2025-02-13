<?php
include("database.php");
    session_start();

    $userprofile = $_SESSION["email"];

    if($userprofile == true){
        
    }
    else{
        header("Location:index.php");
    }
?>
<?php

    $err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'] ?? '';
    $date = $_POST['date'];

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($phone) ){
        $FirstName = $fname;
        $LastName = $lname;
        $EmailAddress = $email;
        $PhoneNo = $phone;
        $Country =$country;
        $Gender = $gender;
        $JoiningDate = $date;

        $sql = "INSERT INTO `employee`(FirstName, LastName, EmailAddress, PhoneNo, Country, Gender, JoiningDate) VALUES('$FirstName','$LastName','$EmailAddress','$PhoneNo','$Country','$Gender','$JoiningDate')";
        if(mysqli_query($conn, $sql)){
            header("Location:EmployeeData.php");
            die;
        }
    }
    else{
        $err = "*Required Field";
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
    <div class="container bg-white rounded-3 mt-5 w-25">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="text-center">
                <img class=" m-4" src="/images/logo.png">
            </div>
            <h6 class="mt-2">Employee Form</h6>
            <label class="mt-2 form-label" for="">First Name</label>
            <input class="mt-2 form-control" type="text" name="fname" value="" placeholder="First Name">
            <p class="text-danger"><?php echo $err;?></p>
            <label class=" form-label" for="">Last Name</label>
            <input class="mt-2 form-control" type="text" name="lname" value="" placeholder="Last Name">
            <p class="text-danger"><?php echo $err;?></p>
            <label class="mt-2 form-label" for="">Email Address</label>
            <input class="mt-2 form-control" type="email" name="email" value="" placeholder="Email">
            <p class="text-danger"><?php echo $err;?></p>
            <label class="mt-2 form-label" for=""> Phone Number </label>
            <input type="phone" class="form-control" name="phone" value="" placeholder="Phone No">
            <p class="text-danger"><?php echo $err;?></p>
            <label class="mt-2 form-label" for=""> Country </label>
            <input type="text" class="form-control" name="country" value="" placeholder="Country">
            <label class="mt-2 form-label" for=""> Gender </label><br> 
            <input type="radio" name="gender" value="M" placeholder="Gender">Male <br>
            <input type="radio" name="gender" value="F" placeholder="Gender">Female <br>
            <label class="mt-2 form-label" for="">Joining Date</label>
            <input type="date" class="form-control" name="date" value="" placeholder="Joining Date">
            <input class="mt-3 mb-3 w-100 btn btn-primary rounded-pill" type="submit" name="signin" value="Submit">
    </div>
    </form>
    </div>


    <!-- Bootstrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php 

?>