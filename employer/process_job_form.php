<?php
//Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Include config file
require_once "config.php";

//Get data from html form
$jobTitle = $_REQUEST['jobTitle'];
$jobDescription = $_REQUEST['jobDescription'];
$numEmployeesNeeded = $_REQUEST['numEmployeesNeeded'];
$jobType = $_REQUEST['jobType'];
$date = date("Y-m-d");

//Attempt insert into query
$sql = "INSERT INTO Job_post (job_id, employer_id, title, description, date_posted, is_active, nb_of_needed_employees, job_type_id) VALUES
(1, 1, '$jobTitle', '$jobDescription', '$date', 1, '$numEmployeesNeeded', '$jobType')";

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
        <title>Employer Home</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-md bg-primary navbar-dark fixed-top">
            <a class="navbar-brand" href="">Employer Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="employer_home.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="employer_jobs.html">Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="employer_applications.html">Applications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="employer_membership.html">Membership</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="employer_contact.html">Contact Us</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid" style="margin-top:75px;">
        <h1>
            <?php if(mysqli_query($link, $sql)){
                echo "Job posted successfully.";
            } else {
                echo "ERROR: Could not execute $sql." . mysqli_error($link);
            }
            mysqli_close($link);?>
        </h1>
        <p>Here is the information you have submitted:</p>
        <ol>
            <li><em>Name:</em> <?php echo $_POST["jobTitle"]?></li>
            <li><em>Email:</em> <?php echo $_POST["jobDescription"]?></li>
            <li><em>Subject:</em> <?php echo $_POST["jobType"]?></li>
            <li><em>Message:</em> <?php echo $_POST["numEmployeesNeeded"];?></li>
        </ol>
    </body>
</html>