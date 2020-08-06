<?php include 'employer_header.php' ?>
<title>Applications</title>
<?php include 'employer_navbar.php' ?>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $data = $_POST['jobData'];
    $job_id = $data[2];
    $user_id = $data[3];
    
    $sql = "UPDATE m_Job_application SET job_offered='1' WHERE job_id='$job_id' AND job_seeker_id='$user_id'";
    if(mysqli_query($link, $sql)){
        echo "Job offer was sent.";
    } else {
        echo "ERROR: Could not execute $sql. " . mysqli_error($link);
    }
}
?>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script type="text/javascript">
$( document ).ready(function() {
    console.log( "ready" );
    $( ".tableRows" ).click(function() {
        var rowData = $(this).attr("data");
        var parsedData = rowData.split(" ");
        var name = parsedData[0] + " " + parsedData[1];
        if (confirm("Send job offer to " + name +"?")){
            $.ajax({
                type: "POST",
                url: "employer_applications.php",
                data: { "jobData" : parsedData},
                success: function() {
                    alert("Job offer sent!");
                }
            });
        }
    });
});
</script>
<div class="container-fluid">
    <h2>Current Jobs</h2>
    <?php
    $username = $_SESSION["username"];
    
    $sql = "SELECT title, date_posted, first_name, last_name, education, work_experience, date_applied, ja.job_id AS job_id, js.user_id AS user_id
    FROM m_Job_seeker js, m_Job_post jp, m_Job_application ja, User 
    WHERE username='$username' AND id=jp.employer_id AND js.user_id=ja.job_seeker_id AND jp.job_id=ja.job_id";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            echo "<table class='table table-bordered table-hover'>";
            echo "<tr>";
                echo "<th>Job Title</th>";
                echo "<th>Date Posted</th>";
                echo "<th>Applicant</th>";
                echo "<th>Education</th>";
                echo "<th>Work Experience</th>";
                echo "<th>Date Applied</th>";
            echo "</tr>";
            while($row = mysqli_fetch_array($result)){
            echo "<tr class='tableRows' data='".$row['first_name']." ".$row['last_name']." ".$row['job_id']." ".$row['user_id']."'>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['date_posted'] . "</td>";
                echo "<td><a>" . $row['first_name'] . " " . $row['last_name'] . "</a></td>";
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

        