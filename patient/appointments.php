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

 $query="select * from appointmenttbl order by AppointmentID desc limit 1";
 $result = mysqli_query($conn, $query);
 $row = mysqli_fetch_array($result);
 $lastid = $row['AppointmentID'];

 if ($lastid == '') {
    $appid = "APP1";
 }else{
    $appid = substr($lastid,3);
    $appid = intval($appid);
    $appid = "APP" . ($appid + 1);
 }

 if (isset($_POST['book'])) {
    $progname = $_POST['program'];
    $date = $_POST['date'];
    $fname = $_SESSION['USER_FNAME'];
    $lname = $_SESSION['USER_LNAME'];

    $insert = "insert into `appointmenttbl`(AppointmentID,ProgramName,Date,FirstName,LastName,Status) values('$appid','$progname','$date','$fname','$lname','Pending')";
    $result = mysqli_query($conn,$insert);


    if ($result) {
        
        header("location:appointments.php");
    } else {
        die(mysqli_error($conn));
    }
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
    <link rel="stylesheet" href="./assets/css/appointments.css?v=<?php echo time(); ?>">
    <title>Appointments</title>
    <link rel="icon" type="image/x-icon" href="./assets/images/logo.png">
</head>

<body>
    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="./assets/images/logo.png">
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
                <a href="appointments.php" class="active">
                    <span class="las la-calendar"></span>
                    <h3>Appointments</h3>
                </a>
                <a href="patientrecord.php">
                    <span class="las la-history"></span>
                    <h3>Patient Record</h3>
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
                <a href="appointments.php?appointment">
                    <div class="add-supplies">
                        <div>
                            <span class="las la-plus"></span>
                            <h3>Reserve</h3>
                        </div>
                    </div>
                </a>
            </div>

            <div class="mng-supplies">
                <table>
                    <thead>
                        <tr>
                            <th>Appointment ID</th>
                            <th>Program Name</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Qr Code</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                           
                           $select = "select * from appointmenttbl where Status='Approved' and FirstName='$userfname'";
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
                                    $qrcode = $row['QRCode']                                
                                    ?>

                        <tr>

                            <th scope="row"><?php echo $id ?></th>

                            <td><?php echo $progname ?></td>
                            <td><?php echo $date ?></td>
                            <td><?php echo $fname . ' ' . $lname ?></td>
                            <td><img src="../admin/assets/images/appointments_qrcode/<?php echo $qrcode?>" alt="qr-code" style="height:100px;width:100px;display: block;margin-left: auto;margin-right: auto;"></td>
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
                <div>
                <table>
                            <tr>
                                <thead>
                                    <th><i class="las la-clock"></i></i>Pending</th>
                                </thead>
                            </tr>
                            <tbody>
                                <?php
                           
                           $select = "select * from appointmenttbl where Status='Pending' and FirstName='$userfname'";
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
                <div>
                <table>
                            <tr>
                                <thead>
                                    <th><i class="las la-times"></i></i>Rejected</th>
                                </thead>
                            </tr>
                            <tbody>
                                <?php
                           
                           $select = "select * from appointmenttbl where Status='Rejected' and FirstName='$userfname'";
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
            </div>
        </div>
    </div>

    <div class="pop-up" id="popupAppointmentForm">
        <div class="form-popup" id="myForm">
            <form class="form-container" method="post">
                <h1>Appointment</h1>
                <div class="row">
                    <div class="input-box">
                        <label for="date"><b>Date</b></label>
                        <input type="date" placeholder="Enter Date" name="date" id="date" required value="<?php echo ($editState == true ?  $editfname:'')
                            ?>">
                    </div>
                    <div class="input-box">
                        <label for="program"><b>Program</b></label>
                        <select name="program" id="program" placeholder="">
                            <option></option>
                            <option>Vaccine</option>
                            <option>Consultation</option>
                        </select>
                    </div>
                </div>

                <div class="buttons">
                    <div class="button-box">
                        <button type="submit" class="btn" name="book" id="book">Book</button>
                    </div>
                    <div class="button-box">
                        <a href="appointments.php"><button type="button" class="btn cancel">Close</button></a>
                    </div>
                </div>

            </form>
        </div>
    </div>



    <script src="./assets/js/appointments.js"></script>
    <script>
    const appointment = document.getElementById("popupAppointmentForm");

    if (window.location.href.includes(".php?appointment")) {
        appointment.style.display = "flex";
    }
    </script>
</body>

</html>