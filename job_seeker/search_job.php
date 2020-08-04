<?php
	session_start();

	if(!isset($_SESSION['username'] || $_SESSION['role'] = "Job_seeker")) 
	{
  		header("Location: login_updated.php");
  		exit();
	}

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
        <title>Employer Home</title>
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

        <div style="margin: 40px 250px; padding: 50px 50px;">

            <h2>Search Jobs</h2><br>
	
			<form action="search_job_search.php" method="post">
				<input type="text" name="search_keyword">
				<div align="left" class="div_right" name="catagory">
					<select name="search_catagory">
						<option value="0">Select</option>
						<option value="1"><li>Finance</li></option>
						<option value="2"><li>Analytics</li></option>
						<option value="3"><li>Insurance</li></option>
						<option value="4"><li>Design</li></option>
						<option value="5"><li>Fashion</li></option>
						<option value="6"><li>Administration</li></option>
						<option value="7"><li>Customer Service</li></option>
						<option value ="8"><li>Marketing</li></option>
					</select>
				</div>
				<input type="submit" name="submit">
			</form>
		</div>
	</body>
</html>