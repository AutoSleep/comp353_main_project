<?php include 'employer_header.php' ?>
<title>New Job</title>
<?php include 'employer_navbar.php' ?>
<form action="process_job_form.php" method="post">
    <div class="form-group">
        <label for="jobTitle">Job Title</label>
        <input type="text" class="form-control" name="jobTitle" id="jobTitle" placeholder="Job Title">
    </div>
    <div class="form-group">
        <label for="jobDescription">Job Description</label>
        <textarea class="form-control" name="jobDescription" id="jobDescription" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label for="jobType">Type of Job</label>
        <select class="form-control" name="jobType" id="jobType"">
            <?php 
            $sql = "SELECT job_type_id, job_type_name FROM m_Job_type";
            mysqli_query($link, $sql);
            if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        echo "<option value='".$row['job_type_id']."'>" . $row['job_type_name'] . "</option>";
                    }
                    mysqli_free_result($result);
                } else{
                    echo "No records matching your query were found.";
                }
            } else{
                echo "ERROR: Could not execute $sql. " . mysqli_error($link);
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="numEmployeesNeeded">Number of employees requested</label>
        <select class="form-control" name="numEmployeesNeeded" id="numEmployeesNeeded">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select>
    </div>
    <button class="btn btn-primary" type="submit">Post Job</button>
</form>
<?php include 'employer_footer.php' ?>