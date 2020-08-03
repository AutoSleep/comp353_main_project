<?php include 'employer_header.php' ?>
    <title>Job Posting</title>
<?php include 'employer_navbar.php' ?>
<?php

$username = $_SESSION['username'];

//Get data from html form
$jobTitle = $_REQUEST['jobTitle'];
$jobDescription = $_REQUEST['jobDescription'];
$numEmployeesNeeded = $_REQUEST['numEmployeesNeeded'];
$jobType = $_REQUEST['jobType'];
$date = date("Y-m-d");
$user_id = "";
$job_id = "";
$job_type_id = "";
$sql = "SELECT id FROM User WHERE username='$username'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        $user_id = $row['id'];
    }
}

//Attempt insert into query
$sql = "INSERT INTO m_Job_post (employer_id, title, description, date_posted, is_active, nb_of_needed_employees, job_type_id) VALUES
($user_id, '$jobTitle', '$jobDescription', '$date', 1, '$numEmployeesNeeded', '$jobType')";

?>   
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
        <li><em>Job Title:</em> <?php echo $_POST["jobTitle"]?></li>
        <li><em>Job Description:</em> <?php echo $_POST["jobDescription"]?></li>
        <li><em>Job Type:</em> <?php echo $_POST["jobType"]?></li>
        <li><em>Number of Employees Needed:</em> <?php echo $_POST["numEmployeesNeeded"];?></li>
    </ol>
<?php include 'employer_footer.php' ?>