<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}

// Include config file
//require_once "config.php";

if(isset($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $password = sha1($password);
  $userType = $_POST['userType'];

  $sql = "SELECT * FROM User WHERE username=? AND password=? AND user_type=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sss", $username, $password, $userType);
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();

  session_regenerate_id();
  $_SESSION['username'] = $row['username'];
  $_SESSION['role'] = $row['user_type'];
  session_write_close();

  if($result->num_rows==1 && $_SESSION['role']=="Admin"){
    header("location:admin/dashboard.php");
  }else if($result->num_rows==1 && $_SESSION['role']=="Employer"){
    header("location:Employer.php");
  }else if($result->num_rows==1 && $_SESSION['role']=="Job_seeker"){
    header("location:Job_seeker.php");
  }else{
    $msg = "Username or Password is incorrect!";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="" method="post">
            <div class="form-group" >
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder = "Username" required> 
            </div>
            <div class="form-group" >
                <label>Password</label>
                <input type="password" name="username" class="form-control" placeholder = "Password" required> 
            </div>
            <div class="form-group">
              <label for="userType">I'm a :</label>
              <input type="radio" name="userType" value="Admin" class="custom-radio" required>&nbsp;Admin
              <input type="radio" name="userType" value="Employer" class="custom-radio" required>&nbsp;Employer
              <input type="radio" name="userType" value="Job_seeker" class="custom-radio" required>&nbsp;Job_seeker
            </div>
            <div class="form-group">
                <input type="submit" name="login" class="btn btn-primary">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div>
</body>
</html>