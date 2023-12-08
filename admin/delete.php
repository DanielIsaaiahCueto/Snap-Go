<?php
    session_start();
    include("config.php");
     if(isset($_GET['deleteid'])){
        $id=$_GET['deleteid'];

        $sql= "delete from usertbl where UserID=$id";
        $result=mysqli_query($conn,$sql);

        if($result){    
            header("location:admin_users.php");
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