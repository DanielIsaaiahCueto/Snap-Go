<?php

session_start();
include("config.php");
if (!isset($_SESSION['USER_ID'])) {  
   header("location:login.php");  
   die();  
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
    <link rel="stylesheet" href="./assets/css/admin_appointments.css?v=<?php echo time(); ?>">
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
                <a href="admin_home.php">
                    <span class="las la-home"></span>
                    <h3>Home</h3>
                </a>
                <a href="admin_users.php">
                    <span class="las la-user"></span>
                    <h3>Users</h3>
                </a>
                <a href="admin_supplies.php">
                    <span class="las la-clipboard-list"></span>
                    <h3>Manage Supplies</h3>
                </a>
                <a href="admin_appointments.php" class="active">
                    <span class="las la-calendar"></span>
                    <h3>Appointments</h3>
                </a>
                <a href="admin_patient-record.php">
                    <span class="las la-file-medical-alt"></span>
                    <h3>Patient Records</h3>
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
                <!----<div class="add-supplies">
                    <div>
                        <span class="las la-plus"></span>
                        <h3>Add Supplies</h3>
                    </div>
                </div>---->
            </div>

            <div class="appointments-list">
                <table>
                    <thead>
                        <th>Appointment ID</th>
                        <th>Program Name</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>QR Code</th>

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
                                    $qrcode = $row['QRCode']                                
                                    ?>

                        <tr>

                            <th scope="row"><?php echo $id ?></th>

                            <td><?php echo $progname ?></td>
                            <td><?php echo $date ?></td>
                            <td><?php echo $fname . ' ' . $lname ?></td>
                            <td style="align-items:center;"><img src="assets/images/appointments_qrcode/<?php echo $qrcode?>" alt="qr-code" style="height:100px;width:100px;display: block;margin-left: auto;margin-right: auto;"></td>
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
                        <p>Hey, <b><?php echo $_SESSION['USER_FNAME'] ?></b></p>
                        <small class="text-muted"><?php echo $_SESSION['USER_TYPE'] ?></small>
                    </div>
                    <div class="profile-photo">
                        <img src="./assets/images/profile.png">
                    </div>
                </div>
            </div>
            <div class="cont">
                <div style="max-height:27rem;overflow-y:scroll;overflow-x:hidden;">
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
                                <td><a href="approve.php?appointmentid=<?php echo $id ?>"><i
                                            class="las la-check"></i></a>
                                            </td>
                                    <td><a href="reject.php?appointmentid=<?php echo $id ?>"><i
                                            class="las la-times"></i></a>
                                </td>
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

    <script src="./assets/js/admin_appointment.js"></script>
</body>

</html>