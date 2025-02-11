<?php
// include "database.php";

?>
<?php
include 'database.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="delete from `attendance` where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        // echo "Delete Successfully";
        header('location:AttendanceTable.php');
    }
    else{
        die(mysqli_error($con));
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
        <a  class= "nav-link" href="AttendanceTab">
        <i class="bi bi-alarm text-white"></i>
        <span class="text-white">Atttendence</span>
</a>
    </div>
    </div>
   
<div class="container-fluid p-4">
<div class="row">
   <div class="container">
    <button class="btn btn-primary my-5 "><a href="AttendanceForm.php" class="text-light">Add</a>
</button>
<table class="table">
  <thead>
    <tr>
      <th>S.NO</th>
      <th>Employee</th>
      <th>Date</th>
      <th>TimeIn</th>
      <th>Timeout</th>
      <th>operation</th>
    </tr>
  </thead>
  <tbody>
    </tbody>
    <?php 
    $sql="select * from `attendance`";;
    $result=mysqli_query($conn,$sql);
    if($result){
      while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $Employee=$row['Employee'];
        $Date=$row['Date'];
        $Timein=$row['Timein'];
        $Timeout=$row['Timeout'];
        echo '<tr>
        <th scope="row">'.$id.'</th>
        <td>'.$Employee.'</td>
         <td>'.$Date.'</td>
          <td>'.$Timein.'</td>
           <td>'.$Timeout.'</td>
           <td>
           
           <button class="btn btn-danger"><a href="AttendanceTable.php? deleteid='.$id.'" class="text-light ">Delete</a></button>
           </td>

    </tr>';
      }
    }
    
    
    ?>

    
  </tbody>
</table>

   </div>
   </div>
   </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

