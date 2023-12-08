<?php
    $editState = false;
    include("config.php");
    if(isset($_GET["updateid"])){
        $editState = true;
        $id = $_GET['updateid'];

        $sql = "SELECT * FROM `usertbl` WHERE `UserID`='$id'";

        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);

        $editfname = $row["FirstName"];
        $editmname = $row["MiddleName"];
        $editlname = $row["LastName"];
        $editsex = $row["Sex"];
        $editbirthday = $row["Birthday"];
        $editaddress = $row["Address"];
        $editcontact = $row["ContactNumber"];
        $editusername = $row["Username"];
        $editpassword = $row["Password"];
    }

    if(isset($_POST['update']))
    {   
        $editState = true; 
        $id = $_GET['updateid'];
        
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $sex = $_POST["sex"];
        $birthday = $_POST["birthday"];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $username = $_POST["username"];
        $password = $_POST['password'];

        $query = "update `usertbl` set FirstName='$fname', MiddleName='$mname', LastName='$lname', Sex='$sex',Birthday='$birthday',Address='$address',ContactNumber='$contact',Username='$username',Password='$password'  where `UserID`='$id'";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:register.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>