<?php

session_start();  
 include("config.php");
 if (!isset($_SESSION['USER_ID'])) {  
      header("location:login.php");  
      die();  
 }
 $userid = $_SESSION['USER_ID'];
 $select = "select * from usertbl where UserID='$userid'";
 $info = mysqli_fetch_array(mysqli_query($conn, $select));
 
 $usertype = $info['UserType'];
 $userfname = $info['FirstName'];

if (isset($_POST["enterAppid"])) {
    $appid = $_POST['appid'];

    $select = "select * from appointmenttbl where AppointmentID = '$appid'";
    $result = mysqli_query($conn,$select);
    $row = mysqli_fetch_array($result);
    $row_num = mysqli_num_rows($result);

    if($row_num != 0) {
        header("location:appointments.php?appid=$appid");
    }

    
}

$query="select * from recordtbl order by RecordNo desc limit 1";
 $result = mysqli_query($conn, $query);
 $row = mysqli_fetch_array($result);
 $lastid = $row['RecordNo'];

 if ($lastid == '') {
    $recordno = "REC1";
 }else{
    $recordno = substr($lastid,3);
    $recordno = intval($recordno);
    $recordno = "REC" . ($recordno + 1);
 }

if (isset($_POST["submit"])) {
    $appid = $_GET['appid'];

    $select = "select * from appointmenttbl where AppointmentID = '$appid'";
    $result = mysqli_query($conn,$select);
    $row = mysqli_fetch_array($result);

    $date = $row['Date'];
    $pfname = $row['FirstName'];
    $plname = $row['LastName'];
    $progname = $row['ProgramName'];
    $bp = $_POST['bloodPressure'];
    $temp = $_POST['temperature'];
    $recommend = $_POST['recommendation'];
    $wfname = $_SESSION['USER_FNAME'];
    $wlname = $_SESSION['USER_LNAME'];

    $insert = "insert into recordtbl (RecordNo, Date, FirstName, LastName, Purpose, BloodPressure, Temperature, Recommendation, WorkerFirstName, WorkerLastName) VALUES ('$recordno', '$date', '$pfname', '$plname', '$progname', '$bp', '$temp', '$recommend', '$wfname', '$wlname')";
    $result = mysqli_query($conn,$insert);
    $delete = "delete from appointmenttbl where AppointmentID = '$appid'";
    $result = mysqli_query($conn,$delete);

    header("appointments.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/appointments-w.css?v=<?php echo time(); ?>">
    <title>Appointments</title>
    <link rel="icon" type="image/x-icon" href="./assets/images/dashboard/logo.png">
</head>

<body>
    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="./assets/images/dashboard/logo.png">
                    <h2>Snap&<span class="danger">Go</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="dashboard.php">
                    <span class="las la-home"></span>
                    <h3>Home</h3>
                </a>
                <a href="manage_supplies.php">
                    <span class="las la-list-alt"></span>
                    <h3>Manage Supplies</h3>
                </a>
                <a href="register.php">
                    <span class="las la-users"></span>
                    <h3>Register</h3>
                </a>
                <a href="appointments.php" class="active">
                    <span class="las la-calendar"></span>
                    <h3>Appointments</h3>
                </a>
                <a href="history.php">
                    <span class="las la-history"></span>
                    <h3>History</h3>
                </a>
                <a href="profile.php">
                    <span class="las la-user-circle"></span>
                    <h3>Profile</h3>
                </a>
                <a href="logout.php">
                    <span class="las la-door-open"></span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <!-- End of Sidebar Section -->

        <!-- Main Content -->
        <main>
            <div class="top-nav">
                <div class="title">
                    <h1>Appointments</h1>
                </div>
            </div>

            <div class="supplies-header">
                <div class="search_wrap search_wrap_3">
                    <div class="search_box">
                        <input type="text" class="input" placeholder="Search...">
                        <div class="btn btn_common">
                            <i class="las la-search"></i>
                        </div>
                    </div>
                </div>
                <div class="filter">
                    <i class="las la-filter"></i>
                </div>
                <a href="appointments.php?scan">
                    <div class="add-supplies">
                        <div>
                            <span class="las la-plus"></span>
                            <h3>Add</h3>
                        </div>
                    </div>
                </a>
            </div>

            <div class="appointments-list">
                <table>
                    <thead>
                        <th>Appointment ID</th>
                        <th>Program Name</th>
                        <th>Date</th>
                        <th>Name</th>

                    </thead>
                    <tbody>
                        <?php
                           
                           $select = "select * from appointmenttbl where Status='Approved'";
                           $result = mysqli_query($conn,$select);
                           $num_row = mysqli_num_rows($result);
                           if ($num_row > 0) {
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                  
                                    $id = $row['AppointmentID'];
                                    $progname = $row['ProgramName'];
                                    $fname = $row['FirstName'];
                                    $lname = $row['LastName'];
                                    $date = $row['Date'];
                                    $status = $row['QRCode']                                
                                    ?>

                        <tr>

                            <th scope="row"><?php echo $id ?></th>

                            <td><?php echo $progname ?></td>
                            <td><?php echo $date ?></td>
                            <td><?php echo $fname . ' ' . $lname ?></td>
                            <td><img src="" alt=""></td>
                            
                        </tr>
                        <?php   }
                             }
                        }else{
                            ?>
                        <tr>
                        <td></td>
                            <td style="align-text:center;">No Available Data</td>
                        </tr>
                        <?php
                            
                            
                        }?>


                    </tbody>
                </table>
            </div>
        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->
        <div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
                <div class="dark-mode">
                    <span class="material-icons-sharp active">
                        light_mode
                    </span>
                    <span class="material-icons-sharp">
                        dark_mode
                    </span>
                </div>

                <div class="profile">
                    <div class="info">
                        <p>Hey, <b><?php echo $userfname ?></b></p>
                        <small class="text-muted"><?php echo $usertype ?></small>
                    </div>
                    <div class="profile-photo">
                        <img src="./assets/images/profile.png">
                    </div>
                </div>
            </div>
            <div class="cont">
                <div style="max-height: 30rem;overflow-y: scroll;overflow-x: hidden;">
                        <table>
                            <tr>
                                <thead>
                                    <th><i class="las la-clock"></i></i>Pending</th>
                                </thead>
                            </tr>
                            <tbody>
                                <?php
                           
                           $select = "select * from appointmenttbl where Status='Pending'";
                           $result = mysqli_query($conn,$select);
                           $num_row = mysqli_num_rows($result);

                           if ($num_row > 0) {
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                  
                                    $id = $row['AppointmentID'];
                                    $progname = $row['ProgramName'];
                                    $fname = $row['FirstName'];
                                    $lname = $row['LastName'];
                                    $date = $row['Date'];
                                    $status = $row['Status'];                            
                                    ?>
                                <tr>
                                    <th scope="row" style="padding-left:1rem;text-align:left;">
                                        <h3><b>Name: </b><?php echo $fname . ' ' . $lname ?></h3>
                                        <h3><b>Program: </b><?php echo $progname ?></h3>
                                        <h3><b>Date: </b><?php echo $date ?></h3>
                                    </th>

                                </tr>
                                <?php   }
                             }
                           }else{
                            ?>
                                <tr>
                                    <td>No Available Data</td>
                                </tr>
                                <?php
                           }?>
                            </tbody>
                        </table>
                </div>


                <div style="max-height: 27rem;overflow-y: scroll;overflow-x: hidden;">
                    <table>
                        <tr>
                            <thead>
                                <th><i class="las la-times"></i>Rejected</th>
                            </thead>
                        </tr>
                        <tbody>
                            <tr>
                                <?php
                           
                           $select = "select * from appointmenttbl where Status='Rejected'";
                           $result = mysqli_query($conn,$select);
                           $num_row = mysqli_num_rows($result);

                           if( $num_row > 0){
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                  
                                    $id = $row['AppointmentID'];
                                    $progname = $row['ProgramName'];
                                    $fname = $row['FirstName'];
                                    $lname = $row['LastName'];
                                    $date = $row['Date'];
                                    $status = $row['Status'];                            
                                    ?>
                            <tr>
                                <th scope="row" style="padding-left:1rem;text-align:left;">
                                    <h3><b>Name: </b><?php echo $fname . ' ' . $lname ?></h3>
                                    <h3><b>Program: </b><?php echo $progname ?></h3>
                                </th>
                                <td><?php echo $date ?></td>
                            </tr>
                            <?php   }
                             }
                           }else{
                            ?>
                            <tr>
                                <td>No Available Data</td>
                            </tr>
                            <?php
                           }?>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="pop-up" id="popupScanPatient">
        <div class="form-popup" id="myForm">
            <form class="form-container" method="post">
                <div class="pop-up-title-bar">
                    <h1>QR Code</h1>
                    <div class="close-but">
                        <a href="appointments.php"><i class="las la-times"></i></a>
                    </div>
                </div>
                <div class="row">
                    <div class="input-box">
                        <label for="appid"><b>AppointmentID</b></label>
                        <input type="text" placeholder="Enter AppointmentID" name="appid" id="appid" required>

                        <div class="buttons">

                            <div class="button-box">
                                <button type="submit" class="btn" name="enterAppid" id="enterAppid">Enter</button>
                            </div>

                            <div class="button-box">
                                <a href="appointments.php?camera"><button type="button" class="btn cancel">Scan by
                                        Camera</button></a>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
    </div>

    <div class="pop-up" id="popupCheckPatient">
        <div class="form-popup" id="myForm">
            <form class="form-container" method="post">
                <div class="pop-up-title-bar">
                    <h1>Vital Signs</h1>
                    <div class="close-but">
                        <a href="appointments.php"><i class="las la-times"></i></a>
                    </div>
                </div>
                <div class="row">
                    <div class="input-box">
                        <label for="bloodPressure"><b>Blood Pressure</b></label>
                        <input type="text" placeholder="Enter Blood Pressure" name="bloodPressure" id="bloodPressure"
                            required>
                    </div>

                    <div class="input-box">
                        <label for="temperature"><b>Temperature</b></label>
                        <input type="text" placeholder="Enter Temperature" name="temperature" id="temperature" required>
                    </div>
                    <div class="input-box">
                        <label for="recommendation"><b>Recommendation</b></label>
                        <input type="text" placeholder="Enter Diagnosis" name="recommendation" id="recommendation"
                            required>
                    </div>


                </div>
                <div id="buttons">
                    <div id="button-box-vital">
                        <button type="submit" class="btn" name="submit" id="submit">Enter</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
    </div>

    <!----Camera--->
    <div class="pop-up" id="popupCamera">
        <div class="form-popup" id="myForm">

            <form class="form-container" method="post">
                <div class="pop-up-title-bar">
                    <h1>Scan Using Camera</h1>
                    <div class="close-but">
                        <a href="appointments.php"><i class="las la-times"></i></a>
                    </div>
                </div>
                <div id="qr-reader" style="width: 600px"></div>
                <div class="input-box">
                    <label for="medid"><b>Medicine ID</b></label>
                    <input type="text" placeholder="Enter MedicineID" name="medid_stock" id="medidstock" required>
                </div>
                <div id="buttons">
                    <div class="button-box">
                        <a href="appointments.php?check">
                            <button type="button" class="btn" name="enterid" id="enterid">Enter</button>
                        </a>

                    </div>
                </div>
            </form>

        </div>
    </div>
    
    <script src="./assets/js/appointment.js"></script>
    <script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
    const popupscan = document.getElementById("popupScanPatient");
    const camera = document.getElementById("popupCamera");
    const check = document.getElementById("popupCheckPatient");

    if (window.location.href.includes(".php?scan")) {
        popupScanPatient.style.display = "flex";
    }

    if (window.location.href.includes(".php?camera")) {
        popupScanPatient.style.display = "none";
        popupCamera.style.display = "flex";
    }

    if (window.location.href.includes(".php?appid")) {
        popupScanPatient.style.display = "none";
        popupCamera.style.display = "none";
        popupCheckPatient.style.display = "flex";
    }

    function onScanSuccess(decodedText, decodedResult) {
        document.getElementById("medidstock").value = decodedText;
        console.log(`Code scanned = ${decodedText}`, decodedResult);
    }

    var html5QrcodeScanner = new Html5QrcodeScanner(
        "qr-reader", {
            fps: 10,
            qrbox: 250
        });

    html5QrcodeScanner.render(onScanSuccess);
    </script>
</body>

</html>