<?php   
 session_start();  
 include("config.php");


 $admin = "select * from usertbl where UserType='Admin'";
$admin_num = mysqli_num_rows(mysqli_query($conn, $admin));

 $patient = "select * from usertbl where UserType='Patient'";
$patient_num = mysqli_num_rows(mysqli_query($conn, $patient));

 $worker = "select * from usertbl where UserType='Worker'";
 $worker_num = mysqli_num_rows(mysqli_query($conn, $worker));

 $medicine = "select * from medicinetbl";
 $medicine_num = mysqli_num_rows(mysqli_query($conn, $medicine));

 $antibiotic = "select * from medicinetbl where Category='Antibiotic'";
 $antibiotic_num = mysqli_num_rows(mysqli_query($conn, $antibiotic));

 $angio = "select * from medicinetbl where Category='Angiotensin Receptor Blocker'";
 $angio_num = mysqli_num_rows(mysqli_query($conn, $angio));

 $diuretic = "select * from medicinetbl where Category='Diuretic'";
 $diuretic_num = mysqli_num_rows(mysqli_query($conn, $diuretic));

 $vitamins = "select * from medicinetbl where Category='Vitamins'";
 $vitamins_num = mysqli_num_rows(mysqli_query($conn, $vitamins));

 $antihistamines = "select * from medicinetbl where Category='Antihistamines'";
 $antihistamines_num = mysqli_num_rows(mysqli_query($conn, $antihistamines));

 $noStock = "select * from medicinetbl where Quantity='0'";
 $noStock_num = mysqli_num_rows(mysqli_query($conn, $noStock));

 $expMed = "select * from `medicinetbl` where ExpiryDate<='2023-12-07'";
 $expMed_num = mysqli_num_rows(mysqli_query( $conn, $expMed));

 $sambat = "select * from usertbl where Address='Sambat'";
 $sambat_num = mysqli_num_rows(mysqli_query($conn, $sambat));

 $villaTeresa = "select * from usertbl where Address='Villa Teresa Subd.'";
 $villaTeresa_num = mysqli_num_rows(mysqli_query($conn, $villaTeresa));

 $camella = "select * from usertbl where Address='Camella Homes'";
 $camella_num = mysqli_num_rows(mysqli_query($conn, $camella));

 $cristina = "select * from usertbl where Address='Cristina Homes'";
 $cristina_num = mysqli_num_rows(mysqli_query($conn, $cristina));

 $jan = "select * from `appointmenttbl` where Date like '%%%%-01-%%'";
 $jan_num = mysqli_num_rows(mysqli_query($conn, $jan));

 $feb = "select * from `appointmenttbl` where Date like '%%%%-02-%%'";
 $feb_num = mysqli_num_rows(mysqli_query($conn, $feb));

 $mar = "select * from `appointmenttbl` where Date like '%%%%-03-%%'";
 $mar_num = mysqli_num_rows(mysqli_query($conn, $mar));

 $apr = "select * from `appointmenttbl` where Date like '%%%%-04-%%'";
 $apr_num = mysqli_num_rows(mysqli_query($conn, $apr));

 $may = "select * from `appointmenttbl` where Date like '%%%%-05-%%'";
 $may_num = mysqli_num_rows(mysqli_query($conn, $may));

 $june = "select * from `appointmenttbl` where Date like '%%%%-06-%%'";
 $june_num = mysqli_num_rows(mysqli_query($conn, $june));

 $july = "select * from `appointmenttbl` where Date like '%%%%-07-%%'";
 $july_num = mysqli_num_rows(mysqli_query($conn, $july));

 $aug = "select * from `appointmenttbl` where Date like '%%%%-08-%%'";
 $aug_num = mysqli_num_rows(mysqli_query($conn, $aug));

 $sept = "select * from `appointmenttbl` where Date like '%%%%-09-%%'";
 $sept_num = mysqli_num_rows(mysqli_query($conn, $sept));

 $oct = "select * from `appointmenttbl` where Date like '%%%%-10-%%'";
 $oct_num = mysqli_num_rows(mysqli_query($conn, $oct));

 $nov = "select * from `appointmenttbl` where Date like '%%%%-11-%%'";
 $nov_num = mysqli_num_rows(mysqli_query($conn, $may));

 $dec = "select * from `appointmenttbl` where Date like '%%%%-12-%%'";
 $dec_num = mysqli_num_rows(mysqli_query($conn, $dec));


 
 if (!isset($_SESSION['USER_ID'])) {  
      header("location:login.php");  
      die();  
 }  

 $userdataPiePoints = array( 
	array("label"=>"Admin", "y"=>$admin_num),
	array("label"=>"Patient", "y"=>$patient_num),
    array("label"=>"Worker", "y"=>$worker_num),
 );

$medicinedataPiePoints = array( 
	array("label"=>"Antibiotic", "y"=>$antibiotic_num),
	array("label"=>"Angiotensin Receptor Blocker", "y"=>$vitamins_num),
    array("label"=>"Diuretic", "y"=>$antibiotic_num),
	array("label"=>"Vitamins", "y"=>$vitamins_num),
    array("label"=>"Antihistamines", "y"=>$antibiotic_num),
);

