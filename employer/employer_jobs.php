<?php include 'employer_header.php' ?>
<title>Jobs</title>
<?php include 'employer_navbar.php' ?>
    <div class="container-fluid" style="margin-bottom:20px">
        <a class="btn btn-primary" href="employer_new_job.php" role="button">Post New Job</a>
    </div>
    <div class="container-fluid">
        <h2>Current Jobs</h2>
        <?php
        $username = $_SESSION["username"];
        $sql = "SELECT id FROM User WHERE username='$username'";
        if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_array($result);
                $user_id = $row['id'];
            }
        }
        $sql = "SELECT title, description, date_posted, nb_of_needed_employees, job_type_id FROM m_Job_post WHERE employer_id='$user_id'";
        if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0){
                echo "<table>";
                echo "<tr>";
                echo "<th>Job Title</th>";
                echo "<th>Job Description</th>";
                echo "<th>Job Category</th>";
                echo "<th>Date Posted</th>";
                echo "<th>Number of Needed Employees</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            $job_type_id = $row['job_type_id'];
            $sql = "SELECT job_type_name FROM m_Job_type WHERE job_type_id='$job_type_id'";
            if($result2 = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result2) > 0){
                    $row2 = mysqli_fetch_array($result2);
                    $job_category = $row2['job_type_name'];
                }
            }
            mysqli_free_result($result2);
            echo "<tr>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td>" . $job_category . "</td>";
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
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        ?>
    </div>
<?php include 'employer_footer.php' ?>