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
include 'database.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="delete from `employee` where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        // echo "Delete Successfully";
        header('location:EmployeeData.php');
    }
    else{
        die(mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">

    <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <img src="images/logo.png" alt="img"  height="60px"> 
    

  </div>
</nav>
<div class="d-flex">
    <div class="w-25 " id="navbarToggleExternalContent">
    <div class="bg-dark p-2 h-200px min-vh-100" >
      <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white "></div>
       <span class="h5 text-white">Dashboard</span>
       <hr class="sidebar-divider my-2">
        <a  class= "nav-link" href="EmployeeData.php">
        <i class="bi bi-people text-white"></i>
        <span class="text-white">Empolyees</span>
        <hr class="sidebar-divider my-2">
        <a  class= "nav-link" href="AttendanceTable.php">
        <i class="bi bi-alarm text-white"></i>
        <span class="text-white">Atttendence</span>
</a>
    </div>
    </div>
    <div class="container mt-2">
        <a href="EmployeeForm.php" class="btn btn-success">Add</a>
        <table class="table">
        <thead>
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email Address</th>
            <th>Phone Number</th>
            <th>Country</th>
            <th>Gender</th>
            <th>Joining Date</th>
            <th>Operation</th>
        </thead>
        <tbody>
            <?php
                $sql = "select * from `employee` where EmailAddress = '$userprofile' ";
                $result = mysqli_query($conn,$sql);
                if($result){
                    while($row = mysqli_fetch_assoc($result)){
                        $id=$row["id"];
                        $FirstName=$row["FirstName"];
                        $LastName=$row["LastName"];
                        $EmailAddress=$row["EmailAddress"];
                        $PhoneNo=$row["PhoneNo"];
                        $Country=$row["Country"];
                        $Gender=$row["Gender"];
                        $JoiningDate=$row["JoiningDate"];
                        echo'<tr>
                        <th scope="row">'.$id.'</th>
                        <td>'.$FirstName.'</td>
                        <td>'.$LastName.'</td>
                        <td>'.$EmailAddress.'</td>
                        <td>'.$PhoneNo.'</td>
                        <td>'.$Country.'</td>
                        <td>'.$Gender.'</td>
                        <td>'.$JoiningDate.'</td>
                        <td>
<<<<<<< HEAD
                         <button class="btn btn-danger"><a class="text-white text-decoration-none" href="EmployeeData.php? deleteid='.$id.'" class="text-light ">Delete</a></button>
=======
                         <button class="btn btn-danger"><a href="EmployeeData.php? deleteid='.$id.'" class="text-white text-decoration-none">Delete</a></button>
>>>>>>> baad53870f239ddbb47ef4ae41a67bac919ebf5d
                        </td>';
                    }
                }
            ?>
        </tbody>
        </table>
    </div>

    <!-- Bootstrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>