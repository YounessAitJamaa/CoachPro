<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gérer mes disponibilités - CoachPro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen">

    <!-- Added navigation header matching coach.html design -->
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
                <div class="flex items-center gap-6">
                    <a href="dashboard.php" class="text-slate-300 hover:text-white transition-colors">Accueil</a>
                    <a href="#" class="text-slate-300 hover:text-white transition-colors">Profil</a>
                    <a href="../auth/logout.php" class="text-slate-300 hover:text-white transition-colors flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        Déconnexion
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Updated container with better spacing -->
    <div class="container mx-auto px-6 py-8">

        <!-- Updated page title section with icon and better styling -->
        <div class="mb-8">
            <div class="flex items-center gap-3 mb-2">
                <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <h1 class="text-4xl font-bold text-white">Mes <span class="text-orange-500">disponibilités</span></h1>
            </div>
            <p class="text-slate-400 ml-11">
                Définissez vos créneaux disponibles pour les séances
            </p>
        </div>

        <!-- Updated add availability card with glassmorphism effects -->
        <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700/50 rounded-xl p-6 mb-8">
            <h2 class="text-xl font-semibold mb-6 flex items-center gap-2 text-white">
                <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Ajouter une disponibilité
            </h2>

            <form class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Date -->
                <div>
                    <label class="block text-sm text-slate-300 mb-2 font-medium">Date</label>
                    <input
                        type="date"
                        class="w-full px-4 py-2.5 rounded-lg bg-slate-900/70 border border-slate-700/50 focus:ring-2 focus:ring-orange-500 focus:border-transparent outline-none text-white transition-all"
                    >
                </div>

                <!-- Start Time -->
                <div>
                    <label class="block text-sm text-slate-300 mb-2 font-medium">Heure début</label>
                    <input
                        type="time"
                        class="w-full px-4 py-2.5 rounded-lg bg-slate-900/70 border border-slate-700/50 focus:ring-2 focus:ring-orange-500 focus:border-transparent outline-none text-white transition-all"
                    >
                </div>

                <!-- End Time -->
                <div>
                    <label class="block text-sm text-slate-300 mb-2 font-medium">Heure fin</label>
                    <input
                        type="time"
                        class="w-full px-4 py-2.5 rounded-lg bg-slate-900/70 border border-slate-700/50 focus:ring-2 focus:ring-orange-500 focus:border-transparent outline-none text-white transition-all"
                    >
                </div>

                <!-- Button -->
                <div class="flex items-end">
                    <button
                        type="button"
                        class="w-full bg-gradient-to-r from-orange-500 to-orange-600 hover:shadow-lg hover:shadow-orange-500/20 text-white font-semibold py-2.5 rounded-lg transition-all duration-300 hover:scale-105"
                    >
                        Ajouter
                    </button>
                </div>
            </form>
        </div>

        <!-- Updated existing availability list with glassmorphism and better card design -->
        <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700/50 rounded-xl p-6">
            <h2 class="text-xl font-semibold mb-6 flex items-center gap-2 text-white">
                <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                Créneaux existants
            </h2>

            <div class="space-y-4">

                <!-- Updated slot cards with better styling and hover effects -->
                <div class="flex items-center justify-between bg-slate-900/50 border border-slate-700/30 rounded-lg p-5 hover:border-orange-500/50 transition-all duration-300">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-orange-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-white">Lundi 18 Mars 2025</p>
                            <div class="flex items-center gap-2 text-slate-400 text-sm mt-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>10:00 – 12:00</span>
                            </div>
                        </div>
                    </div>
                    <span class="px-4 py-1.5 bg-orange-500/20 border border-orange-500/30 text-orange-400 font-medium text-sm rounded-full">Disponible</span>
                </div>

                <div class="flex items-center justify-between bg-slate-900/50 border border-slate-700/30 rounded-lg p-5 hover:border-orange-500/50 transition-all duration-300">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-orange-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-white">Mercredi 20 Mars 2025</p>
                            <div class="flex items-center gap-2 text-slate-400 text-sm mt-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>16:00 – 18:00</span>
                            </div>
                        </div>
                    </div>
                    <span class="px-4 py-1.5 bg-orange-500/20 border border-orange-500/30 text-orange-400 font-medium text-sm rounded-full">Disponible</span>
                </div>

                <div class="flex items-center justify-between bg-slate-900/50 border border-slate-700/30 rounded-lg p-5 hover:border-orange-500/50 transition-all duration-300">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-orange-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-white">Vendredi 22 Mars 2025</p>
                            <div class="flex items-center gap-2 text-slate-400 text-sm mt-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>09:00 – 11:00</span>
                            </div>
                        </div>
                    </div>
                    <span class="px-4 py-1.5 bg-orange-500/20 border border-orange-500/30 text-orange-400 font-medium text-sm rounded-full">Disponible</span>
                </div>

            </div>
        </div>

    </div>

</body>
</html>
