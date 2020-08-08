<?php
    include_once 'config.php';

    session_start();

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
    $username = $_SESSION['username'];
    $sql = "SELECT user_type FROM User WHERE username='$username'";
        if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_array($result);
                $user_type = $row['user_type'];
            if($user_type=="Employer"){
                header("location: emoloyer_home.php");
            } else if($user_type=="Admin"){
                header("location: dashboard.php");
            }
        }
    }
    $search_err = $search_keyword = $job_id = $apply_err = $employer_err = $employer_id = "" ;
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
        <title>Jobs</title>
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
                        <a class="nav-link" href="job_seeker_home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="job_seeker_job.php">Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="job_seeker_profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="job_seeker_membership.php">Membership</a>
                    </li>
                    <li class="nav-item">
          				<a class="nav-link" href="job_seeker_logout.php"> Log out </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div style="margin: 40px 75px; padding: 50px 75px;" class="row">

            <h2>Search Jobs</h2><br>
	
			<form style="padding: 50px;" action=" " method="post">

				<label style="padding: 20px 0px 0px 0px;"><b>Search By Keywords:</b></label>
				<input type="text" name="search_keyword"class="form-control" value="<?php echo $search_keyword; ?>">
                    <span class="help-block"><?php echo $search_err; ?></span>

				<label><b>Search By Category:</b></label>
					<select class="form-control" name="search_catagory">
						//<option>Select</option>
						<option value="Analytics">Analytics</option>
						<option value="Cashier"><li>Cashier</li></option>
						<option value="Software Developer"><li>Software Developer</li></option>
						<option value="Delivery Driver"><li>Delivery Driver</li></option>
						<option value="Customer Service"><li>Customer Service</li></option>
						<option value="Intern"><li>Intern</li></option>
						<option value="Finance"><li>Finance</li></option>
						<option value="Insurance"><li>Insurance</li></option>
						<option value="Design"><li>Design</li></option>
						<option value="Marketing"><li>Marketing</li></option>
						<option value="Administration"><li>Administration</li></option>
						<option value="Fashion"><li>Fashion</li></option>
						<option value ="Food Service"><li>Food Service</li></option>
					</select>
				<br>
				<button class="btn btn-primary" type="submit" name="search">Submit</button>
			</form>
		</div>

		<div style="margin: 20px 75px; padding: 20px 75px;" class="row">

<?php
	if (isset($_POST['search'])) 
	{

		if (!empty($_POST['search_keyword']) && !empty($_POST['search_catagory'])){
				echo "No records matching your query were found.";
			}

		elseif (!empty($_POST['search_keyword']) || !empty($_POST['search_catagory']))
		{
			$key = $_POST['search_keyword'];
			$industry_type = $_POST['search_catagory'];

			if ((!empty($_POST['search_keyword'])) && empty($_POST['search_catagory'])) {
				$sql = "SELECT job_id, employer_id, title, description, date_posted, nb_of_needed_employees, job_type_name FROM m_Job_post,m_Job_type
				WHERE m_Job_post.job_type_id = m_Job_type.job_type_id AND description LIKE '%$key%'";
			}

			if ((!empty($_POST['search_catagory'])) && empty($_POST['search_keyword'])) {
				$sql = "SELECT job_id, employer_id, title, description, date_posted, nb_of_needed_employees, job_type_name FROM m_Job_post,m_Job_type
				WHERE m_Job_post.job_type_id = m_Job_type.job_type_id AND m_Job_type.job_type_name = '$industry_type'";
			}

			
			if($result = mysqli_query($link,$sql)){

                    if(mysqli_num_rows($result) > 0){
                       echo"<table style=\"text-align: center; margin: 10px;padding: 10px;\" class=\"table table-striped\">
                            <thead>
                                <tr>
                                    <th scope=\"col\">Jobs ID</th>
                                    <th scope=\"col\">Employer ID</th>
                                    <th scope=\"col\">Title</th>
                                    <th scope=\"col\">Job Category</th>
                                    <th scope=\"col\">Opening Position</th>
                                    <th scope=\"col\">Description</th>
                                    <th scope=\"col\">Date of Posted</th>
                                </tr>
                            </thead>";
                        while($row = mysqli_fetch_array($result)){
                            echo "<tbody>";
                                echo "<tr>";
                                    echo "<td>" . $row['job_id'] . "</td>";
                                    echo "<td>" . $row['employer_id'] . "</td>";
                                    echo "<td>" . $row['title'] . "</td>";
                                    echo "<td>" . $row['job_type_name'] . "</td>";
                                    echo "<td>" . $row['nb_of_needed_employees'] . "</td>";
                                   	echo "<td>" . $row['description'] . "</td>";
                                   	echo "<td>" . $row['date_posted'] . "</td>";
                                echo "</tr>";
                            echo "</tbody>";                
                        }
                        echo "</table>";
       
                    } else{
                    echo "<b>No records matching your query were found.</b>";
                    }
            }

		}
	} 
