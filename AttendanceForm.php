<?php
include "database.php";

$nameErr = $dateErr = $TimeErr = $TimeoutErr = "";
$username = $date = $Time = $Timeout = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isValid = true; 

    if (empty($_POST["username"])) {
        $nameErr = " *Please enter a name";
        $isValid = false;
    } else {
        $username = test_input($_POST["username"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $username)) {
            $nameErr = "Only letters and white space allowed";
            $isValid = false;
        }
    }

    if (empty($_POST['date'])) {
        $dateErr = " *Date is required";
        $isValid = false;
    } else {
        $date = test_input($_POST['date']);
    }

    if (empty($_POST['Time'])) {
        $TimeErr = " *Time is required";
        $isValid = false;
    } else {
        $Time = test_input($_POST['Time']);
    }

    if (empty($_POST['Timeout'])) {
        $TimeoutErr = " *Time out is required";
        $isValid = false;
    } else {
        $Timeout = test_input($_POST['Timeout']);
    }

   
    if ($isValid && isset($_POST['submit'])) {
        $Employee = $username;
        $Date = $date;
        $TimeIn = $Time;
        $TimeOutValue = $Timeout; 

        $sql = "INSERT INTO `attendance` (Employee, Date, TimeIn, Timeout) 
                VALUES ('$Employee', '$Date', '$TimeIn', '$TimeOutValue')";

        if (mysqli_query($conn, $sql)) {
            header('Location: AttendanceTable.php');
            exit;
        } else {
            die("Database Error: " . mysqli_error($con));
        }
    }
}

function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    .error {
      color: red;
    }
  </style>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Attendance Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>



<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
<div class="container-fluid p-4">
<div class="row">
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow-lg p-4 rounded-4">
          <h2 class="text-center mb-4">Employee Attendance</h2>
          <div class="mb-3">
            <label for="username" class="form-label">Employee *</label>
            <input type="text" class="form-control" name="username" placeholder="Enter your Name" value="<?php echo htmlspecialchars($username); ?>">
            <span class="error"><?php echo $nameErr; ?></span>
          </div>

          <div class="mb-3">
            <label for="date" class="form-label">Date *</label>
            <input type="date" class="form-control" name="date">
            <span class="error"><?php echo $dateErr?></span>
          </div>

          <div class="mb-3">
            <label for="time_in" class="form-label">Time In *</label>
            <input type="time" class="form-control" name="Time">
            <span class="error"><?php echo $TimeErr?></span>
          </div>

          <div class="mb-3">
            <label for="time_out" class="form-label">Time Out *</label>
            <input type="time" class="form-control" name="Timeout">
            <span class="error"><?php echo $TimeoutErr?></span>
          </div>

          <button type="submit" class="btn btn-primary w-100" name="submit">Submit</button>

        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
