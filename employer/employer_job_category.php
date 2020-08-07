<?php include 'employer_header.php' ?>
<title>Jobs</title>
<?php include 'employer_navbar.php' ?>
<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $category = $_POST['category'];
    $sql = "SELECT MAX(job_type_id) AS max FROM m_Job_type";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);
            $job_type_id = $row['max'] + 1;
            $sql = "INSERT INTO m_Job_type(job_type_id, job_type_name) VALUES ('$job_type_id', '$category')";
            if(mysqli_multi_query($link, $sql)){
                echo "Added new job category!";
            }
            else{
                echo "Error:".$sql."<br>".mysqli_error($link) ." ". $job_type_id;
            }
        }
    }

}
$sql = "SELECT job_type_id, job_type_name FROM m_Job_type";
mysqli_query($link, $sql);
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class=\"table table-bordered\">";
        echo "<tr>";
        echo "<th>Job Category</th>";
        echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['job_type_name'] . "</td>";
            echo "</tr>";
        }
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}
?>
<form action="employer_job_category.php" method="post">
    <div class="form-group">
        <label for="category">New Job Category</label>
        <input type="text" class="form-control" name="category" id="category"">
    </div>
    <button class="btn btn-primary" style="margin-bottom:10px;" href="employer_job_category.php" type="submit">Save</button>
</form>
<?php include 'employer_footer.php' ?>