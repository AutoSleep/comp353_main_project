<?php
    // Include config file
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
    $bank_num_err = $date_err = $bank_num = "";

    if(isset($_POST['Edit_Payment'])){

        $bank_num = $_POST['bank_num'];
        $method_of_payment = $_POST["method_of_payment"];
        $auto_withdrawal = $_POST["auto_withdrawal"];
        $date_of_payment = $_POST["date_of_payment"];
        $membership = $_POST["membership"];

        $date_valid_to = date('Y-m-d', strtotime($date_of_payment.' + 1 month'));

        $id = $_SESSION['id'];

        if (empty($method_of_payment) || empty($auto_withdrawal) || empty($bank_num) || empty($date_of_payment) || empty($membership)) {
            $msg = "Please Enter Vaild Information.";
            header("Location: job_seeker_membership.php?msg=".$msg);
            exit();
        }
        
        $sql = "INSERT INTO m_Payment (bank_number,method_of_payment,auto_withdrawal,date_of_payment,id) VALUES ('$bank_num', '$method_of_payment','$auto_withdrawal','$date_of_payment','$id');";


        if(mysqli_query($link, $sql)){
            $msg = "Payment Successfully!";
            header("Location: job_seeker_membership.php?msg=".$msg);
        }
        else{
            //$msg = "Error:".$sql."<br>".mysqli_error($link);
            $msg = "Error: You Must Enter Vaild Information.";
            header("Location: job_seeker_membership.php?msg=".$msg);
        }
        mysqli_close($link);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <<meta name="viewport" content="width=device-width", initial-scale=1, shrink-to-fit=no">
        <!-- Scripts for Bootstrap-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Membership</title>
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
                    <h1>Prime Membership</h1>
                    <p>Apply up to 5 jobs<br><em>$10/month</em></p>
                    <br/>
                    <h1>Gold Membership</h1>
                    <p>Unlimited job applying<br><em>$20/month</em></p>
                </div>

                <div class="col">
                    <h1>Payment</h1>

                    <?php if(isset($_GET['msg'])) echo "<b>" . $_GET['msg']. "</b><br>"; ?>

                    <form action= " " method = "POST" >
                            <label>Bank Account:</label>
                            <input type="text" name="bank_num" class="form-control" >

                        <div class="form-group">
                            <label>Membership:</label>
                                <select class="form-control" name="membership">
                                    <option>Select One</option>
                                    <option value="Prime">Prime Membership</option>
                                    <option value="Gold">Gold Membership</option>
                                </select>
                        </div>
                        <div class="form-group">
                            <label>Method of Payment:</label>
                                <select class="form-control" name="method_of_payment">
                                    <option>Select One</option>
                                    <option value="CreditCard">Credit Card</option>
                                    <option value="CheckingAccount">Checking Account</option>
                                </select>
                        </div>
                        <div class="form-group">
                            <label>Method of Withdraw:</label>
                                <select class="form-control" name="auto_withdrawal">
                                    <option>Select One</option>
                                    <option value="Auto Pay">Auto Payment</option>
                                    <option value="Manual Pay">Manual Payment</option>
                                </select>
                        </div>
                        
                            <label>Date:</label>
                            <input type="date" name="date_of_payment">
    
                        <div class="form-group">
                            <br>
                            <button type="submit" class="btn btn-primary" name="Edit_Payment"> Submit </button> 
                        </div>
                    </form>
                </div>
        </div>

    </body>
</html>