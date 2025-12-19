<?php 

    require_once '../config/conn.php';

    if($_SESSION['role'] == 1) {
        header('Location: ../index.php');
        exit();
    }

    if(isset($_GET['id'])) {

        $id_dispo = intval($_GET['id']);

        $del_stmt = mysqli_prepare($conn, 'DELETE FROM disponibilite WHERE id_disponibilite = ?');
        mysqli_stmt_bind_param($del_stmt, 'i', $id_dispo);

        if(mysqli_stmt_execute($del_stmt)) {
            header('Location: disponibilites.php');
            exit();
        }

        mysqli_stmt_close($del_stmt);

    }

?>