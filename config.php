<?php 
    
    $link = mysqli_connect("sxc353.encs.concordia.ca", "sxc353_1", "team2020", "sxc353_1");

    if (!$link) {
        die("Connection failed: ". mysqli_connect_error());
    }
?>