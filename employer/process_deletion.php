<?php 
session_start();
include 'config.php';

$username = $_SESSION['username'];

if($_REQUEST['delete'] == "Yes"){
    $sql = "DELETE m_Employer FROM User, m_Employer WHERE username='$username' AND user_id=id;
    DELETE User FROM User WHERE username='$username';";
    if(mysqli_multi_query($link, $sql)){
        header('location: logout.php');
    } else{
        echo "ERROR: Could not execute $sql. " . mysqli_error($link);
    }
}
?>