<?php

    require_once "config.php";

    session_start();

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
    $username = $_SESSION['username'];
    $sql = "SELECT user_type FROM User WHERE username='$username'";
        if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_array($result);
                $user_type = $row['user_type'];
            if($user_type=="Employer"){
                header("location: emoloyer_home.php");
            } else if($user_type=="Admin"){
                header("location: dashboard.php");
            }
        }
    }
?>
<?php

    $first_N_err = $last_N_err = $email_err = "";
    $education_err = $experience_err = "";

    $first_name = $last_name = $email = $experience ="";
    $education = "";

if(isset($_POST['Edit_Name'])){

    $first_name = $_POST['first_name'];
    $last_name = $_POST["last_name"];

    $id = $_SESSION['id'];

    if (empty($first_name)){
        $msg = "Please Enter First Name.";
        header("Location: job_seeker_profile.php?msg=".$msg);
        exit();
    }
    if (empty($last_name)){
        $msg = "Please Enter Last Name.";
        header("Location: job_seeker_profile.php?msg=".$msg);
        exit();
    }
    $sql = "UPDATE m_Job_seeker SET first_name = '$first_name',last_name = '$last_name' WHERE user_id = '$id'";

    if(mysqli_query($link, $sql)){
        $msg = "Modify Successfully!";
        header("Location: job_seeker_profile.php?msg=".$msg);
    }
    else{
        //echo "Error:".$sql."<br>".mysqli_error($link);
        $msg = "Error: You Must Enter Vaild Information.";
        header("Location: job_seeker_profile.php?msg=".$msg);
    }
}
?>
<?php
if(isset($_POST['Edit_Email'])){

    $email= $_POST['email'];
 
    $id = $_SESSION['id'];

    if (empty($email)){
        $msg = "Please Enter Valid E-mail.";
        header("Location: job_seeker_profile.php?msg=".$msg);
        exit();
    }

    $sql = "UPDATE User SET email = '$email' WHERE id = '$id'";

    if(mysqli_query($link, $sql)){
        $msg = "Modify Successfully!";
        header("Location: job_seeker_profile.php?msg=".$msg);
    }
    else{
        //echo "Error:".$sql."<br>".mysqli_error($link);
        $msg = "Error: You Must Enter Vaild Information.";
        header("Location: job_seeker_profile.php?msg=".$msg);
    }
}

if(isset($_POST['Edit_Experience'])){

    $experience = $_POST['experience'];

    $id = $_SESSION['id'];

    if (empty($experience)){
        $msg = "Please Enter Valid Input.";
        header("Location: job_seeker_profile.php?msg=".$msg);
        exit();
    }
  
    $sql = "UPDATE m_Job_seeker SET work_experience = '$experience'  WHERE user_id = '$id'";

    if(mysqli_query($link, $sql)){
        $msg = "Modify Successfully!";
        header("Location: job_seeker_profile.php?msg=".$msg);
    }
    else{
        //echo "Error:".$sql."<br>".mysqli_error($link);
        $msg = "Error: You Must Enter Vaild Information.";
        header("Location: job_seeker_profile.php?msg=".$msg);
    }
    //mysqli_close($link);
}

if(isset($_POST['Edit_Education'])){

    $education = $_POST['education'];

    $id = $_SESSION['id'];

    if (empty($education)){
        $msg = "Please Enter Valid Input.";
        header("Location: job_seeker_profile.php?msg=".$msg);
        exit();
    }

    $sql = "UPDATE m_Job_seeker SET education = '$education' WHERE user_id = '$id'";

    if(mysqli_query($link, $sql)){
        $msg = "Modify Successfully!";
        header("Location: job_seeker_profile.php?msg=".$msg);
    }
    else{
        //echo "Error:".$sql."<br>".mysqli_error($link);
        $msg = "Error: You Must Enter Vaild Information.";
        header("Location: job_seeker_profile.php?msg=".$msg);
    }
    //mysqli_close($link);
}

if(isset($_POST['Edit_Payment'])){

    $method_of_payment = $_POST['method_of_payment'];
    $auto_withdrawal = $_POST["auto_withdrawal"];

    $id = $_SESSION['id'];

    $sql = "UPDATE m_Payment SET method_of_payment = 
    '$method_of_payment',auto_withdrawal = '$auto_withdrawal' WHERE id = '$id'";

    if(mysqli_query($link, $sql)){
        $msg = "Modify Successfully!";
        header("Location: job_seeker_profile.php?msg=".$msg);
    }
    else{
        //echo "Error:".$sql."<br>".mysqli_error($link);
        $msg = "Error: You Must Enter Vaild Information.";
        header("Location: job_seeker_profile.php?msg=".$msg);
    }
    //mysqli_close($link);
}

