<?php
    $con = mysqli_connect("sxc353.encs.concordia.ca", "sxc353_1", "team2020", "sxc353_1");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>