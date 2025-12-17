<?php

    $db_server = "localhost";
    $db_user = "phpmyadmin";
    $db_pass = "Youcode@2025";
    $db_name = "CoachPro";

    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

    if(!$conn) {
        die("Error in connecting to database " . mysqli_connect_error());
    }
?>