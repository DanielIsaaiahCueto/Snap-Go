<?php

session_start();
include("config.php");
$editState = false;
include("qrcode.php");
require_once 'phpqrcode/qrlib.php';
include("managestock.php");
include("addmedicine.php");
include("updatemedicine.php");


if (!isset($_SESSION['USER_ID'])) {  
   header("location:login.php");  
   die();  
}

$query="select * from medicinetbl order by MedicineID desc limit 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $lastID = $row['MedicineID'];
   
   if ($lastID == '') {
       $med_id = "MED1";
    }else{
       $med_id = substr($lastID, 3);
       $med_id = intval($med_id);
        if ($med_id < 9) {
            $med_id = "MED0" . ($med_id + 1);
        }else{
            $med_id = "MED" . ($med_id + 1);
        }
       }

 if(isset($_POST['enterid'])){
    $medid_stock = $_POST['medid_stock'];
    header("location:admin_supplies.php?medid=$medid_stock");
 }

 if(isset($_POST['enterdedid'])){
    $medid_stock = $_POST['medid_stock'];
    header("location:admin_supplies.php?dedmedid=$medid_stock");
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
    <link rel="stylesheet" href="./assets/css/admin_supplies.css?v=<?php echo time(); ?>">
    <title>Manage Supplies</title>
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
                <a href="admin_supplies.php" class="active">
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
                    <h1>Manage Supplies</h1>
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
                <a href="admin_supplies.php?add">
                    <div class="add-out right-space">
                        <div>
                            <span class="las la-plus"></span>
                            <h3>Add Supplies</h3>
                        </div>
                    </div>
                </a>
                <a href="admin_supplies.php?stock">
                    <div class="add-out right-space">
                        <div>
                            <span class="las la-tasks"></span>
                            <h3>Add Stock</h3>
                        </div>
                    </div>
                </a>
                <a href="admin_supplies.php?deduct">
                    <div class="add-out">
                        <div>
                            <span class="las la-tasks"></span>
                            <h3>Reduce Stock</h3>
                        </div>
                    </div>
                </a>
            </div>

            <div class="mng-supplies">
                <table>
                    <thead>
                        <tr>
                            <th>MedicineID</th>
                            <th>Medicine Info</th>
                            <th>Type</th>
                            <th>QR Code</th>
                            <th>Expiration Date</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                           
                           $select = "select * from medicinetbl";
                           $result = mysqli_query($conn,$select);
                          
                           if ($result) {
                              while ($row = mysqli_fetch_assoc($result)) {
                                
                                  $medid = $row['MedicineID'];
                                  $sku = $row['SKU'];
                                  $medname = $row['MedicineName'];
                                  $description = $row['Description'];
                                  $category = $row['Category'];
                                  $qrimage = $row['QRCode'];
                                  $expdate = $row['ExpiryDate'];
                                  $quantity = $row['Quantity'];
                                                                  
                                  ?>

                        <tr>
                            <th scope="row"><?php echo $medid ?></th>
                            <td style="padding-left:1rem;text-align:left;">
                                <h3><b>SKU:</b> <?php echo $sku ?></h3>
                                <h3><b>Name:</b> <?php echo $medname ?></h3>
                                <h3><b>Description:</b> <?php echo $description ?></h3>
                            </td>

                            <td><?php echo $category ?></td>
                            <td><?php echo "<img src = assets/images/qrcode/".$qrimage.">"; ?></td>
                            <td><?php echo $expdate ?></td>
                            <td><?php echo $quantity ?></td>
                            <td><a href="admin_supplies.php?updateid=<?php echo $medid ?>"><i class="las la-pen"></i></a>
                                <a href="deletemedicine.php?deleteid=<?php echo $medid ?>"><i
                                        class="las la-trash"></i></a>
                            </td>

                        </tr>
                        <?php   }
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
                <div>
                <table>
                        <tr>
                            <thead>
                                <th><i class="las la-capsules"></i>Expired</th>
                            </thead>
                        </tr>
                        <tbody>
                            <?php
                                $select = "select * from medicinetbl where ExpiryDate<='2023-12-07'";
                                $result = mysqli_query($conn,$select);
                                $result_num = mysqli_num_rows($result);
                                if ($result_num > 0) {
                                    if($result){
                                    while ($row = mysqli_fetch_assoc($result)) {
                                      
                                        
                                        $medname = $row['MedicineName'];
                                        
                            ?>
                            <tr>
                            
                                <td><?php echo $medname ?></td>
                            

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
                                <th><i class="las la-ban"></i>No Stocks</th>
                            </thead>
                        </tr>
                        <tbody>
                            <?php
                                $select = "select * from medicinetbl where Quantity='0'";
                                $result = mysqli_query($conn,$select);
                                $result_num = mysqli_num_rows($result);
                                if ($result_num > 0) {
                                    if($result){
                                    while ($row = mysqli_fetch_assoc($result)) {
                                      
                                        
                                        $medname = $row['MedicineName'];
                                        
                            ?>
                            <tr>
                            
                                <td><?php echo $medname ?></td>
                            

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


    <div class="pop-up" id="popupForm">
        <div class="form-popup" id="myForm">
            <form class="form-container" method="post">
                <h1>Add Supplies</h1>
                <div class="row">
                    <div class="input-box">
                        <label for="med_id"><b>Medicine ID</b></label>
                        <input type="text" placeholder="Enter MedicineID" name="med_id" id="med_id" required
                            value="<?php echo $med_id?>">
                    </div>
                    <div class="input-box">
                        <label for="sku"><b>SKU</b></label>
                        <input type="text" placeholder="Enter SKU" name="sku" id="sku" required value="<?php echo ($editState == true ?  $editfname:'')
                            ?>">
                    </div>
                    <div class="input-box">
                        <label for="category"><b>Category</b></label>
                        <select name="category" id="category" placeholder="">
                            <option></option>
                            <option>Antbiotic</option>
                            <option>Angiotensin Receptor Blocker</option>
                            <option>Diuretic</option>
                            <option>Vitamins</option>
                            <option>Antihistamines</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <label for="medeqname"><b>Medicine Name</b></label>
                        <input type="text" placeholder="Enter Medicine Name" id="medname" name="medname">
                    </div>
                </div>
                <div class="row">
                    <div class="input-box">
                        <label for="quantity"><b>Quantity</b></label>
                        <input type="text" placeholder="Enter Quantity" name="quantity" id="quantity" required
                            onkeyup="numberonly(this)" value="<?php echo ($editState == true ?  $editfname:'')
                            ?>">
                    </div>
                    <div class="input-box">
                        <label for="description"><b>Description</b></label>
                        <input type="text" placeholder="Enter Description" name="description" id="description" required
                            value="<?php echo ($editState == true ?  $editfname:'')
                            ?>">
                    </div>
                    <div class="input-box">
                        <label for="exp-date"><b>Expiration Date</b></label><br>
                        <input type="date" name="expdate" id="expdate" required value="<?php echo ($editState == true ? $editbirthday:'')
                        ?>">
                    </div>

                </div>

                <div class="buttons">
                    <div class="button-box">
                        <button type="submit" class="btn" name="add" id="add">Add</button>
                    </div>
                    <div class="button-box">
                        <a href="admin_supplies.php"><button type="button" class="btn cancel">Close</button></a>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <div class="pop-up" id="editpopupForm">
        <div class="form-popup" id="myForm">
            <form class="form-container" method="post">
                <h1>Update Supplies</h1>
                <div class="row">
                    <div class="input-box">
                        <label for="medid"><b>Medicine ID</b></label>
                        <input type="text" placeholder="Enter MedicineID" name="medid" id="medid" required disabled
                            value="<?php echo ($editState == true ?  $editid:'')
                            ?>">
                    </div>
                    <div class="input-box">
                        <label for="sku"><b>SKU</b></label>
                        <input type="text" placeholder="Enter SKU" name="sku" id="sku" required value="<?php echo ($editState == true ?  $editsku:'')
                            ?>">
                    </div>
                    <div class="input-box">
                        <label for="category"><b>Category</b></label>
                        <select name="category" id="category" placeholder="">
                            <option></option>
                            <option  <?php echo($editcategory == "Antibiotic") ? "selected" : "";?>>Antibiotic</option>
                            <option <?php echo($editcategory == "Angiotensin Receptor Blocker") ? "selected" : "";?>>Angiotensin Receptor Blocker</option>
                            <option <?php echo($editcategory == "Diuretic") ? "selected" : "";?>>Diuretic</option>
                            <option <?php echo($editcategory == "Vitamins") ? "selected" : "";?>>Vitamins</option>
                            <option <?php echo($editcategory == "Antihistamines") ? "selected" : "";?>>Antihistamines</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <label for="medeqname"><b>Medicine Name</b></label>
                        <input type="text" placeholder="Enter Medicine Name" id="medname" name="medname" required value="<?php echo ($editState == true ?  $editmedname:'')
                            ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="input-box">
                        <label for="quantity"><b>Quantity</b></label>
                        <input type="text" placeholder="Enter Quantity" name="quantity" id="quantity" required
                            onkeyup="numberonly(this)" disabled value="<?php echo ($editState == true ?  $editquantity:'')
                            ?>">
                    </div>
                    <div class="input-box">
                        <label for="description"><b>Description</b></label>
                        <input type="text" placeholder="Enter Description" name="description" id="description" required
                            value="<?php echo ($editState == true ?  $editdescription:'')
                            ?>">
                    </div>
                    <div class="input-box">
                        <label for="exp-date"><b>Expiration Date</b></label><br>
                        <input type="date" name="expdate" id="expdate" required value="<?php echo ($editState == true ? $editexpdate:'')
                        ?>">
                    </div>

                </div>

                <div class="buttons">
                    <div class="button-box">
                        <button type="submit" class="btn" name="update" id="update">Update</button>
                    </div>
                    <div class="button-box">
                        <a href="admin_supplies.php"><button type="button" class="btn cancel">Close</button></a>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <div class="pop-up" id="popupAddStockForm">
        <div class="form-popup" id="myForm">
            <form class="form-container" method="post">
                <div class="pop-up-title-bar">
                    <h1>QR Code</h1>
                    <div class="close-but">
                        <a href="admin_supplies.php"><i class="las la-times"></i></a>
                    </div>
                </div>
                <div class="row">
                    <div class="input-box">
                        <label for="medid"><b>Medicine ID</b></label>
                        <input type="text" placeholder="Enter MedicineID" name="medid_stock" id="medid_stock" required>

                        <div class="buttons">
                            <div class="button-box">
                                <button type="submit" class="btn" name="enterid" id="enterid">Enter</button>
                            </div>
                            <div class="button-box">
                                <a href="admin_supplies.php?camera"><button type="button" class="btn cancel">Scan by
                                        Camera</button></a>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
    </div>

    <div class="pop-up" id="popupEnterform">
        <div class="form-popup" id="myForm">
            <form class="form-container" method="post">
                <div class="pop-up-title-bar">
                    <h1>Add Stock</h1>
                    <div class="close-but">
                        <a href="admin_supplies.php"><i class="las la-times"></i></a>
                    </div>
                </div>
                <div class="row">
                    <div class="input-box">
                        <label for="medid"><b>Enter Quantity</b></label>
                        <input type="text" placeholder="Enter Quantity" name="stocknum" id="stocknum" required onkeyup="numberonly(this)">

                        <div id="buttons">
                            <div class="button-box">

                                <button type="submit" class="btn" name="updatestock" id="updatestock">Enter</button>

                            </div>
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
                        <a href="admin_supplies.php"><i class="las la-times"></i></a>
                    </div>
                </div>
                <div id="qr-reader" style="width: 600px"></div>
                <div class="input-box">
                    <label for="medid_stock"><b>Medicine ID</b></label>
                    <input type="text" placeholder="Enter MedicineID" name="medid_stock" id="medidstock" required>
                </div>
                <div id="buttons">
                    <div class="button-box">
                        <a href="?medid=<?php echo $medid?>">
                            <button type="submit" class="btn" name="enterid" id="enterid">Enter</button>
                        </a>

                    </div>
                </div>
            </form>

        </div>
    </div>

    <div class="pop-up" id="popupDeductStockForm">
        <div class="form-popup" id="myForm">
            <form class="form-container" method="post">
                <div class="pop-up-title-bar">
                    <h1>QR Code</h1>
                    <div class="close-but">
                        <a href="admin_supplies.php"><i class="las la-times"></i></a>
                    </div>
                </div>
                <div class="row">
                    <div class="input-box">
                        <label for="medid_stock"><b>Medicine ID</b></label>
                        <input type="text" placeholder="Enter MedicineID" name="medid_stock" id="medid_stock" required>

                        <div class="buttons">
                            <div class="button-box">
                                <a href="?dedmedid=<?php echo $medid?>">
                                    <button type="submit" class="btn" name="enterdedid" id="enterdedid">Enter</button>
                                </a>
                            </div>
                            <div class="button-box">
                                <a href="admin_supplies.php?dedcam"><button type="button" class="btn cancel">Scan by
                                        Camera</button></a>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
    </div>

    <div class="pop-up" id="popupDeductEnterform">
        <div class="form-popup" id="myForm">
            <form class="form-container" method="post">
                <div class="pop-up-title-bar">
                    <h1>Deduct Stock</h1>
                    <div class="close-but">
                        <a href="admin_supplies.php"><i class="las la-times"></i></a>
                    </div>
                </div>
                <div class="row">
                    <div class="input-box">
                        <label for="stocknum"><b>Enter Quantity</b></label>
                        <input type="text" placeholder="Enter Quantity" name="stocknum" id="stocknum" onkeyup="numberonly(this)" required>

                        <div id="buttons">
                            <div class="button-box">

                                <button type="submit" class="btn" name="deduct" id="deduct">Enter</button>

                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
    </div>

    <!----Camera--->
    <div class="pop-up" id="popupDeductCamera">
        <div class="form-popup" id="myForm">

            <form class="form-container" method="post">
                <div class="pop-up-title-bar">
                    <h1>Scan Using Camera</h1>
                    <div class="close-but">
                        <a href="admin_supplies.php"><i class="las la-times"></i></a>
                    </div>
                </div>
                <div id="ded-qr-reader" style="width: 600px"></div>
                <div class="input-box">
                    <label for="medid_stock"><b>Medicine ID</b></label>
                    <input type="text" placeholder="Enter MedicineID" name="medid_stock" id="medidstock" required>
                </div>
                <div id="buttons">
                    <div class="button-box">
                        <a href="?dedmedid=<?php echo $medid?>">
                            <button type="submit" class="btn" name="enterdedid" id="enterdedid">Enter</button>
                        </a>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="./assets/js/admin_supplies.js"></script>
    <script>
    const popup = document.getElementById("popupForm");
    const editpopup = document.getElementById("editpopupForm");
    const popupstock = document.getElementById("popupStockForm");
    const popupaddstock = document.getElementById("popupAddStockForm");
    const medid = document.getElementById("popupEnterform");
    const camera = document.getElementById("popupCamera");
    const popupdeductstock = document.getElementById("popupDeductStockForm");
    const med_id = document.getElementById("popupDeductEnterform");
    const deductcamera = document.getElementById("popupDeductCamera");
    const updateBtn = document.getElementById("update");
    const addBtn = document.getElementById("add");

    if (window.location.href.includes(".php?add")) {
        popup.style.display = "flex";
        updateBtn.style.display = "none";
        addBtn.style.display = "flex";
    }

    if (window.location.href.includes(".php?stock")) {
        popupaddstock.style.display = "flex";
        updateBtn.style.display = "none";
        addBtn.style.display = "flex";
    }

    if (window.location.href.includes(".php?updatestock")) {
        popupstock.style.display = "flex";
    }

    if (window.location.href.includes(".php?updateid")) {
        editpopup.style.display = "flex";
        updateBtn.style.display = "inline-block";
        addBtn.style.display = "none";
    }

    if (window.location.href.includes(".php?medid")) {
        popupaddstock.style.display = "none";
        medid.style.display = "flex";
    }

    if (window.location.href.includes(".php?camera")) {
        popupaddstock.style.display = "none";
        camera.style.display = "flex";
    }

    if (window.location.href.includes(".php?deduct")) {
        popupdeductstock.style.display = "flex";
    }

    if (window.location.href.includes(".php?dedmedid")) {
        med_id.style.display = "flex";
    }

    if (window.location.href.includes(".php?dedcam")) {
        deductcamera.style.display = "flex";
    }


    function closeAddForm() {
        popup.style.display = "none";
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

    var html5QrcodeScanner = new Html5QrcodeScanner(
        "ded-qr-reader", {
            fps: 10,
            qrbox: 250
        });

    html5QrcodeScanner.render(onScanSuccess);
    
    function numberonly(input){
    var num = /[^0-9]/gi;
    input.value = input.value.replace(num,"");
  }
    </script>
</body>

</html>