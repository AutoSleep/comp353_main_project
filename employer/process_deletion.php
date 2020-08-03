<?php include 'employer_header.php' ?>
<title>Profile</title>
<?php include 'employer_navbar.php' ?>
<?php
$username = $_SESSION['username'];

if($_REQUEST['delete'] == "Yes"){
    $sql = "DELETE m_Job_post FROM User, m_Job_post WHERE username='$username' AND employer_id=id;
    DELETE m_Employer FROM User, m_Employer WHERE username='$username' AND user_id=id;
    DELETE User FROM User WHERE username='$username';";
    
    if(mysqli_multi_query($link, $sql)){
        header('location: logout.php');
    } else{
        echo "ERROR: Could not execute $sql. " . mysqli_error($link);
    }
}

?>