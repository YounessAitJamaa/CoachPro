<?php
require_once '../config/conn.php';
require_once '../includes/auth_check.php';

if (isset($_POST['id_seance'], $_POST['action'])) {
    $id_seance = intval($_POST['id_seance']);
    $action = $_POST['action']; 
    $user_id = $_SESSION['user_id'];

    
    $check_stmt = mysqli_prepare($conn, "SELECT s.id_disponibilite FROM seance s 
                                         JOIN coach c ON s.id_coach = c.id_coach 
                                         WHERE s.id_seance = ? AND c.id_user = ?");
    mysqli_stmt_bind_param($check_stmt, 'ii', $id_seance, $user_id);
    mysqli_stmt_execute($check_stmt);
    $res = mysqli_stmt_get_result($check_stmt);
    $seance = mysqli_fetch_assoc($res);

    if ($seance) {
        mysqli_begin_transaction($conn);
        try {
            
            $upd_stmt = mysqli_prepare($conn, "UPDATE seance SET statut = ? WHERE id_seance = ?");
            mysqli_stmt_bind_param($upd_stmt, 'si', $action, $id_seance);
            mysqli_stmt_execute($upd_stmt);

            if ($action === 'refuse') {
                $lib_stmt = mysqli_prepare($conn, "UPDATE disponibilite SET statut = 'libre' WHERE id_disponibilite = ?");
                mysqli_stmt_bind_param($lib_stmt, 'i', $seance['id_disponibilite']);
                mysqli_stmt_execute($lib_stmt);
            }

            mysqli_commit($conn);
            header("Location: dashboard.php?msg=success");
        } catch (Exception $e) {
            mysqli_rollback($conn);
            header("Location: dashboard.php?msg=error");
        }
    }
    exit();
}