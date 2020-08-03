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
                <option value="1">Cashier</option>
                <option value="2">Delivery Driver</option>
                <option value="3">Intern</option>
                <option value="4">Software Engineer</option>
                <option value="5">Waiter/Waitress</option>
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