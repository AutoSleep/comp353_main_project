<?php 
    
    $link = mysqli_connect("localhost:3306", "sxc353_1", "team2020", "sxc353_1");

    if (!$link) {
        die("Connection failed: ". mysqli_connect_error());
    }
?>