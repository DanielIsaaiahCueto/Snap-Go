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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/history.css?v=<?php echo time(); ?>">
    <title>History</title>
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
                <a href="appointments.php">
                    <span class="las la-calendar"></span>
                    <h3>Appointments</h3>
                </a>
                <a href="history.php" class="active">
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
                    <h1>History</h1>
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
            <div class="main-body">
                <div class="history-header">
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
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>Record No.</th>
                            <th>Purpose</th>
                            <th>Blood Pressure</th>
                            <th>Temperature</th>
                            <th>Recommendation</th>
                            <th>Patient Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                           $fname = $_SESSION["USER_FNAME"];
                           $lname = $_SESSION["USER_LNAME"];
                           $select = "select * from recordtbl where WorkerFirstName='$fname' and WorkerLastName='$lname'";
                           $result = mysqli_query($conn,$select);
                          
                           if ($result) {
                              while ($row = mysqli_fetch_assoc($result)) {
                                
                                  $id = $row['RecordNo'];
                                  $progname = $row['Purpose'];
                                  $bp = $row['BloodPressure'];
                                  $temp = $row['Temperature'];
                                  $recommend = $row['Recommendation'];
                                  $fname = $row['FirstName'];
                                  $lname = $row['LastName'];

                                  ?>

                        <tr>

                            <th scope="row"><?php echo $id ?></th>

                            <td><?php echo $progname ?></td>
                            <td><?php echo $bp ?></td>
                            <td><?php echo $temp ?></td>
                            <td><?php echo $recommend ?></td>
                            <td><?php echo $fname . ' ' . $lname ?></td>

                        </tr>
                        <?php   }
                           }?>
                    </tbody>
                </table>
            </div>

        </main>
        <!-- End of Main Content -->

    </div>

    <script src="./assets/js/history.js"></script>
</body>

</html>