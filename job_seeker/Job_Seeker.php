<?php
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
        <title>Employee Home</title>
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

        <div  class="container">

        <div style="margin: 40px 0; padding: 50px 0;" class="row">

    <div class="col">

    <h3 class="myStyle">Account Information</h3>

	<?php

	//Need to change id to session id
    $id = 100;

    $sql = "SELECT username, password, membership,email,account_balance,date_valid_to, auto_withdrawal, method_of_payment  FROM User Where id = '$id'";
	$result = mysqli_query($link,$sql);

	echo "<table style=\"text-align: center; margin: 10px;padding: 10px;\" class=\"table table-striped\">
        <thead>
            <tr>
                <th scope=\"col\">Username</th>
                <th scope=\"col\">Password</th>
                <th scope=\"col\">Membership</th>
            </tr>
        </thead>";

	while($row = mysqli_fetch_array($result)){
		echo "<tbody>";
			echo "<tr>";
				echo "<td>" . $row['username'] . "</td>";
				echo "<td>" . $row['password'] . "</td>";
				echo "<td>" . $row['membership'] . "</td>";
			echo "</tr>";
		echo "</tbody>";

		echo "<thead>
            	<tr>
                	<th scope=\"col\">E-mail</th>
                	<th scope=\"col\">Account Balance</th>
                	<th scope=\"col\">Valid of Date</th>
            	</tr>
        	</thead>";
        
		echo "<tbody>";
			echo "<tr>";
				echo "<td>" . $row['email'] . "</td>";
				echo "<td>" . $row['account_balance'] . "</td>";
				echo "<td>" . $row['date_valid_to'] . "</td>";
			echo "</tr>";
		echo "</tbody>";

		echo "
		<thead>
            <tr>
                <th scope=\"col\">Method of Payment</th>
                <th scope=\"col\">Method of Withdrwa</th>
            </tr>
        </thead>";
        
		echo "<tbody>";
			echo "<tr>";
				echo "<td>" . $row['method_of_payment'] . "</td>";
				echo "<td>" . $row['auto_withdrawal'] . "</td>";
			echo "</tr>";
		echo "</tbody>";
		}
	echo "</table>";
	mysqli_close($link);
	?>

    </div>

    <div class="col">
         <h3 class="myStyle">Applied Jobs</h3>

    <table style="text-align: center; margin: 10px;padding: 10px;" class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Job ID</th>
                <th scope="col">Job Status</th>
                <th scope="col">Date</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>XXX</td>
                <td>XXX</td>
                <td>XXX</td>
            </tr>
        </tbody>
    </table>
    </div>

    </div>

</div>
    </body>
</html>
