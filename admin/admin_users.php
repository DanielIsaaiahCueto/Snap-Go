<?php   
 session_start();
include("config.php");
 $editState = false;
 include("updateuser.php");
 if (!isset($_SESSION['USER_ID'])) {  
    header("location:login.php");  
    die();  
}

 $query="select * from usertbl order by UserID desc limit 1";
 $result = mysqli_query($conn, $query);
 $row = mysqli_fetch_array($result);
 $lastid = $row['UserID'];

 if ($lastid == '') {
    $userid = "USER01";
 }else{
    $userid = substr($lastid,4);
    $userid = intval($userid);
    if ($userid < 9) {
        $userid = "USER0" . ($userid + 1);
    }else{
        $userid = "USER" . ($userid + 1);
    }
    
 }

 if (isset($_POST['add'])) {
    $usertype = $_POST['usertype'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $sex = $_POST["sex"];
    $birthday = $_POST["birthday"];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $username = $_POST["username"];
    $password = $_POST['password'];

    $insert = "insert into `usertbl`(UserID, Usertype,FirstName,MiddleName,LastName,Sex,Birthday,Address,ContactNumber,Username,Password) values('$userid','$usertype','$fname','$mname','$lname','$sex','$birthday','$address','$contact','$username','$password')";
    $result = mysqli_query($conn,$insert);

    

    if ($result) {
        header("location:admin_users.php");
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
    <link rel="stylesheet" href="./assets/css/admin_users.css?v=<?php echo time(); ?>">
    <title>Users</title>
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
                <a href="admin_users.php" class="active">
                    <span class="las la-user"></span>
                    <h3>Users</h3>
                </a>
                <a href="admin_supplies.php">
                    <span class="las la-clipboard-list"></span>
                    <h3>Manage Supplies</h3>
                </a>
                <a href="admin_appointments.php">
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
                    <h1>Users</h1>
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
                        <p>Hey, <b><?php echo $_SESSION['USER_FNAME'] ?></b></p>
                            <small class="text-muted"><?php echo $_SESSION['USER_TYPE'] ?></small>
                        </div>
                        <div class="profile-photo">
                            <img src="./assets/images/profile.png">
                        </div>
                    </div>
                </div>
            </div>

            <div class="main-body" style="overflow-y:auto;">
                <div class="register-header">
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
                    <a href="admin_users.php?add">
                        <div class="add-user">
                            <div>
                                <span class="las la-plus"></span>
                                <h3>Add User</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Profile</th>
                            <th>User ID</th>
                            <th>User Type</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Sex</th>
                            <th>Birthday</th>
                            <th>Address</th>
                            <th>Contact Number</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                           
                           $select = "select * from usertbl order by UserID";
                           $result = mysqli_query($conn,$select);
                          
                           if ($result) {
                              while ($row = mysqli_fetch_assoc($result)) {
                                
                                  $profile = $row['Profile'];
                                  $id = $row['UserID'];
                                  $usertype = $row['UserType'];
                                  $fname = $row['FirstName'];
                                  $mname = $row['MiddleName'];
                                  $lname = $row['LastName'];
                                  $sex = $row['Sex'];
                                  $birthday = $row['Birthday'];
                                  $address = $row['Address'];
                                  $contact = $row['ContactNumber'];
                                  $username = $row['Username'];
                                  $password = $row['Password'];
                                                                  
                                  ?>

                        <tr>
                            <th scope="row"><img src="./assets/images/profile.png"></th>
                            <td><?php echo $id ?></td>
                            <td><?php echo $usertype ?></td>
                            <td><?php echo $fname ?></td>
                            <td><?php echo $mname ?></td>
                            <td><?php echo $lname ?></td>
                            <td><?php echo $sex ?></td>
                            <td><?php echo $birthday ?></td>
                            <td><?php echo $address ?></td>
                            <td><?php echo $contact ?></td>
                            <td><?php echo $username ?></td>
                            <td><?php echo $password ?></td>
                            <td><a href="admin_users.php?updateid=<?php echo $id ?>"><i class="las la-pen"></i></a>
                                <a href="deleteuser.php?deleteid=<?php echo $id ?>"><i class="las la-trash"></i></a>
                            </td>

                        </tr>
                        <?php   }
                           }?>
                    </tbody>
                </table>
                </div>
                

        </main>
    </div>

    <div class="pop-up" id="popupForm">
        <div class="form-popup" id="myForm">
            <form class="form-container" method="post">
                <h1>Add User</h1>
                <div class="user-type-radio">
                    <div class="user-type-options">
                        <h4>User Type</h4>
                        <div class="user">
                            <input type="radio" name="usertype" value="Admin" id="admin">
                            <label for="admin">Admin</label>
                        </div>
                        <div class="user">
                            <input type="radio" name="usertype" value="Worker" id="worker">
                            <label for="worker">Worker</label>
                        </div>
                        <div class="user">
                            <input type="radio" name="usertype" value="Patient" id="patient">
                            <label for="patient">Patient</label>
                        </div>
                    </div>
                </div>
                
                <div class="ord-row">
                    <div class="input-box">
                        <label for="fname"><b>First Name</b></label>
                        <input type="text" placeholder="Enter First Name" name="fname" id="fname" required value="<?php echo ($editState == true ?  $editfname:'')
                        ?>">
                    </div>
                    <div class="input-box">
                        <label for="mname"><b>Middle Name</b></label>
                        <input type="text" placeholder="Enter Middle Name" name="mname" id="mname" value="<?php echo ($editState == true ?  $editmname:'')
                        ?>">
                    </div>
                    <div class="input-box">
                        <label for="lname"><b>Last Name</b></label>
                        <input type="text" placeholder="Enter Last Name" name="lname" id="lname" required value="<?php echo ($editState == true ?  $editlname:'')
                        ?>">
                    </div>
                </div>
                
                <div class="row">
                    <div class="sex-box">
                        <div class="sex-options">
                        <h4>Gender</h4>
                            <div class="sex">
                                <input type="radio" name="sex" value="Male" id="male">
                                <label for="male">Male</label>
                            </div>
                            <div class="sex">
                                <input type="radio" name="sex" value="Female" id="female">
                                <label for="female">Female</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="input-box">
                        <label for="birthday"><b>Birthday</b></label><br>
                        <input type="date" name="birthday" id="birthday" required value="<?php echo ($editState == true ? $editbirthday:'')
                        ?>">
                    </div>
                    
                    <div class="input-box">
                        <label for="address"><b>Address</b></label>
                        <input type="text" placeholder="Enter Address" name="address" id="address" required value="<?php echo ($editState == true ? $editaddress:'')
                        ?>">
                    </div>
                </div>

                <div class="ord-row">
                    <div class="input-box">
                        <label for="contact"><b>Contact Number</b></label>
                        <input type="tel" placeholder="Enter Contact Number" name="contact" id="contact" required value="<?php echo ($editState == true ? $editusername:'')
                        ?>">
                    </div>    
                    
                    <div class="input-box">
                        <label for="username"><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" name="username" id="username" required value="<?php echo ($editState == true ? $editusername:'')
                        ?>">
                    </div>

                    <div class="input-box">
                        <label for="password"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="password" id="password" required value="<?php echo ($editState == true ? $editpassword:'')
                        ?>">
                    </div>
                </div>

                <div class="buttons">
                    <div class="button-box">
                        <button type="submit" class="btn" name="add" id="add">Add</button>
                    </div>
                    <div class="button-box">
                    <a href="admin_users.php"><button type="button" class="btn cancel">Close</button></a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="pop-up" id="popupUpdateForm">
        <div class="form-popup" id="myForm">
            <form class="form-container" method="post">
                <h1>Update User</h1>
                <div class="user-type-radio">
                    <div class="user-type-options">
                        <h4>User Type</h4>
                        <div class="user">
                            <input type="radio" name="usertype" value="Admin" id="admin" <?php echo($editusertype=='Admin') ? " checked " : "";?>>
                            <label for="admin">Admin</label>
                        </div>
                        <div class="user">
                            <input type="radio" name="usertype" value="Worker" id="worker" <?php echo($editusertype=='Worker') ? " checked " : "";?>>
                            <label for="worker">Worker</label>
                        </div>
                        <div class="user">
                            <input type="radio" name="usertype" value="Patient" id="patient" <?php echo($editusertype=='Patient') ? " checked " : "";?>>
                            <label for="patient">Patient</label>
                        </div>
                    </div>
                </div>
                
                <div class="ord-row">
                    <div class="input-box">
                        <label for="fname"><b>First Name</b></label>
                        <input type="text" placeholder="Enter First Name" name="fname" id="fname" required value="<?php echo ($editState == true ?  $editfname:'')
                        ?>">
                    </div>
                    <div class="input-box">
                        <label for="mname"><b>Middle Name</b></label>
                        <input type="text" placeholder="Enter Middle Name" name="mname" id="mname" value="<?php echo ($editState == true ?  $editmname:'')
                        ?>">
                    </div>
                    <div class="input-box">
                        <label for="lname"><b>Last Name</b></label>
                        <input type="text" placeholder="Enter Last Name" name="lname" id="lname" required value="<?php echo ($editState == true ?  $editlname:'')
                        ?>">
                    </div>
                </div>
                
                <div class="row">
                    <div class="sex-box">
                        <div class="sex-options">
                        <h4>Gender</h4>
                            <div class="sex">
                                <input type="radio" name="sex" value="Male" id="male" <?php echo($editsex=='Male') ? " checked " : "";?>>
                                <label for="male">Male</label>
                            </div>
                            <div class="sex">
                                <input type="radio" name="sex" value="Female" id="female" <?php echo($editsex=='Female') ? " checked " : "";?>>
                                <label for="female">Female</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="input-box">
                        <label for="birthday"><b>Birthday</b></label><br>
                        <input type="date" name="birthday" id="birthday" required value="<?php echo ($editState == true ? $editbirthday:'')
                        ?>">
                    </div>
                    
                    <div class="input-box">
                        <label for="address"><b>Address</b></label>
                        <input type="text" placeholder="Enter Address" name="address" id="address" required value="<?php echo ($editState == true ? $editaddress:'')
                        ?>">
                    </div>
                </div>

                <div class="ord-row">
                    <div class="input-box">
                        <label for="contact"><b>Contact Number</b></label>
                        <input type="tel" placeholder="Enter Contact Number" name="contact" id="contact" required value="<?php echo ($editState == true ? $editusername:'')
                        ?>">
                    </div>    
                    
                    <div class="input-box">
                        <label for="username"><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" name="username" id="username" required value="<?php echo ($editState == true ? $editusername:'')
                        ?>">
                    </div>

                    <div class="input-box">
                        <label for="password"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="password" id="password" required value="<?php echo ($editState == true ? $editpassword:'')
                        ?>">
                    </div>
                </div>

                <div class="buttons">
                    <div class="button-box">
                        <button type="submit" class="btn" name="update" id="update">Update</button>
                    </div>
                    <div class="button-box">
                    <a href="admin_users.php"><button type="button" class="btn cancel">Close</button></a>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="./assets/js/admin_users.js"></script>
    <script>
    const popup = document.getElementById("popupForm");
    const update = document.getElementById("popupUpdateForm");
    const addBtn = document.getElementById("add");

    if (window.location.href.includes(".php?add")) {
        popup.style.display = "flex";
    }

    if (window.location.href.includes(".php?updateid")) {
        update.style.display = "flex";
    }

    function closeAddForm() {
        popup.style.display = "none";
    }


    function closeUpdateForm() {
        popup.style.display = "none";
    }
    </script>


</body>

</html>