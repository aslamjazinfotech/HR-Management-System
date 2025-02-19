<?php
include("database.php");
session_start();

$userprofile = $_SESSION["email"];

if($userprofile == true){
    
}
else{
    header("Location:index.php");
}


if (isset($_GET['updateid'])) {
    $id = $_GET['updateid'];

    
    $sql = "SELECT * FROM `attendance` WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        die("Record not found.");
    }

    $Employee = $row['Employee'];
    $Date = $row['Date'];
    $Timein = $row['Timein'];
    $Timeout = $row['Timeout'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Employee = $_POST["username"];
    $Date = $_POST["date"];
    $Timein = $_POST["Time"];
    $Timeout = $_POST["Timeout"];

    $sql = "UPDATE `attendance` SET Employee = '$Employee',Date = '$Date',Timein ='$Timein',Timeout='$Timeout' WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: AttendanceTable.php");
        exit;
    } else {
        die("Update failed: " . mysqli_error($conn));
    }
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
    <title>Update Attendance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<form method="POST">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg p-4 rounded-4">
                    <h2 class="text-center mb-4">Update Attendance</h2>

                    <div class="mb-3">
                        <label for="username" class="form-label">Employee *</label>
                        <input type="text" class="form-control" name="username" value="<?php echo htmlspecialchars($Employee); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="date" class="form-label">Date *</label>
                        <input type="date" class="form-control" name="date" value="<?php echo htmlspecialchars($Date); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="Time" class="form-label">Time In *</label>
                        <input type="time" class="form-control" name="Time" value="<?php echo htmlspecialchars($Timein); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="Timeout" class="form-label">Time Out *</label>
                        <input type="time" class="form-control" name="Timeout" value="<?php echo htmlspecialchars($Timeout); ?>" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Update</button>

                </div>
            </div>
        </div>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
