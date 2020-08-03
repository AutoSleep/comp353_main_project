<?php include 'employer_header.php' ?>
    <title>Profile</title>
<?php include 'employer_navbar.php' ?>
<?php

$username = $_SESSION['username'];
$company = $_REQUEST['company'];
$email = $_REQUEST['email'];
$address = $_REQUEST['address'];
$user_id = "";

$sql = "SELECT id FROM User WHERE username='$username'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        $user_id = $row['id'];
    }
}

$sql = "UPDATE m_Employer SET company_name='$company', address='$address' WHERE user_id='$user_id'";
if(mysqli_query($link, $sql)){
    $sql = "UPDATE User SET email='$email' WHERE id='$user_id'";
    if(mysqli_query($link, $sql)){
        
    } else {
        echo "ERROR: Could not execute $sql. " . mysqli_error($link);
    }
} else {
    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}
?>