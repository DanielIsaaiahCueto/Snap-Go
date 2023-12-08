<?php
    session_start();
    require_once 'phpqrcode/qrlib.php';
    include("config.php");
    $path = 'assets/images/appointments_qrcode/';
    $qrcode = $path.time().".png";
    $qrimage = time().".png";

     if(isset($_GET['appointmentid'])){
        $id=$_GET['appointmentid'];
        $qrtext = $id;

        $sql= "update appointmenttbl set Status='Approved', QRCode='$qrimage' where AppointmentID='$id'";
        $result=mysqli_query($conn,$sql);

        if($result){
            QRcode::png($qrtext , $qrcode, 'H', 4, 4);
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