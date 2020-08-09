<?php
include_once 'config.php';

session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
$username = $_SESSION['username'];
$sql = "SELECT user_type FROM User WHERE username='$username'";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $user_type = $row['user_type'];
        if ($user_type == "Employer") {
            header("location: emoloyer_home.php");
        } else if ($user_type == "Admin") {
            header("location: dashboard.php");
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width" , initial-scale=1, shrink-to-fit=no">
    <!-- Scripts for Bootstrap-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Job Seeker</title>
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

    <div class="container">

        <div style="margin: 40px 75px 20px 75px; padding: 50px 75px 20px 75px;" class="row">

            <h2>Personal Information</h2><br>

            <?php

            $id = $_SESSION['id'];

            $sql = "SELECT first_name, last_name,education,work_experience FROM m_Job_seeker Where user_id = '$id'";

            if ($result = mysqli_query($link, $sql)) {

                echo "<table style=\"text-align: center; margin: 10px;padding: 10px;\" class=\"table table-striped\">
                    <thead>
            <tr>
                <th scope=\"col\">First Name</th>
                <th scope=\"col\">Last Name</th>
                <th scope=\"col\">Education</th>
                <th scope=\"col\">Work Experience</th>
            </tr>
        </thead>";

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tbody>";
                        echo "<tr>";
                        echo "<td>" . $row['first_name'] . "</td>";
                        echo "<td>" . $row['last_name'] . "</td>";
                        echo "<td>" . $row['education'] . "</td>";
                        echo "<td>" . $row['work_experience'] . "</td>";
                        echo "</tr>";
                        echo "</tbody>";
                    }
                }
            }
            echo "</table>"
            ?>
        </div>

        <div style="margin: 20px 75px; padding: 20px 75px;" class="row">

            <h2>Account Information</h2><br>


            <?php

            $id = $_SESSION['id'];

            $sql = "SELECT username, membership,email,account_balance,date_valid_to,auto_withdrawal,method_of_payment
                    FROM User, m_Payment Where User.id = m_Payment.id AND User.id =$id;";
            if ($result = mysqli_query($link, $sql)) {

                echo "<table style=\"text-align: center; margin: 10px;padding: 10px;\" class=\"table table-striped\">
        <thead>
            <tr>
                <th scope=\"col\">Username</th>
                <th scope=\"col\">Membership</th>
            </tr>
        </thead>";
                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tbody>";
                        echo "<tr>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['membership'] . "</td>";
                        echo "</tr>";
                        echo "</tbody>";

                        echo "<thead>
            	<tr>
                	<th scope=\"col\">E-mail</th>
                	<th scope=\"col\">Account Balance</th>
                	<th scope=\"col\">Valid of Date</th>
            	</tr>
        	</thead>";

                        echo "<tbody>";
                        echo "<tr>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['account_balance'] . "</td>";
                        echo "<td>" . $row['date_valid_to'] . "</td>";
                        echo "</tr>";
                        echo "</tbody>";

                        echo "
		<thead>
            <tr>
                <th scope=\"col\">Method of Payment</th>
                <th scope=\"col\">Method of Withdrwa</th>
            </tr>
        </thead>";

                        echo "<tbody>";
                        echo "<tr>";
                        echo "<td>" . $row['method_of_payment'] . "</td>";
                        echo "<td>" . $row['auto_withdrawal'] . "</td>";
                        echo "</tr>";
                        echo "</tbody>";
                    }
                }
            }
            echo "</table>";
            ?>

        </div>

        <div style="margin: 20px 75px; padding: 20px 75px;" class="row">

            <h2>Applied Jobs</h2><br>

            <?php

                $id = $_SESSION['id'];

                $sql = "SELECT job_id, job_offered, job_accepted,employer_id, date_applied FROM m_Job_application WHERE job_seeker_id ='$id'";

                if($result = mysqli_query($link,$sql)){

                    if(mysqli_num_rows($result) > 0){
                       echo"<table style=\"text-align: center; margin: 10px;padding: 10px;\" class=\"table table-striped\">
                            <thead>
                                <tr>
                                    <th scope=\"col\">Jobs ID</th>
                                    <th scope=\"col\">Employer ID</th>
                                    <th scope=\"col\">Jobs Offered</th>
                                    <th scope=\"col\">Jobs Accept</th>
                                    <th scope=\"col\">Date of Applied</th>
                                </tr>
                            </thead>";
                        while($row = mysqli_fetch_array($result)){
                            echo "<tbody>";
                                echo "<tr>";
                                    echo "<td>" . $row['job_id'] . "</td>";
                                    echo "<td>" . $row['employer_id'] . "</td>";
                                    if($row['job_offered'] ==  '1'){
                                        echo "<td> Offered </td>";
                                    }
                                    else{
                                        echo "<td> Not yet </td>";
                                    }
                                    if($row['job_accepted'] ==  '1'){
                                        echo "<td> Accept </td>";
                                    }
                                    else{
                                        echo "<td> Not yet </td>";
                                    }
                                    echo "<td>" . $row['date_applied'] . "</td>";
                                echo "</tr>";
                            echo "</tbody>";                
                        }
                        echo "</table>";
        
                    //mysqli_free_result($result);
                    } else{
                    echo "No records matching your query were found.";
                    }
                }
                ?>
        </div>

        <div style="margin: 20px 75px; padding: 20px 75px;" class="row">

            <h2>Update Applied Jobs</h2><br><br>

            <form form action=" " method="POST"><br>
                <label style="padding: 20px 0px 0px 0px;"><b>Job ID:</b></label>
                <input type="text" name="job_id" class="form-control">
                <br>
                <button type="submit" class="btn btn-primary" name="accept_j"> Accept </button>
                <button type="submit" class="btn btn-primary" name="deny_j"> Deny </button>
                <button type="submit" class="btn btn-primary" name="delete_j"> Withdrawal </button>
            </form><br>

            <?php

            $id = $_SESSION['id'];

            if (isset($_POST['accept_j'])) {

                $job_id = $_POST['job_id'];

                if (empty($job_id)) {
                    echo "Please Enter Valid Input.";
                    exit();
                }

                $sql = "UPDATE m_Job_application SET job_accepted = '1' WHERE job_seeker_id = '$id' AND job_id = '$job_id'AND
                job_offered = '1'";

                if (mysqli_query($link, $sql)) {
                    echo "Apply Successfully!";
                } else {
                    echo "Error: Not Apply.";
                }
            }
            ?>

            <?php
            $id = $_SESSION['id'];
            if (isset($_POST['deny_j'])) {

                $job_id = $_POST['job_id'];

                if (empty($job_id)) {
                    echo "Please Enter Valid Input.";
                    exit();
                }

                $sql = "UPDATE m_Job_application SET job_accepted = '0' WHERE job_seeker_id = '$id' AND job_id = '$job_id'AND
                job_offered = '1'";

                if (mysqli_query($link, $sql)) {
                    echo "Deny successfully";
                } else {
                    // echo "Error:".$sql."<br>".mysqli_error($link);
                    echo "Error: Not Deny.";
                }
            }
            ?>

            <?php
            $id = $_SESSION['id'];
            if (isset($_POST['delete_j'])) {

                $job_id = $_POST['job_id'];

                if (empty($job_id)) {
                    echo "Please Enter Valid Input.";
                    exit();
                }

                $sql = "DELETE FROM m_Job_application WHERE job_seeker_id = '$id' AND job_id = '$job_id'";

                if (mysqli_query($link, $sql)) {
                    echo "Delete successfully.";
                } else {
                    //echo "Error:".$sql."<br>".mysqli_error($link);
                    echo "Error: Not Delete.";
                }
            }
            ?>
        </div>

    </div>
</body>

</html>