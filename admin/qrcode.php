<?php
    require_once 'phpqrcode/qrlib.php';
    include("config.php");
    $path = 'assets/images/qrcode/';
    $qrcode = $path.time().".png";
    $qrimage = time()."png";

    if(isset($_POST["add"])){
        $qrtext = $_POST['med_id'];
        $query = "update medicinetbl set QRCode='$qrimage' where MedicineID = '$qrtext'";
        $result = mysqli_query($conn, $query);
        QRcode::png($qrtext , $qrcode, 'H', 4, 4);

        

    }

    
?>