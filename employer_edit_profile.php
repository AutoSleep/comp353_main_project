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
$sql = "SELECT company_name, address, membership, email FROM m_Employer, User WHERE username='$username' AND user_id=id";
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
    <form action="process_profile_form.php" method="post">
        <div class="form-group">
            <label for="company">Company</label>
            <input type="text" class="form-control" name="company" id="company" placeholder="<?php echo $company ?>">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" id="address" placeholder="<?php echo $address ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="<?php echo $email ?>">
        </div>
        <button class="btn btn-primary" href="employer_profile.php" type="submit">Save</button>
    </form>
</div>
<?php include 'employer_footer.php' ?>