$addressdataPiePoints = array( 
	array("label"=>"Camella Homes", "y"=>$camella_num),
	array("label"=>"Sambat", "y"=>$sambat_num),
    array("label"=>"Cristina Homes", "y"=>$cristina_num),
	array("label"=>"Villa Teresa Subd.", "y"=>$villaTeresa_num),

);

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/admin_home.css?v=<?php echo time(); ?>">
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
                <a href="admin_home.php" class="active">
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
                            <p>Hey, <b><?php echo $_SESSION['USER_FNAME'] ?></b></p>
                            <small class="text-muted"><?php echo $_SESSION['USER_TYPE'] ?></small>
                        </div>
                        <div class="profile-photo">
                            <img src="./assets/images/profile.png">
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="analyse">
                    <div class="sales">
                        <div class="status">
                            <div class="info">
                                <h3>Registered Patients</h3>
                                <h1><?php echo $patient_num;?></h1>
                            </div>
                            <div class="progresss">
                                <i class="las la-users"></i>
                            </div>
                        </div>
                    </div>
                    <div class="sales">
                        <div class="status">
                            <div class="info">
                                <h3>Registered Workers</h3>
                                <h1><?php echo $worker_num;?></h1>
                            </div>
                            <div class="progresss">
                                <i class="las la-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="visits">
                        <div class="status">
                            <div class="info">
                                <h3>Number of Medicines</h3>
                                <h1><?php echo $medicine_num;?></h1>
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
                                <h1><?php echo $noStock_num;?></h1>
                            </div>
                            <div class="progresss">
                                <i class="las la-times-circle"></i>
                            </div>
                        </div>
                    </div>

                </div>
                <br>
                <h1>Analytics</h1>
                <div class="charts">
                    <div class="pie=chart" id="userchartContainer"></div>
                    <div class="pie=chart" id="medicinechartContainer"></div>
                    <div class="pie=chart" id="addresschartContainer"></div>
                    
                </div>
                <div id="chartContainer" style="height: 370px; width: 100%; margin-top:2rem;"></div>
                
            </div>

            <!-- End of Analyses -->

            <!-- New Users Section -->

            <!-- Recent Orders Table -->


            <!-- End of Recent Orders -->

        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->
        <!-- End of Nav -->



    </div>


    </div>

    <script>
    window.onload = function() {

        CanvasJS.addColorSet("PieChart", ["#157F5C", "#1DB280", "#26E5A5", ]);
        CanvasJS.addColorSet("PieChart2", ["#157f5c", "#19986e", "#1db280", "#22cb92", "#26E5A5", ]);
        CanvasJS.addColorSet("ColumnChart", ["#003221", "#006543", "#009865", "#00cb87", "#01fda9", "#3dffbe", "#4affc2", "#33feba", "#66fecb", "#99fedc", "#ccfeed", "#ffffff",]);


        var usersPiechart = new CanvasJS.Chart("userchartContainer", {
            animationEnabled: true, 
            colorSet: "PieChart",
            title: {
                text: "Number of Registered Users"
            },
            subtitles: [{
                text: ""
            }],
            data: [{
                type: "pie",
                yValueFormatString: "#,##\"\"",
                indexLabel: "{label} ({y})",
                dataPoints: <?php echo json_encode($userdataPiePoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        usersPiechart.render();

        var medicinePiechart = new CanvasJS.Chart("medicinechartContainer", {
            animationEnabled: true,
            colorSet: "PieChart2",
            title: {
                text: "Number of Medicine"
            },
            subtitles: [{
                text: ""
            }],
            data: [{
                type: "pie",
                yValueFormatString: "#,##\"\"",
                indexLabel: "{label} ({y})",
                dataPoints: <?php echo json_encode($medicinedataPiePoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        medicinePiechart.render();

        var medicineColumnchart = new CanvasJS.Chart("addresschartContainer", {
            animationEnabled: true,
            colorSet: "PieChart2",
            title: {
                text: "Addresses of Users"
            },
            subtitles: [{
                text: ""
            }],
            data: [{
                type: "pie",
                yValueFormatString: "#,##\"\"",
                indexLabel: "{label} ({y})",
                dataPoints: <?php echo json_encode($addressdataPiePoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        medicineColumnchart.render();
        
        var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	colorSet: "ColumnChart", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Number of Appointments per Month"
	},
	axisY: {
		title: "Total"
	},
	data: [{        
		type: "column",  
		
		dataPoints: [      
			{ y: <?php echo $jan_num?>, label: "January" },
			{ y: <?php echo $feb_num?>,  label: "February" },
			{ y: <?php echo $mar_num?>,  label: "March" },
			{ y: <?php echo $apr_num?>,  label: "April" },
			{ y: <?php echo $may_num?>,  label: "May" },
			{ y: <?php echo $june_num?>, label: "June" },
			{ y: <?php echo $july_num?>,  label: "July" },
			{ y: <?php echo $aug_num?>,  label: "August" },
            { y: <?php echo $sept_num?>,  label: "September" },
			{ y: <?php echo $oct_num?>, label: "October" },
			{ y: <?php echo $nov_num?>,  label: "November" },
			{ y: <?php echo $dec_num?>,  label: "December" }
		]
	}]
});
chart.render();
        

    }
    </script>

    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <script src="./assets/js/admin_home.js"></script>
</body>

</html>