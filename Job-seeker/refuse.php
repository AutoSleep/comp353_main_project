<?php
session_start();
include "template/db.php";

$job_seeker = $_GET['job_seeker'];
$job_id = $_GET['job_id'];
$sql = "Update m_Job_application
        SET job_accepted = 0
        Where job_seeker_id = $job_seeker AND job_id = $job_id;";

if (mysqli_query($con, $sql)) {
?>

<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Active User</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>

    <body>
        <div class="container text-center">
            <div style="margin-top:100px">
                <div class="alert alert-warning" role="alert">
                    <?php echo "Refuse this offer successfully"; ?>
                </div>
            <?php } else { ?>
            <?php echo "Error updating record: " . mysqli_error($conn);
        } ?>
            <br>
            <a href="dashboard.php">Back to Page</a>
            </div>
            <?php mysqli_close($con); ?>
        </div>
    </body>

    </html>