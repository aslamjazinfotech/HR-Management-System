<?php
include 'Attendancedatabase.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="delete from `students` where id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        // echo "Delete Successfully";
        header('location:AttendanceTable.php');
    }
    else{
        die(mysqli_error($con));
    }
}
?>