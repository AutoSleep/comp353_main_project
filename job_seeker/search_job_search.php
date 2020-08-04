<?php
	session_start();

	if(!isset($_SESSION['username'] || $_SESSION['role'] = "Job_seeker")) 
	{
  		header("Location: login_updated.php");
  		exit();
	}
	include 'config.php';

	if (isset($_POST['search_keyword'])|| isset($_POST['search_catagory']))) 
	{
		if (!empty($_POST['search_keyword']) || !empty($_POST['search_catagory']))
		{
			$key = $_POST['search_keyword'];
			$industry_type = $_POST['search_catagory'];

			$query = "SELECT job_id, title, description, status, date_posted, job_type_name,
				FROM m_Job_post, m_Job_type
				WHERE m_Job_post.job_type_name = m_Job_type.job_type_name AND m_Job_post.job_type_id IN(SELECT job_type_id 
					FROM m_Job_type 
					WHERE job_type_name = '$industry_type') OR 
					decription LIKE '%key%'";

			$query_search = mysql_query($query);

				echo '<table border="1">
								<tr>
									<td><center><b>Job_ID</center></b></td>
									<td><center><b>Title</center></b></td>
									<td><center><b>Description</b></center></td>
									<td><center><b>Key Status</b></center></td>
									<td><center><b>Date_posted</b></center></td>
									<td><center><b>Job_type_name</b></center></td>
								</tr>
							</table>';

			$query_rows_num = mysql_num_rows($query_search);
			if ($query_rows_num > 0)
			{
				while($query_search_result = mysql_fetch_array($query_search))
				{
					echo '<table border="1">
								<tr>
									<td><center>'.$query_search_result['job_id'].'</center></td>
									<td><center>'.$query_search_result['title'].'</center></td>
									<td><center>'.$query_search_result['description'].'</center></td>
									<td><center>'.$query_search_result['status'].'</center></td>
									<td><center>'.$query_search_result['date_posted'].'</center></td>
									<td><center>'.$query_search_result['job_type_name'].'</center></td>
									
								</tr>
							</table>';
				}
			}
			else
			{
				echo 'No result Found. Search with different keywords or catagory.'
			}

		}
	} 
?>

<div>
	<form action="apply.php" method="get">
		<input type="text" name="job_id">
		<?php 
            if(isset($_SESSION["id_user"]) && empty($_SESSION['companyLogged'])) { ?>
            <div><br>
              <a href="apply.php?id=<?php echo $query_search_result['job_id']; ?>" class="btn btn-success btn-flat margin-top-50">Apply</a>
            </div>
            <?php } ?>
	</form>
</div>