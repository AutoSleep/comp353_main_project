<?php
session_start();
include "template/db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="background-color: #cccccc; border-radius:10px">
        <h2 class="text-center">User Account</h2>
        <table class="table text-center">
            <thead>
                <th scope="col">Job ID</th>
                <th scope="col">Job Title</th>
                <th scope="col">Apply date</th>
                <th scope="col">Job Offered</th>
                <th scope="col">Acceptance</th>
                <th scope="col">Action</th>
            </thead>
            <tbody>
                <?php

                function display($inputs, $msg1, $msg2)
                {
                    if ($inputs == 1) {
                        echo $msg1;
                    } else {
                        echo $msg2;
                    }
                }

                $data =      mysqli_query($con, "SELECT m_Job_application.job_id,
                                                            job_seeker_id,
                                                            title,
                                                            date_applied,
                                                            m_Job_application.job_offered,
                                                            job_accepted
                                                    FROM m_Job_post, m_Job_application
                                                    WHERE m_Job_post.job_id = m_Job_application.job_id AND m_Job_application.job_seeker_id =13;");


                while ($row = mysqli_fetch_array($data)) {
                    $job_seeker =  $row['job_seeker_id'];
                    $job_id = $row['job_id'];
                ?>
                    <tr>

                        <td scope="col"> <?php echo $job_id; ?> </td>
                        <td scope="col"> <?php echo $row['title']; ?> </td>
                        <td scope="col"> <?php echo $row['date_applied']; ?> </td>
                        <td scope="col"> <?php echo display($row['job_offered'], 'Offered', 'Not yet'); ?> </td>
                        <td scope="col"> <?php echo display($row['job_accepted'], 'Accept', '-'); ?> </td>

                        <td scope="col">
                            <?php if ($row['job_offered'] == 1) { ?>
                                <a type="button" class="btn btn-warning" 
                                href="accept.php?job_id=<?php echo $job_id ?>&job_seeker=<?php echo $job_seeker ?>">
                                Accept This Offer</a>
                            <?php
                            }
                            ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>