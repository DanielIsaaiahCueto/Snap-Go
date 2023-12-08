<?php   
session_start();  
include("config.php");

$nameError = "";
$passwordError = "";

 if (isset($_POST['submit'])) {  
      //echo "<pre>";  
      //print_r($_POST);  
      $username=mysqli_real_escape_string($conn,$_POST['username']);  
      $password=mysqli_real_escape_string($conn,$_POST['password']);  
      $sql=mysqli_query($conn,"select * from `usertbl` where username='$username' && password='$password'");

      $row=mysqli_fetch_array($sql);

      if($row['UserType']=="Admin"){
        $_SESSION['USER_ID']=$row['UserID'];  
        $_SESSION['USER_FNAME']=$row['FirstName'];
        $_SESSION['USER_LNAME']=$row['LastName'];
        $_SESSION['USER_TYPE']=$row['UserType'];  
        header('location:admin/admin_home.php');
      }
      elseif($row['UserType']=="Worker"){
        $_SESSION['USER_ID']=$row['UserID'];  
        $_SESSION['USER_FNAME']=$row['FirstName'];
        $_SESSION['USER_LNAME']=$row['LastName'];
        $_SESSION['USER_TYPE']=$row['UserType'];
        header("location:worker/dashboard.php");
      }
      elseif($row["UserType"]=="Patient"){
        $_SESSION['USER_ID']=$row['UserID'];  
        $_SESSION['USER_FNAME']=$row['FirstName'];
        $_SESSION['USER_LNAME']=$row['LastName'];
        $_SESSION['USER_TYPE']=$row['UserType'];
        header("location:patient/dashboard.php");
      }else{
        $msg="Please Enter Valid details !"; 
      } 
 }  
 ?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="./assets/css/login.css?v=<?php echo time(); ?>" />
    
    <link rel="icon" type="image/x-icon" href="./assets/images/login/logo.png">
    <title>Log In</title>

  </head>

  <body>
  <div class="container">
    <div class="password-container"> 
      <div class="form-container">
        <div class="signin-signup">
          
          <form method="post" class="sign-in-form">
          <h1>Snap&Go: Brgy. Sambat, San Pascual</h1>
            <h2 class="title">Sign In</h2>
            
              <div class="input-field" >
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Username" name="username" />
                <span style="color:red;"></span>
              </div>
            
            <div class="input-field" >
              <i class="fas fa-lock"></i>
              <input type="password" id="password" placeholder="Password" name="password" />
              <span style="color:red;"></span>
              
            </div>
          
            <input type="submit" value="Log In" class="btn solid" name="submit" />
            <a href="index.php"><button type="button" class="btn solid" style="background-color:red;">Cancel</button></a>

            
          </form> 
          </div>
        </div>
      </div>
    </div>
    
  <script src="./assets/js/login.js"></script>
  </body>
</html>
