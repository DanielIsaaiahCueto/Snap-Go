<?php

    include("config.php");

    if (isset($_POST['add'])) {
        $qrimage = time().".png";
        $medid = $_POST["med_id"];
        $sku = $_POST['sku'];
        $medname = $_POST['medname'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $expdate = $_POST['expdate'];
        $quantity = $_POST["quantity"];
    
        $insert = "insert into medicinetbl (MedicineID,SKU,MedicineName,Description,Category,QRCode,ExpiryDate,Quantity) values ('$medid','$sku','$medname','$description','$category','$qrimage','$expdate','$quantity')";
        $result = mysqli_query($conn,$insert);
    
        if ($result) {
            
            header("location:admin_supplies.php");
        } else {
            die(mysqli_error($conn));
        }
     }
?>