<?php include 'employer_header.php' ?>
<title>Profile</title>
<?php include 'employer_navbar.php' ?>
<?php
$user_id = "";
$username = $_SESSION["username"];
$membership = "";
$email = "";
$sql = "SELECT id, membership, email FROM User WHERE username='$username'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        $user_id = $row['id'];
        $membership = $row['membership'];
        $email = $row['email'];
    }
}
$company = "";
$address = "";
$sql = "SELECT company_name, address FROM m_Employer WHERE user_id='$user_id'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        $company = $row['company_name'];
        $address = $row['address'];
    }
}
?>
<div class="mx-auto">
    <h2>Employer Profile</h2>
    <h5>Company Name: <?php echo $company ?></h5>
    <h5>Address: <?php echo $address ?></h5>
    <h5>Membership: <?php echo $membership ?></h5>
    <H5>Email: <?php echo $email ?></h5>
</div>
<?php include 'employer_footer.php' ?>