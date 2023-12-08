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
 $fname = $info['FirstName']; 

 $patient = "select * from usertbl where UserType='Patient'";
$patient_num = mysqli_num_rows(mysqli_query($conn, $patient));

 $medicine = "select * from medicinetbl";
 $medicine_num = mysqli_num_rows(mysqli_query($conn, $medicine));

 $expMed = "select * from `medicinetbl` where ExpiryDate<='2023-12-07'";
 $expMed_num = mysqli_num_rows(mysqli_query( $conn, $expMed));
 
 $noStock = "select * from medicinetbl where Quantity='0'";
 $noStock_num = mysqli_num_rows(mysqli_query($conn, $noStock));
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/dashboard.css?v=<?php echo time(); ?>">
    <title>Home</title>
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
                <a href="dashboard.php" class="active">
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
                <a href="appointments.php">
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
                    <h1>Dashboard</h1>
                </div>
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
                            <p>Hey, <b><?php echo $fname ?></b></p>
                            <small class="text-muted"><?php echo $usertype ?></small>
                        </div>
                        <div class="profile-photo">
                            <img src="./assets/images/profile.png">
                        </div>
                    </div>
                </div>
            </div>
            <div class="analyse">
                <div class="sales">
                    <div class="status">
                        <div class="info">
                            <h3>Registered Patients</h3>
                            <h1><?php echo $patient_num?></h1>
                        </div>
                        <div class="progresss">
                            <i class="las la-users"></i>
                        </div>
                    </div>
                </div>
                <div class="visits">
                    <div class="status">
                        <div class="info">
                            <h3>Number of Medicines</h3>
                            <h1><?php echo $medicine_num?></h1>
                        </div>
                        <div class="progresss">
                            <i class="las la-medkit"></i>
                        </div>
                    </div>
                </div>
                <div class="searches">
                    <div class="status">
                        <div class="info">
                            <h3>Expired</h3>
                            <h1><?php echo $expMed_num?></h1>
                        </div>
                        <div class="progresss">
                            <i class="las la-exclamation-triangle"></i>
                        </div>
                    </div>
                </div>
                <div class="searches">
                    <div class="status">
                        <div class="info">
                            <h3>No Stocks</h3>
                            <h1><?php echo $noStock_num?></h1>
                        </div>
                        <div class="progresss">
                            <i class="las la-times-circle"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Analyses -->

            <!-- New Users Section -->

            <!-- Recent Orders Table -->
            <div class="recent-orders">
                <h2>Upcoming Appointments</h2>
                <div style="max-height:45rem;overflow-y:scroll;">
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
                                    $status = $row['Status']                                
                                    ?>

                        <tr>

                            <th scope="row"><?php echo $id ?></th>

                            <td><?php echo $progname ?></td>
                            <td><?php echo $date ?></td>
                            <td><?php echo $fname . ' ' . $lname ?></td>
                        </tr>
                        <?php   }
                             }
                        }else{
                            ?>
                        <tr>
                            <td></td>
                            <td>No Available Data</td>
                        </tr>
                        <?php
                            
                            
                        }?>


                    </tbody>
                </table>
                </div>
                
                <a href="appointments.php">Show All</a>
            </div>
            <!-- End of Recent Orders -->

        </main>
        <!-- End of Main Content -->

    </div>


    <script src="./assets/js/dash-board.js"></script>
</body>

</html>