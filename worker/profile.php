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
 $mname = $info['MiddleName'];
 $lname = $info['LastName'];
 $sex = $info['Sex'];
 $birthday = $info['Birthday'];
 $address = $info['Address'];
 $contactnumber = $info['ContactNumber'];
 $username = $info['Username'];
 $password = $info['Password'];

 if(isset($_POST['update'])){
    $updatecontact = $_POST['contactnumber'];
    $updatepass = $_POST['password'];

    $update = "update usertbl set ContactNumber='$updatecontact', Password='$updatepass' where UserID='$userid'";
    $run_query = mysqli_query($conn, $update);
    header("location: profile.php");
 }
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/profile.css?v=<?php echo time(); ?>">
    <title>Profile</title>
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
                <a href="history.php">
                    <span class="las la-history"></span>
                    <h3>History</h3>
                </a>
                <a href="profile.php" class="active">
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
                    <h1>Profile</h1>
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
                            <img class="pfp" src="./assets/images/profile.png">
                        </div>
                    </div>
                </div>
            </div>

            <div class="main-body">
                <div class="card1">
                    <div class="card">
                        <div class="left-container">
                          <img class="imgcard" src="./assets/images/profile.png" alt="Profile Image">
                          <h2 id="main_deets"><?php echo $fname . " " . $mname . " " . $lname?></h2>
                          <p><?php echo $usertype?></p>
                        </div>
                        <div class="right-container">
                          <h2 id="profile_deets">Profile Details</h2>
                          <table>
                              <tr>
                                  <td>Name :</td>
                                  <td><?php echo $fname . " " . $mname . " " . $lname?></td>
                                </tr>
                            <tr>
                              <td>Sex :</td>
                              <td><?php echo $sex?></td>
                            </tr>
                            <tr>
                                <td>Birthday :</td>
                                <td><?php echo $birthday ?></td>
                              </tr>
                            <tr>
                              <td>Address :</td>
                              <td><?php echo $address?></td>
                            </tr>
                            <tr>
                              <td>Contact Number :</td>
                              <td>0<?php echo $contactnumber?></td>
                            </tr>
                            <tr>
                                <td>Username :</td>
                                <td><?php echo $username?></td>
                              </tr>
                            <tr>
                              <td>Password :</td>
                              <td><?php echo $password?></td>
                            </tr>
                          </table>
                          <div class="button-box">
                            <a href="profile.php?update">
                                <div class="button-box">
                                    <button type="button" class="btn" name="update-profile" id="update-profile">Edit Profile</button>
                                </div>
                            </a>
                        </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
        </main>
        <!-- End of Main Content -->

        <div class="pop-up" id="popupForm">
        <div class="form-popup" id="myForm">
            <form class="form-container" method="post">
                <h1>update Profile</h1>
                <div class="row">
                    <div class="input-box">
                        <label for="contactnumber"><b>Contact Number</b></label>
                        <input type="text" placeholder="Enter Contact Number" name="contactnumber" id="contactnumber" value="<?php echo $contactnumber?>">
                    </div>
                    <div class="input-box">
                        <label for="password"><b>Password</b></label>
                        <input type="text" placeholder="Enter Password" name="password" id="password" value="<?php echo $password?>">
                    </div>
                </div>
                    
                <div class="buttons">
                    <div class="button-box">
                        <button type="submit" class="btn" name="update" id="update">Update</button>
                    </div>
                    <div class="button-box">
                        <a href="profile.php"><button type="button" class="btn cancel">Close</button></a>
                    </div>
                </div>
            </form>
        </div>

    </div>

    <
    <script src="./assets/js/profile.js"></script>
    <script>
        const popup = document.getElementById("popupForm");

        if (window.location.href.includes("?update")){
            popup.style.display = "flex";
        }
    </script>
</body>

</html>