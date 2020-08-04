<?php
	session_start();

	if(!isset($_SESSION['user_id'] || $_SESSION['role'] = "Job_seeker")) 
	{
  		header("Location: login_updated.php");
  		exit();
	}
	include_once 'config.php';
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
        <title>Job seeker Home</title>
    </head>

    <body>
        <nav class="navbar navbar-expand-md bg-primary navbar-dark fixed-top">
            <a class="navbar-brand" href="">Job Seeker</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="Employee.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Jobs.html">Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Profile.html">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Membership.html">Membership</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Contact.html">Contact Us</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container">
        	<?php
        		session_start();

				if(empty($_SESSION['username'])) {
					header("Location: login.php");
					exit();
				}


				include_once 'config.php';


				if(isset($_GET)) {

					$sql = "SELECT * FROM m_Job_post WHERE job_id ='$_GET['job_id']'";
	  				$result = mysql_query($sql);
	  				$rows_num = mysql_num_rows($result);

	  				if($rows_num > 0) 
	  				{
	    				$row = mysql_fetch_array($result);
	    				$employer_id = $row['employer_id'];
	   				}

	
					$sql1 = "SELECT * FROM m_Job_application WHERE job_seeker_id='$_SESSION['user_id']' AND job_id='$row['job_id']'";
   					$result1 = mysql_query($sql1);
    				if( mysql_num_rows($result1)== 0) {  
    	
    					$sql = "INSERT INTO m_Job_application(job_id, employer_id, job_seeker_id, date_applied) VALUES ('$_GET['job_id']', '$employer_id', '$_SESSION['user_id']', '$_GET['apply_date']')";

						if(mysql_query($sql)===TRUE) {
							$_SESSION['jobApplySuccess'] = true;
							header("Location: applied_jobs.php");
							exit();
						} else {
							echo "Error " . $sql . "<br>" . mysql_connect_error();
						}

						mysql_close();

    				}  else {
						header("Location: search_job.php");
						exit();
					}
	

				} else {
					header("Location: search_job.php");
					exit(); 
        	?>
        </div>
    </body>
</html>