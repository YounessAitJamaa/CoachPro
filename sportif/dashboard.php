<?php
    require_once '../config/conn.php';
    require_once '../includes/auth_check.php';

    if($_SESSION['role'] != 1) {
        header('Location: ../index.php');
        exit();
    }

?>

<a href="../auth/logout.php">deconnexion</a>
