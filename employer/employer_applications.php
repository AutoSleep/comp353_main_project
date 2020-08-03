<?php include 'employer_header.php' ?>
<title>Applications</title>
<?php include 'employer_navbar.php' ?>
<div class="container-fluid">
    <h2>Current Jobs</h2>
    <?php
    $username = $_SESSION["username"];
    
    $sql = "SELECT title, date_posted, first_name, last_name, education, work_experience, date_applied 
    FROM m_Job_seeker js, m_Job_post jp, m_Job_application ja, User 
    WHERE username='$username' AND id=jp.employer_id AND js.user_id=ja.job_seeker_id AND jp.job_id=ja.job_id";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            echo "<table class=\"table table-bordered\">";
            echo "<tr>";
                echo "<th>Job Title</th>";
                echo "<th>Date Posted</th>";
                echo "<th>Applicant</th>";
                echo "<th>Education</th>";
                echo "<th>Work Experience</th>";
                echo "<th>Date Applied</th>";
            echo "</tr>";
            while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['date_posted'] . "</td>";
                echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
                echo "<td>" . $row['education'] . "</td>";
                echo "<td>" . $row['work_experience'] . "</td>";
                echo "<td>" . $row['date_applied'] . "</td>";
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
?>
</div>
<?php include 'employer_footer.php' ?>

        