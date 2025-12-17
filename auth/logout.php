<?php 

    require_once '../config/conn.php';

    session_start();
    session_unset();
    session_destroy();

    header('Location: login.php');
    exit();

?>