<?php
	session_start();

	if(!isset($_SESSION['username'] || $_SESSION['role'] = "Job_seeker")) 
	{
  		header("Location: login_updated.php");
  		exit();
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	
</head>
<body>
	
	<?php 
		$sql = "SELECT * FROM job_post WHERE ;";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);

		if($resultCheck > 0){
			while($row = mysqli_fetch_assoc($result)){
				echo $row['job_id']."<br>";

			}
		}

	?>
	<form action="search_job_search.php" method="post">
		<label> Search Jobs</label>
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
</body>
</html>