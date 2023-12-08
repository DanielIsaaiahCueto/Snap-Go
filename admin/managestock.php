<?php

include("config.php");

if(isset($_GET["medid"])){
    $id = $_GET['medid'];

    $sql = "SELECT Quantity FROM `medicinetbl` WHERE `MedicineID`='$id'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $currentquantity = $row['Quantity'];
}

if(isset($_POST['updatestock']))
    {   
        $id = $_GET['medid'];
        
        $stocknum = $_POST['stocknum'];
        $totalquantity = $stocknum + $currentquantity;

        $query = "update `medicinetbl` set Quantity='$totalquantity' where MedicineID='$id'";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:admin_supplies.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }

    if(isset($_GET["dedmedid"])){
        $id = $_GET['dedmedid'];
    
        $sql = "SELECT Quantity FROM `medicinetbl` WHERE `MedicineID`='$id'";
    
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
    
        $currentquantity = $row['Quantity'];
    }

    if(isset($_POST['deduct']))
    {   
        $id = $_GET['dedmedid'];
        
        $stocknum = $_POST['stocknum'];
        $totalquantity = $currentquantity - $stocknum;

        $query = "update `medicinetbl` set Quantity='$totalquantity' where MedicineID='$id'";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:admin_supplies.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }

?>