<?php

    session_start();
    unset($_SESSION["USER_ID"]);
    unset($_SESSION["USER_FNAME"]);
    header("location:../login.php");
    die();  
    

?>