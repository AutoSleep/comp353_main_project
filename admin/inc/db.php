<?php
    $con = mysqli_connect("localhost:3306", "sxc353_1", "team2020", "sxc353_1");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>