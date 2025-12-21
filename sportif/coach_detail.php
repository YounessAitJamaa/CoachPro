<?php 

    require_once '../config/conn.php';
    require_once '../includes/auth_check.php';

    if($_SESSION['role'] != 1) {
        header('Location: ../index.php');
        exit();
    }

    $user_id = $_SESSION['user_id'];

    $coach_id = $_GET['id'];

    // 1. Fetch Coach Main Info (Names, Stats)
    $card_stmt = mysqli_prepare($conn, 'SELECT c.*, u.nom AS coach_nom, u.prenom AS coach_prenom,
                                            AVG(a.note) AS moyenne_note,
                                            COUNT(DISTINCT a.id_avis) AS total_avis
                                    FROM coach c
                                    JOIN Utilisateur u ON c.id_user = u.id_user
                                    LEFT JOIN avis a ON c.id_coach = a.id_coach
                                    WHERE c.id_coach = ?   
                                    GROUP BY c.id_coach, u.nom, u.prenom');
    mysqli_stmt_bind_param($card_stmt, 'i', $coach_id);
    mysqli_stmt_execute($card_stmt);
    $coach = mysqli_fetch_assoc(mysqli_stmt_get_result($card_stmt));
    mysqli_stmt_close($card_stmt);

    // 2. Separate Query for Disciplines
    $disc_stmt = mysqli_prepare($conn, 'SELECT d.nom_discipline 
                                        FROM disciplines d
                                        JOIN coach_discipline cd ON d.id_discipline = cd.id_discipline
                                        WHERE cd.id_coach = ?');
    mysqli_stmt_bind_param($disc_stmt, 'i', $coach_id);
    mysqli_stmt_execute($disc_stmt);
    $disc_result = mysqli_stmt_get_result($disc_stmt);

    $disp_stmt = mysqli_prepare($conn, "
                                            SELECT id_disponibilite, date_disponibilite, heure_debut, heure_fin
                                            FROM disponibilite
                                            WHERE id_coach = ?
                                            ORDER BY date_disponibilite, heure_debut
                                        ");
    mysqli_stmt_bind_param($disp_stmt, 'i', $coach_id);
    mysqli_stmt_execute($disp_stmt);
    $disponibilites = mysqli_stmt_get_result($disp_stmt);



?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail du coach</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-white min-h-screen">

<!-- Added responsive padding and spacing -->
<div class="max-w-6xl mx-auto px-4 sm:px-6 py-6 sm:py-10">

    <!-- Back -->
    <a href="reserver_seance.php" class="text-orange-500 hover:text-orange-400 mb-4 sm:mb-6 inline-block text-sm sm:text-base">
        ← Retour
    </a>

    <!-- Enhanced responsive layout for coach header -->
    <div class="flex flex-col sm:flex-row gap-4 sm:gap-8 mb-6 sm:mb-10">
        <img
            src="https://images.unsplash.com/photo-1605296867304-46d5465a13f1"
            class="w-32 h-32 sm:w-40 sm:h-40 rounded-xl object-cover border border-slate-700 mx-auto sm:mx-0"
            alt="Coach"
        >

        <div class="text-center sm:text-left">
            <h1 class="text-2xl sm:text-3xl font-bold mb-2"><?= htmlspecialchars($coach['coach_prenom']) .' '. htmlspecialchars($coach['coach_nom']) ?></h1>
            <p class="text-slate-400 mb-4 text-sm sm:text-base">Coach sportif certifié</p>

            <!-- Made tags wrap and center on mobile -->
            <div class="flex flex-wrap gap-2 sm:gap-4 justify-center sm:justify-start">
                <?php while($row = mysqli_fetch_assoc($disc_result)): ?>
                    <span class="bg-orange-500/20 text-orange-400 px-3 py-1 rounded-full text-xs sm:text-sm">
                        <?= htmlspecialchars($row['nom_discipline']); ?>
                    </span>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

    <!-- Enhanced responsive grid for info cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6 mb-6 sm:mb-10">
        <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-4 sm:p-6 text-center sm:text-left">
            <p class="text-slate-400 text-xs sm:text-sm">Expérience</p>
            <p class="text-xl sm:text-2xl font-bold"><?= htmlspecialchars($coach['experience']); ?> ans</p>
        </div>
        <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-4 sm:p-6 text-center sm:text-left">
            <p class="text-slate-400 text-xs sm:text-sm">Séances réalisées</p>
            <p class="text-xl sm:text-2xl font-bold"><?= htmlspecialchars($coach['total_avis']); ?>+</p>
        </div>
        <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-4 sm:p-6 text-center sm:text-left">
            <p class="text-slate-400 text-xs sm:text-sm">Note moyenne</p>
            <p class="text-xl sm:text-2xl font-bold">⭐ <?= htmlspecialchars($coach['moyenne_note'] ?? 0); ?> / 5</p>
        </div>
    </div>

    <!-- Responsive padding and text sizing -->
    <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-4 sm:p-6 mb-6 sm:mb-10">
        <h2 class="text-lg sm:text-xl font-semibold mb-3">À propos</h2>
        <p class="text-slate-300 leading-relaxed text-sm sm:text-base">
            <?= htmlspecialchars($coach['biographie']); ?>
        </p>
    </div>
<div class="bg-slate-800/50 border border-slate-700 rounded-xl p-6 mb-10">
    <h2 class="text-xl font-semibold text-white mb-6">Disponibilités</h2>
    
    <?php if (mysqli_num_rows($disponibilites) === 0): ?>
        <div class="flex flex-col items-center justify-center py-12">
            <div class="w-16 h-16 bg-slate-700/50 rounded-full flex items-center justify-center mb-4">
                <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
            <p class="text-slate-400">Aucune disponibilité pour le moment.</p>
        </div>
    <?php else: ?>
        <div class="space-y-3">
            <?php while ($d = mysqli_fetch_assoc($disponibilites)): ?>
                <div class="flex items-center justify-between bg-slate-900/50 border border-slate-700/30 rounded-lg p-5 hover:border-orange-500/50 transition-all duration-300">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-orange-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-white"><?= htmlspecialchars($d['date']) ?></p>
                            <div class="flex items-center gap-2 text-slate-400 text-sm mt-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span><?= htmlspecialchars($d['heure_debut']) ?> – <?= htmlspecialchars($d['heure_fin']) ?></span>
                            </div>
                        </div>
                    </div>
                    <a href="confirmation_reservation.php?disp=<?= $d['id_disponibilite'] ?>"
                       class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold rounded-lg hover:shadow-lg hover:shadow-orange-500/20 transition-all duration-300 hover:scale-105">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Réserver
                    </a>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</div>



    <!-- Responsive spacing for reviews -->
    <div class="mb-6 sm:mb-10">
        <h2 class="text-lg sm:text-xl font-semibold mb-4 sm:mb-6">Avis des sportifs</h2>

        <div class="space-y-3 sm:space-y-4">
            <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-4 sm:p-5">
                <div class="flex flex-col sm:flex-row sm:justify-between gap-2 sm:gap-0 mb-2">
                    <p class="font-medium text-sm sm:text-base">Ahmed</p>
                    <span class="text-orange-400 text-sm">⭐⭐⭐⭐⭐</span>
                </div>
                <p class="text-slate-300 text-xs sm:text-sm">
                    Excellent coach, très motivant et professionnel.
                </p>
            </div>

            <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-4 sm:p-5">
                <div class="flex flex-col sm:flex-row sm:justify-between gap-2 sm:gap-0 mb-2">
                    <p class="font-medium text-sm sm:text-base">Sara</p>
                    <span class="text-orange-400 text-sm">⭐⭐⭐⭐</span>
                </div>
                <p class="text-slate-300 text-xs sm:text-sm">
                    Très bonne expérience, je recommande.
                </p>
            </div>
        </div>
    </div>

    <!-- Responsive form styling -->
    <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-4 sm:p-6">
        <h2 class="text-lg sm:text-xl font-semibold mb-4">Laisser un avis</h2>

        <form class="space-y-4">
            <div>
                <label class="block text-xs sm:text-sm mb-1">Note</label>
                <select
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 sm:px-4 py-2 focus:ring-2 focus:ring-orange-500 text-sm sm:text-base"
                >
                    <option>⭐ 5</option>
                    <option>⭐ 4</option>
                    <option>⭐ 3</option>
                    <option>⭐ 2</option>
                    <option>⭐ 1</option>
                </select>
            </div>

            <div>
                <label class="block text-xs sm:text-sm mb-1">Commentaire</label>
                <textarea
                    rows="4"
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 sm:px-4 py-2 focus:ring-2 focus:ring-orange-500 text-sm sm:text-base"
                    placeholder="Votre avis..."
                ></textarea>
            </div>

            <button
                type="submit"
                class="w-full sm:w-auto bg-orange-500 hover:bg-orange-400 text-slate-900 font-semibold px-6 py-2 rounded-lg transition text-sm sm:text-base"
            >
                Publier l'avis
            </button>
        </form>
    </div>

</div>

</body>
</html>
