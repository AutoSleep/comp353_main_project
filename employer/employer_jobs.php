<?php include 'employer_header.php' ?>
<title>Jobs</title>
<?php include 'employer_navbar.php' ?>
    <div class="container-fluid" style="margin-bottom:20px">
        <a class="btn btn-primary" href="employer_new_job.php" role="button">Post New Job</a>
    </div>
    <div class="container-fluid">
        <h2>Current Jobs</h2>
        <ul class="list-group">
            <li class="list-group-item">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Morbi leo risus</li>
            <li class="list-group-item"><?php echo $_POST["username"]; ?></li>
            <li class="list-group-item"><?php echo $_SESSION["username"]; ?></li>
        </ul>
    </div>
<?php include 'employer_footer.php' ?>