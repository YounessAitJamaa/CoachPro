<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Avis reçus</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-white min-h-screen">
    
    <div class="max-w-5xl mx-auto px-6 py-10">

        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-bold">Avis des sportifs</h1>
            <a href="dashboard.php" class="text-slate-400 hover:text-white transition">
                ← Retour au dashboard
            </a>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-6">
                <p class="text-slate-400 text-sm">Note moyenne</p>
                <p class="text-3xl font-bold text-orange-500 mt-2">4.6 ⭐</p>
            </div>

            <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-6">
                <p class="text-slate-400 text-sm">Total avis</p>
                <p class="text-3xl font-bold mt-2">18</p>
            </div>

            <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-6">
                <p class="text-slate-400 text-sm">Dernier avis</p>
                <p class="mt-2 text-sm text-slate-300">Il y a 2 jours</p>
            </div>
        </div>

        <!-- Reviews List -->
        <div class="space-y-6">

            <!-- Review Card -->
            <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-6">
                <div class="flex items-center justify-between mb-3">
                    <div>
                        <h3 class="font-semibold text-lg">Yassine B.</h3>
                        <p class="text-xs text-slate-400">12 septembre 2025</p>
                    </div>
                    <div class="text-orange-400 text-lg">
                        ⭐⭐⭐⭐⭐
                    </div>
                </div>
                <p class="text-slate-300 leading-relaxed">
                    Excellent coach ! Très à l’écoute et les séances sont bien adaptées à mes objectifs.
                </p>
            </div>

            <!-- Review Card -->
            <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-6">
                <div class="flex items-center justify-between mb-3">
                    <div>
                        <h3 class="font-semibold text-lg">Sara M.</h3>
                        <p class="text-xs text-slate-400">08 septembre 2025</p>
                    </div>
                    <div class="text-orange-400 text-lg">
                        ⭐⭐⭐⭐☆
                    </div>
                </div>
                <p class="text-slate-300 leading-relaxed">
                    Très professionnel, bon suivi. J’aurais aimé plus de variété dans les exercices.
                </p>
            </div>

        </div>

        <!-- Empty State (use later) -->
        <!--
        <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-10 text-center">
            <p class="text-slate-400">Aucun avis pour le moment.</p>
        </div>
        -->

    </div>

</body>
</html>
