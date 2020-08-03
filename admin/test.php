<?php

session_start();
include 'inc/db.php';

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


    <?php
    include 'inc/header.php';


    function handleNull($input){
        if (empty($input)){
            echo " - ";
        }else{
            echo $input;
        }
    }

    function oc($input)
    {
        if ($input == 1) {
            echo 'Open';
        } else {
            echo 'close';
        }
    }

    function offer($input)
    {
        if ($input == 1) {
            echo "Yes";
        } else {
            echo "No";
        }
    };

    ?>



    <div class="container" style="background-color: #cccccc; border-radius:10px">
        <h2 class="text-center">User Account</h2>
        <table class="table text-center">
            <thead>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">membership</th>
                <th scope="col">Account Balance</th>
                <th scope="col">Valid Date</th>
                <th scope="col">Active Satus</th>
                <th scope="col">Action</th>
            </thead>
            <tbody>
                <?php
                $userData =      mysqli_query($con, "Select User.id,
                                            User.username,
                                            User.membership,
                                            User.account_balance,
                                            User.date_valid_to,
                                            User.is_active
                                        FROM User
                                        WHERE User.user_type = 'Employer';");

                while ($row = mysqli_fetch_array($userData)) {
                ?>
                    <tr>
                        <td scope="col"> <?php echo $row['id']; ?> </td>
                        <td scope="col"> <?php echo $row['username']; ?> </td>
                        <td scope="col"> <?php echo $row['membership']; ?> </td>
                        <td scope="col"> $ <?php echo $row['account_balance']; ?> </td>
                        <td scope="col"> <?php echo $row['date_valid_to']; ?> </td>
                        <td scope="col"> <?php echo oc($row['is_active']); ?> </td>
                        <td scope="col"> <a type="button" class="btn btn-warning" href="">Active</a>
                            <a type="button" class="btn btn-danger" href="">Deactive</a> </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>



        <h2 class="text-center">Employer Account</h2>
        <table class="table text-center ">
            <thead>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">membership</th>
                <th scope="col">Account Balance</th>
                <th scope="col">Valid Date</th>
                <th scope="col">Active Satus</th>
                <th scope="col">Action</th>
            </thead>
            <tbody>
                <?php

                $empolyerData =  mysqli_query($con, "Select User.id,
                                                            User.username,
                                                            User.membership,
                                                            User.account_balance,
                                                            User.date_valid_to,
                                                            User.is_active
                                                    FROM User
                                                    WHERE User.user_type = 'Job_seeker';");
                while ($row = mysqli_fetch_array($empolyerData)) {
                ?>
                    <tr>
                        <td scope="col"> <?php echo $row['id']; ?> </td>
                        <td scope="col"> <?php echo $row['username']; ?> </td>
                        <td scope="col"> <?php echo $row['membership']; ?> </td>
                        <td scope="col"> $ <?php echo $row['account_balance']; ?> </td>
                        <td scope="col"> <?php echo $row['date_valid_to']; ?> </td>
                        <td scope="col"> <?php echo oc($row['is_active']); ?> </td>
                        <td scope="col"> <a type="button" class="btn btn-warning" href="">Active</a>
                            <a type="button" class="btn btn-danger" href="">Deactive</a> </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="container" style="background-color: #cccccc; border-radius:10px">

        
    </div>



    <div class="container" style="background-color: #cccccc; border-radius:10px">

        <h2 class="text-center">User & Empolyer Activity</h2>
        <H4 class="text-left" style="text-decoration: underline;">Empolyer Activity</H4>
        <table class="table text-center ">
            <thead>
                <th scope="col">Job ID</th>
                <th scope="col">Employer ID</th>
                <th scope="col">Company Name</th>
                <th scope="col">Job Title</th>
                <th scope="col">Job Type</th>
                <th scope="col">Number of Person needed</th>
                <th scope="col">Job Posted Date</th>
                <th scope="col">Job Status</th>

            </thead>
            <tbody>
                <?php

                $eActivityData = mysqli_query($con, "SELECT DISTINCT (m_Job_post.job_id),
                                                        m_Employer.user_id,
                                                        m_Employer.company_name,
                                                        m_Job_post.title,
                                                        m_Job_type.job_type_name,
                                                        m_Job_post.nb_of_needed_employees,
                                                        m_Job_post.date_posted,
                                                        m_Job_post.is_active
                                                    FROM User,
                                                    m_Job_post,
                                                    m_Employer,
                                                    m_Job_type
                                                    Where user_type = 'Employer'
                                                    AND m_Job_post.employer_id = m_Employer.user_id
                                                    AND m_Job_type.job_type_id = m_Job_post.job_type_id;");

                while ($row = mysqli_fetch_array($eActivityData)) {
                ?>
                    <tr>
                        <td scope="col"> <?php echo $row['job_id']; ?> </td>
                        <td scope="col"> <?php echo $row['user_id']; ?> </td>
                        <td scope="col"> <?php echo handleNull($row['company_name']); ?> </td>
                        <td scope="col"> <?php echo handleNull($row['title']); ?> </td>
                        <td scope="col"> <?php echo handleNull($row['job_type_name']); ?> </td>
                        <td scope="col"> <?php echo handleNull($row['nb_of_needed_employees']); ?> </td>
                        <td scope="col"> <?php echo handleNull($row['date_posted']); ?> </td>
                        <td scope="col"> <?php echo oc($row['is_active']); ?> </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <H4 class="text-left" style="text-decoration: underline;">User Activity</H4>
        <table class="table text-center ">
            <thead>
                <th scope="col">User ID</th>
                <th scope="col">Job ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Company Name</th>
                <th scope="col">Job Title</th>
                <th scope="col">Job Status</th>
                <th scope="col">Job Applied Date</th>
                <th scope="col">Accepted</th>

            </thead>
            <tbody>
                <?php
                $uActivityData = mysqli_query($con, "SELECT m_Job_seeker.user_id,
                                                        m_Job_application.job_id,
                                                        m_Job_seeker.first_name,
                                                        m_Job_seeker.last_name,
                                                        m_Employer.company_name,
                                                        m_Job_post.title,
                                                        m_Job_post.is_active,
                                                        m_Job_application.date_applied,
                                                        m_Job_application.job_accepted

                                                    FROM m_Job_application,
                                                    m_Job_seeker,
                                                    m_Job_post,
                                                    m_Employer
                                                    WHERE m_Job_seeker.user_id = m_Job_application.job_seeker_id
                                                    AND m_Job_post.job_id = m_Job_application.job_id
                                                    And m_Employer.user_id = m_Job_post.employer_id;
                                                    ;");
                while ($row = mysqli_fetch_array($uActivityData)) {
                ?>
                    <tr>
                        <td scope="col"> <?php echo $row['user_id']; ?> </td>
                        <td scope="col"> <?php echo handleNull($row['job_id']); ?> </td>
                        <td scope="col"> <?php echo handleNull($row['first_name']); ?> </td>
                        <td scope="col"> <?php echo handleNull($row['last_name']); ?> </td>
                        <td scope="col"> <?php echo handleNull($row['company_name']); ?> </td>
                        <td scope="col"> <?php echo handleNull($row['title']); ?> </td>
                        <td scope="col"> <?php echo oc($row['is_active']); ?> </td>
                        <td scope="col"> <?php echo handleNull($row['date_applied']); ?> </td>
                        <td scope="col"> <?php echo offer($row['job_accepted']); ?> </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>






        <a href="link.php?username=1">link</a>


    </div>
    <?php mysqli_close($con); ?>
    <?php include 'inc/footer.php' ?>
</body>

</html>