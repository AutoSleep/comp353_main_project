<?php include 'db.php' ?>

<?php
$id = $_GET["id"];

$sql = "UPDATE User
        SET is_active = 0
        WHERE User.id = $id;";

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
                    <?php echo "The Account of User ID ( " . $id . " ) has been deactivated successfully"; ?>
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