?>
		</div>

		<div style="margin: 20px 75px 0px 75px; padding: 20px 75px 0px 75px;" class="row">

			<h2>Appling Jobs</h2><br><br>

			<form style="padding: 50px 50px 0px 50px;" action="" method="POST">
				
                 <label style="padding: 20px 0px 0px 0px;"><b>Job ID:</b></label>
                    <input type="text" name="job_id" class="form-control">
                  
                 <label style="padding: 20px 0px 0px 0px;"><b>Employer ID:</b></label>
                    <input type="text" name="employer_id" class="form-control" ><br>
    
                <button type="submit" class="btn btn-primary" name="apply_j"> Apply </button>
			</form>
		</div>

		
		<?php

		if(isset($_POST['apply_j'])) {

			$id = $_SESSION['id'];
			$membership = "";

			if (isset($_SESSION['membership'])){
  				if ($_SESSION['membership'] != NULL){
      				$membership = $_SESSION['membership'];                 
  				}
			}

			$job_id = $_POST['job_id'];
		
			if (isset($_POST['employer_id'])){
  				if ($_POST['employer_id'] != NULL){
      				$employer_id = $_POST['employer_id'];          
  				}
			}

            if(empty($_POST['id']) || empty($_POST['employer_id'])){
                echo "<div style=\"margin: 10px 75px; padding: 10px 75px;\" class=\"row\">
                <b>Please Enter Vaild Information</b>
                </div>";
                exit();
            }

			$sql = "SELECT COUNT(job_id) FROM m_Job_application WHERE job_seeker_id = '$id'";

			if($membership == 'basic'){
				echo "<div style=\"margin: 10px 75px; padding: 10px 75px;\" class=\"row\">
                <b>Basic Membership can not apply a job.</b>
                </div>";
				exit();
			}
			else {
				
				if( $sql >= 5 && $membership == 'prime'){
					echo "<div style=\"margin: 10px 75px; padding: 10px 75px;\" class=\"row\">
                			<b>Prime Membership can not apply more than 5 jobs.</b>
                		</div>";
				}
				else{
					$date = date('Y-m-d');
					$sql = "INSERT INTO m_Job_application (job_id, job_seeker_id, employer_id, date_applied)
							VALUES ('$job_id', '$id', '$employer_id','$date');";
				}
			}

			if(mysqli_multi_query($link, $sql)){
				echo "<div style=\"margin: 10px 75px; padding: 10px 75px;\" class=\"row\">
                			<b>Apply successfully</b>
                		</div>";
        	}
        	else{
        		echo "<div style=\"margin: 10px 75px; padding: 10px 75px;\" class=\"row\">
                			<b>Error: Not Apply.</b>
                		</div>";
            	//echo "Error:".$sql."<br>".mysqli_error($link);
                exit();
        	}
		}
		?>

	</body>
</html>