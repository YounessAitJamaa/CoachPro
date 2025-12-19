<?php 

    require_once '../config/conn.php';

    if($_SESSION['role'] == 1) {
        header('Location: ../index.php');
        exit();
    }

    $user_id = $_SESSION['user_id'];

    $stmt = mysqli_prepare($conn, 'SELECT s.*, u.nom AS client_nom, u.prenom AS client_prenom ,d.nom_discipline AS nom_discipline
                                    FROM seance s
                                    JOIN coach c ON s.id_coach = c.id_coach
                                    JOIN sportif sp ON s.id_sportif = sp.id_sportif
                                    JOIN Utilisateur u ON sp.id_user = u.id_user
                                    JOIN disciplines d ON s.id_discipline = d.id_discipline
                                    WHERE c.id_user = ?
                                ');
    mysqli_stmt_bind_param($stmt, 'i', $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);


?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Séances - CoachPro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen text-slate-200">

    <?php include '../includes/header.php' ?>

    <div class="container mx-auto px-6 py-12">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h1 class="text-3xl font-bold text-white">Historique des <span class="text-orange-500">Séances</span></h1>
                <p class="text-slate-400 mt-1">Consultez et gérez l'ensemble de vos réservations passées et futures.</p>
            </div>
            <a href="dashboard_coach.php" class="inline-flex items-center gap-2 text-slate-400 hover:text-white transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Retour au Dashboard
            </a>
        </div>

        <div class="bg-slate-800/50 backdrop-blur-md border border-slate-700/50 rounded-2xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-700/30 text-slate-300 uppercase text-xs font-semibold tracking-wider">
                            <th class="px-6 py-4">Client</th>
                            <th class="px-6 py-4">Discipline</th>
                            <th class="px-6 py-4">Date</th>
                            <th class="px-6 py-4">Heure</th>
                            <th class="px-6 py-4 text-right">Statut</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-700/50">
                        <?php while($row = mysqli_fetch_assoc($result)): ?>
                            <tr class="hover:bg-slate-700/20 transition-colors group">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <span class="font-medium text-white"><?= htmlspecialchars($row['client_nom']) .' '. htmlspecialchars($row['client_prenom']) ?></span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-blue-500/10 text-blue-400 text-xs rounded-full border border-blue-500/20"><?= htmlspecialchars($row['nom_discipline']) ?></span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm">
                                        <div class="text-white"><?= date('d M Y', strtotime($row['date_seance'])) ?></div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm">
                                        <div class="text-white"><?= htmlspecialchars($row['heure']) ?></div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <?php 
                                        $status = $row['statut'];
                                        if($status = 'accepte') {
                                            $colorStatut = 'text-green-500';
                                            $colorDot = 'bg-green-500';
                                        }
                                        elseif ($status = 'en attente'){
                                            $colorStatut = 'text-orange-500';
                                            $colorDot = 'bg-oreange-500';
                                        }
                                        elseif ($status = 'annule'){
                                            $colorStatut = 'text-red-500';
                                            $colorDot = 'bg-red-500';
                                        }
                                    ?>
                                    <button class="text-slate-400 hover:text-white p-2 hover:bg-slate-600 rounded-lg transition-all">
                                        <span class="flex items-center gap-1.5 <?= $colorStatut ?> text-sm">
                                            <span class="w-2 h-2 rounded-full <?= $colorDot ?> animate-pulse"></span>
                                            <?= htmlspecialchars($row['statut']) ?>
                                        </span>
                                    </button>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        </div>

</body>
</html>