if(isset($_POST['Edit_Membership'])){

    $membership= $_POST['membership'];

    if (empty($membership)){
        $msg = "Please Choose one of them.";
        header("Location: job_seeker_profile.php?msg=".$msg);
        exit();
    }

    $id = $_SESSION['id'];

    $sql = "UPDATE User SET membership = '$membership' WHERE id = '$id'";

    if(mysqli_query($link, $sql)){
        $msg = "Modify Successfully!";
        header("Location: job_seeker_profile.php?msg=".$msg);
    }
    else{
        //echo "Error:".$sql."<br>".mysqli_error($link);
        $msg = "Error: You Must Enter Vaild Information.";
        header("Location: job_seeker_profile.php?msg=".$msg);
    }
    //mysqli_close($link);
}

if(isset($_POST['Delete'])){

    $sql = "DELETE m_Job_seeker FROM m_Job_seeker WHERE user_id='$id';
            DELETE User FROM User WHERE user_id='$id';";
    
    if(mysqli_multi_query($link, $sql)){
        $msg = "Error: Delete Processing.";
        header("location: job_seeker_logout.php");
    } else{
        //echo "ERROR: Could not execute $sql. " . mysqli_error($link);
        $msg = "Error: Delete not Process.";
        header("Location: job_seeker_profile.php?msg=".$msg);
    }
    //mysqli_close($link);
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width", initial-scale=1, shrink-to-fit=no">
        <!-- Scripts for Bootstrap-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Profile</title>
    </head>

    <body>
        <nav class="navbar navbar-expand-md bg-primary navbar-dark fixed-top">
            <a class="navbar-brand" href="">Job Seeker</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="job_seeker_home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="job_seeker_job.php">Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="job_seeker_profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="job_seeker_membership.php">Membership</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php"> Log out </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div style="margin: 40px 50px; padding: 50px 50px;" class="row">

        <div class="col">

            <h2>Edit Profit</h2><br>

            <?php if(isset($_GET['msg'])) echo "<b>" . $_GET['msg']. "</b><br>";?>

            <form form action= " " method = "POST" >       
                <label>First Name:</label>
                    <input type="text" name="first_name" class="form-control" >
                   
                <label>Last Name:</label>
                    <input type="text" name="last_name" class="form-control" ><br>
     
                <button type="submit" class="btn btn-primary" name="Edit_Name"> Modify </button>
            </form>

            <form form action= " " method = "POST" >               
                <label>E-mail:</label>
                    <input type="text" name="email" class="form-control" ><br>
                <button type="submit" class="btn btn-primary" name="Edit_Email"> Modify </button>
            </form>

            <form form action= " " method = "POST" >
            
                <label>Experience:</label>
                    <input type="text" name="experience" class="form-control" ><br>         
                <button type="submit" class="btn btn-primary" name="Edit_Experience"> Modify </button>
            </form>

            <form form action= " " method = "POST" >
                <label>Education:</label>
                    <input type="text" name="education" class="form-control"><br>
                <button type="submit" class="btn btn-primary" name="Edit_Education"> Modify </button>
            </form><br>

            <form form action= " " method = "POST">
                <button class="btn btn-primary" type="submit" name="Delete">Delete Profile</button>
            </form>

        </div>

        <div class="col">

            <h2>Modify Payment</h2><br>

            <form form action= " " method = "POST">

                  <label>Method of Payment:</label>

                    <select class="form-control" name="method_of_payment">
                      
                      <option value="CreditCard">Credit Card</option>
                      <option value="CheckingAcc">Checking Account</option>              
                    </select>                         
                    <br>
                    <label>Method of Withdraw:</label>

                      <select class="form-control" name="auto_withdrawal">
                        
                        <option value="auto">Auto</option>
                        <option value="manual">Manual</option>
                      </select>
                    <br>
                  <button type="submit" class="btn btn-primary" name="Edit_Payment"> Modify </button>                   
            </form>

            <h2>Modify Membership</h2><br>

            <form form action= " " method = "POST">
              <input type="radio" id="basic" name="membership" value="basic">
              <label for="basic">Basic Membership</label><br>
              <button type="submit" class="btn btn-primary" name="Edit_Membership"> Modify </button>
            </form>

        </div>
    </div>
    </body>
</html>