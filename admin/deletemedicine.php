<?php
    session_start();
    include("config.php");
     if(isset($_GET['deleteid'])){
        $medid=$_GET['deleteid'];

        $sql= "delete from medicinetbl where MedicineID='$medid'";
        $result=mysqli_query($conn,$sql);

        if($result){    
            header("location:admin_supplies.php");
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