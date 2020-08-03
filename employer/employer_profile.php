<?php include 'employer_header.php' ?>
<title>Profile</title>
<?php include 'employer_navbar.php' ?>
<?php
$user_id = "";
$username = $_SESSION["username"];
$membership = "";
$email = "";
$company = "";
$address = "";
$sql = "SELECT company_name, address, membership, email FROM m_Employer, User WHERE user_id=id AND username='$username'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        $company = $row['company_name'];
        $address = $row['address'];
        $membership = $row['membership'];
        $email = $row['email'];
    }
}
?>
<div class="mx-auto">
    <h2>Employer Profile</h2>
    <h5>Company Name: <?php echo $company ?></h5>
    <h5>Address: <?php echo $address ?></h5>
    <h5>Membership: <?php echo $membership ?></h5>
    <h5>Email: <?php echo $email ?></h5>
    <a class="btn btn-primary" href="employer_edit_profile.php" role="button">Edit Profile</a>
</div>
<?php include 'employer_footer.php' ?>