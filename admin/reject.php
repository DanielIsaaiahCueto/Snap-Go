<?php
    session_start();
    include("config.php");
     if(isset($_GET['appointmentid'])){
        $id=$_GET['appointmentid'];

        $sql= "update appointmenttbl set Status='Rejected' where AppointmentID='$id'";
        $result=mysqli_query($conn,$sql);

        if($result){    
            header("location:admin_appointments.php");
        }
        else{
            die(mysqli_error($conn));
        }
     }

     if (!isset($_SESSION['USER_ID'])) {  
        header("location:login.php");  
        die();  
     }
?>