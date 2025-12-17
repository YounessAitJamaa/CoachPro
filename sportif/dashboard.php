<?php
    require_once '../config/conn.php';
    require_once '../includes/auth_check.php';

    if($_SESSION['role'] != 1) {
        header('Location: ../index.php');
        exit();
    }

    $id_user = $_SESSION['user_id'];

    $stmt = mysqli_prepare($conn, 'SELECT nom, prenom FROM Utilisateur WHERE id_user = ?');
    mysqli_stmt_bind_param($stmt, 'i', $id_user);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $nom, $prenom);
    mysqli_stmt_fetch($stmt);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Sportif - CoachPro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen">

    <!-- Added modern navigation header -->
    <nav class="bg-slate-900/50 backdrop-blur-sm border-b border-slate-700/50">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <span class="text-2xl font-bold text-white">Coach<span class="text-orange-500">Pro</span></span>
                </div>
                <a href="../auth/logout.php" class="text-slate-300 hover:text-white transition-colors flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    Déconnexion
                </a>
            </div>
        </div>
    </nav>

    <!-- Modern dashboard content with cards -->
    <div class="container mx-auto px-6 py-8">
        <!-- Welcome Section -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-white mb-2">
                Bienvenue, <span class="text-orange-500"><?= htmlspecialchars($prenom) ?> <?= htmlspecialchars($nom) ?></span> !
            </h1>
            <p class="text-slate-400">Gérez vos séances et réservations en toute simplicité</p>
        </div>

        <!-- Quick Actions -->
        <div class="grid md:grid-cols-3 gap-6 mb-8">
            <a href="reserver_seance.php" class="group bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl p-6 hover:shadow-lg hover:shadow-orange-500/20 transition-all duration-300 hover:scale-105">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center group-hover:bg-white/30 transition-colors">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-white font-semibold text-lg">Réserver une séance</h3>
                        <p class="text-orange-100 text-sm">Trouvez votre coach</p>
                    </div>
                </div>
            </a>

            <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700/50 rounded-xl p-6">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-blue-500/20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-white font-semibold text-lg">0</h3>
                        <p class="text-slate-400 text-sm">Séances programmées</p>
                    </div>
                </div>
            </div>

            <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700/50 rounded-xl p-6">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-green-500/20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-white font-semibold text-lg">0</h3>
                        <p class="text-slate-400 text-sm">Séances complétées</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reservations Section -->
        <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700/50 rounded-xl p-6">
            <div class="flex items-center gap-3 mb-6">
                <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
                <h2 class="text-2xl font-bold text-white">Mes réservations</h2>
            </div>

            <div class="bg-slate-900/50 rounded-lg p-8 text-center">
                <div class="w-16 h-16 bg-slate-800 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                    </svg>
                </div>
                <p class="text-slate-400 mb-4">Vous n'avez pas encore de réservations.</p>
                <a href="reserver_seance.php" class="inline-flex items-center gap-2 text-orange-500 hover:text-orange-400 font-medium transition-colors">
                    Réserver votre première séance
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>

</body>
</html>

