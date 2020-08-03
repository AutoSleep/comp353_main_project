<?php

session_start();

$conn = mysqli_connect("localhost:3306", "sxc353_1", "team2020", "sxc353_1");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "successfuly connected  ";
}

$sql = 'SELECT * FROM m_Job_seeker;';

$result = mysqli_query($conn, $sql);

$userdata = mysqli_fetch_array($result);

mysqli_free_result($result);

mysqli_close($conn);

print_r($userdata);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <?php include('template/navbar.php') ?>


    <div class="container">
        <h2 class="text-center">User_Account</h2>
        <table class="table text-center">
            <thead>
                <th scope="col">User_id</th>
                <th scope="col">First_name</th>
                <th scope="col">Last_name</th>
                <th scope="col">Education</th>
                <th scope="col">Action</th>
            </thead>
            <tbody>   
                <?php
                
                // $result = mysqli_query($conn,"SELECT * FROM m_Job_seeker;");


                while($row = mysqli_fetch_array($result))
                    {
                    echo "<tr>";
                    echo "<td>" . $row['user_id'] . "</td>";
                    echo "<td>" . $row['first_name'] . "</td>";
                    echo "<td>" . $row['last_name'] . "</td>";
                    echo "<td>" . $row['education'] . "</td>";
                    echo "<td>" . $row['work_experience'] . "</td>";
                    echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>




    <?php include('template/footer.php') ?>
</body>

</html>