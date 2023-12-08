<?php
    $editState = false;
    include("config.php");
    if(isset($_GET["updateid"])){
        $editState = true;
        $id = $_GET['updateid'];

        $sql = "SELECT * FROM `medicinetbl` WHERE `MedicineID`='$id'";

        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);

        $editid = $id;
        $editsku = $row["SKU"];
        $editmedname = $row["MedicineName"];
        $editdescription = $row["Description"];
        $editcategory = $row["Category"];
        $editexpdate = $row["ExpiryDate"];
        $editquantity = $row["Quantity"];
    }

    if(isset($_POST['update']))
    {   
        $editState = true; 
        $id = $_GET['updateid'];
        
        $sku = $_POST['sku'];
        $medname = $_POST['medname'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $expdate = $_POST['expdate'];

        $update = "update medicinetbl set SKU='$sku', MedicineName='$medname', Description='$description', Category='$category', ExpiryDate='$expdate' where MedicineID='$id'";
        $result = mysqli_query($conn,$update);

        if($result)
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