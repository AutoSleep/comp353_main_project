<?php include 'employer_header.php' ?>
<title>Jobs</title>
<?php include 'employer_navbar.php' ?>
<div class="container-fluid" style="margin-bottom:20px">
    <div class="row">
        <div class="col-sm-2">
            <?php
            $username = $_SESSION["username"];
            $numJobs = 0;
            $sql = "SELECT COUNT(*) AS num FROM m_Job_post, User WHERE username='$username' AND employer_id=id";
            if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_array($result);
                    $numJobs = $row['num'];
                }
            }
            $membership = "";
            $sql = "SELECT membership FROM User WHERE username='$username'";
            if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_array($result);
                    $membership = $row['membership'];
                }
            }
            if($numJobs>5 && $membership == "Prime"){
                echo "<a class='btn btn-primary' role='button'>Upgrade your membership to post more jobs</a>";
            } else {
                echo "<a class='btn btn-primary' href='employer_new_job.php' role='button'>Post New Job</a>";
            }
            ?>
        </div>
        <div class="col-sm-2">
            <a class="btn btn-primary" href="employer_job_category.php" role="button">Add New Job Category</a>
        </div>
    </div>
</div>
<div class="container-fluid" style="margin-bottom:20px">
    <h4>Search jobs by date posted:</h4>
    <form action="employer_jobs.php" method="post">
        <div class="form-group">
            <label>First Date</label>
            <input type="date" name="startDate">
        </div>
        <div class="form-group">
            <label>Last Date</label>
            <input type="date" name="endDate">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="SubmitButton">
        </div>
    </form>
</div>
<div class="container-fluid">
    <h2>Current Jobs</h2>
</div>
<?php
$username = $_SESSION["username"];
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $sql = "SELECT title, description, date_posted, nb_of_needed_employees, jt.job_type_id, job_type_name FROM m_Job_post jp, m_Job_type jt, User WHERE username='$username' AND employer_id=id AND jp.job_type_id=jt.job_type_id
    AND date_posted BETWEEN '$startDate' AND '$endDate'";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            echo "<h5>Showing jobs posted between ". $startDate ." and ". $endDate .".</h5>";
            echo "<table class=\"table table-bordered\">";
            echo "<tr>";
            echo "<th>Job Title</th>";
            echo "<th>Job Description</th>";
            echo "<th>Job Category</th>";
            echo "<th>Date Posted</th>";
            echo "<th>Number of Needed Employees</th>";
            echo "</tr>";
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td>" . $row['job_type_name'] . "</td>";
                echo "<td>" . $row['date_posted'] . "</td>";
                echo "<td>" . $row['nb_of_needed_employees'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            // Free result set
            mysqli_free_result($result);
        } else{
            echo "No records matching your query were found.";
        }
    } else{
        echo "ERROR: Could not execute $sql. " . mysqli_error($link);
    }
} else {
    $sql = "SELECT title, description, date_posted, nb_of_needed_employees, jt.job_type_id, job_type_name FROM m_Job_post jp, m_Job_type jt, User WHERE username='$username' AND employer_id=id AND jp.job_type_id=jt.job_type_id";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            echo "<table class=\"table table-bordered\">";
            echo "<tr>";
            echo "<th>Job Title</th>";
            echo "<th>Job Description</th>";
            echo "<th>Job Category</th>";
            echo "<th>Date Posted</th>";
            echo "<th>Number of Needed Employees</th>";
            echo "</tr>";
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td>" . $row['job_type_name'] . "</td>";
                echo "<td>" . $row['date_posted'] . "</td>";
                echo "<td>" . $row['nb_of_needed_employees'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            // Free result set
            mysqli_free_result($result);
        } else{
            echo "No records matching your query were found.";
        }
    } else{
        echo "ERROR: Could not execute $sql. " . mysqli_error($link);
    }
}
?>
<?php include 'employer_footer.php' ?>