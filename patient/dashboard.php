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

    $appointment = "select * from appointmenttbl where FirstName='$fname'";
    $appointment_num = mysqli_num_rows(mysqli_query($conn, $appointment));

    $record = "select * from recordtbl where FirstName='$fname'";
    $record_num = mysqli_num_rows(mysqli_query($conn, $record));
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/dashboard.css">
    <title>Home</title>
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
                <a href="dashboard.php" class="active">
                    <span class="las la-home"></span>
                    <h3>Home</h3>
                </a>
                <a href="appointments.php">
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
                <div class="dash">
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
            <!-- Carousel -->
            <div class="carousells">
                <div class="mySlides fade">
                    <img src="./assets/images/Aids.png" alt="" width="300" height="100%">
                </div>
                <div class="mySlides fade">
                    <img src="./assets/images/RHU.png" alt="" width="300" height="100%">
                </div>
                <div class="mySlides fade">
                    <img src="./assets/images/Pinas.png" alt="" width="300" height="100%">
                </div>

            </div>
            <!-- End of Carousel -->
            <!-- Appointments ETC. -->
            <div class="analyse">
                <div class="sales">
                    <div class="status">
                        <div>
                            <h3>Appointments</h3>
                            <h1><?php echo $appointment_num?></h1>
                        </div>
                        <div class="progresss">
                            <i class="las la-user"></i>
                        </div>

                    </div>
                </div>
                <div class="visits">
                    <div class="status">
                        <div>
                            <h3>Medical History</h3>
                            <h1><?php echo $record_num?></h1>
                        </div>
                        <div class="progresss">
                            <i class="las la-user-nurse"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Appointments ETC. -->

        </main>
        <!-- End of Main Content -->


    </div>

    <script src="./assets/js/dashboard.js"></script>
    <script src="./assets/js/caro.js"></script>

</body>

</html>