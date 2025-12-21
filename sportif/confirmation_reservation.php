<?php
    require_once '../config/conn.php';
    require_once '../includes/auth_check.php';

    if ($_SESSION['role'] != 1) { 
        header('Location: ../index.php');
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $disp_id = $_GET['disp'] ?? null;

    if (!isset($disp_id)) {
        header('Location: reserver_seance.php');
        exit();
    }


    $sp_stmt = mysqli_prepare($conn, "SELECT id_sportif FROM sportif WHERE id_user = ?");
    mysqli_stmt_bind_param($sp_stmt, 'i', $user_id);
    mysqli_stmt_execute($sp_stmt);
    $sportif_res = mysqli_fetch_assoc(mysqli_stmt_get_result($sp_stmt));
    $id_sportif = $sportif_res['id_sportif'];

    
    /* Fetch disponibilité + coach info */
    $stmt = mysqli_prepare($conn, "SELECT d.date_disponibilite, d.heure_debut, d.heure_fin,
                                        c.id_coach,
                                        cd.id_discipline,
                                        u.nom, u.prenom
                                    FROM disponibilite d
                                    JOIN coach c ON d.id_coach = c.id_coach
                                    JOIN coach_discipline cd ON c.id_coach = cd.id_coach
                                    JOIN Utilisateur u ON c.id_user = u.id_user
                                    WHERE d.id_disponibilite = ?
                                    LIMIT 1
                        ");
    mysqli_stmt_bind_param($stmt, 'i', $disp_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $dispo = mysqli_fetch_assoc($result);

    if (!$dispo) {
        header('Location: reserver_seance.php');
        exit();
    }


    if (isset($_POST['submit'])) {

        $statut = 'en attente';

        $id_discipline = $dispo['id_discipline'];

        $insert_stmt = mysqli_prepare($conn, "INSERT INTO seance (date_seance, heure, statut, id_sportif, id_coach, id_discipline, id_disponibilite) VALUES (?, ?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($insert_stmt, 'sssiiii', 
            $dispo['date_disponibilite'], 
            $dispo['heure_debut'], 
            $statut, 
            $id_sportif, 
            $dispo['id_coach'], 
            $id_discipline,
            $disp_id
        );
        mysqli_stmt_execute($insert_stmt);

        
        $update_stmt = mysqli_prepare($conn, "UPDATE disponibilite SET statut = 'reserve' WHERE id_disponibilite = ?");
        mysqli_stmt_bind_param($update_stmt, 'i', $disp_id);
        mysqli_stmt_execute($update_stmt);

        mysqli_commit($conn);
        header('Location: reserver_seance.php?success=1');
        exit();
    }
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation réservation</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-white min-h-screen flex items-center justify-center">

<div class="max-w-lg w-full bg-slate-800/50 border border-slate-700 rounded-xl p-6">

    <h1 class="text-2xl font-bold mb-6 text-center">
        Confirmation de réservation
    </h1>

    <div class="space-y-4 mb-6">
        <div class="flex justify-between">
            <span class="text-slate-400">Coach</span>
            <span class="font-semibold"><?= htmlspecialchars($dispo['prenom'].' '.$dispo['nom']) ?></span>
        </div>

        <div class="flex justify-between">
            <span class="text-slate-400">Date</span>
            <span class="font-semibold">
                <?= date('Y M d', strtotime($dispo['date_disponibilite'])) ?>
            </span>
        </div>

        <div class="flex justify-between">
            <span class="text-slate-400">Heure</span>
            <span class="font-semibold text-orange-500">
                <?= date('H:i', strtotime($dispo['heure_debut'])) ?> 
                → 
                <?= date('H:i', strtotime($dispo['heure_fin'])) ?>
            </span>
        </div>
    </div>

    <form method="POST" class="flex gap-4">
        <input type="hidden" name="disp_id" value="<?= $disp_id ?>">

        <a href="coach_detail.php?id=<?= $dispo['id_coach'] ?>"
           class="flex-1 text-center border border-slate-600 rounded-lg py-2 hover:bg-slate-700">
            Annuler
        </a>

        <button type="submit"
                name="submit"
                class="flex-1 bg-orange-500 hover:bg-orange-400 text-slate-900 font-semibold rounded-lg py-2">
            Confirmer
        </button>
    </form>

</div>

</body>
</html>
