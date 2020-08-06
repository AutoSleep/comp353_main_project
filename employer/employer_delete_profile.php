<?php include 'employer_header.php' ?>
<title>Profile</title>
<?php include 'employer_navbar.php' ?>

<form action="process_deletion.php" method="post">
    <div class="form-group">
        <label for="delete">Are you sure you want to delete your account?</label>
        <select class="form-control" name="delete" id="delete"">
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Confirm">
    </div>
</form>