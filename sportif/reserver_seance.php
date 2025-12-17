<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réserver une séance - CoachPro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen">

    <!-- Modern navigation header -->
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
                    <a href="dashboard.php" class="text-slate-300 hover:text-white transition-colors">Dashboard</a>
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

    <!-- Main Content -->
    <div class="container mx-auto px-6 py-8">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-white mb-2">
                Réserver une <span class="text-orange-500">séance</span>
            </h1>
            <p class="text-slate-400">Choisissez votre coach, la date et l'heure qui vous conviennent</p>
        </div>

        <div class="grid lg:grid-cols-3 gap-6">
            <!-- Form Section -->
            <div class="lg:col-span-2">
                <form class="bg-slate-800/50 backdrop-blur-sm border border-slate-700/50 rounded-xl p-6 space-y-6">
                    <!-- Discipline Filter -->
                    <div>
                        <label for="discipline" class="block text-sm font-medium text-slate-300 mb-2">Discipline</label>
                        <select id="discipline" class="w-full bg-slate-900/50 border border-slate-700 text-white rounded-lg p-3 focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all">
                            <option value="">-- Choisir une discipline --</option>
                            <option value="tennis">Tennis</option>
                            <option value="natation">Natation</option>
                            <option value="fitness">Fitness</option>
                        </select>
                    </div>

                    <!-- Coach Selection -->
                    <div>
                        <label for="coach" class="block text-sm font-medium text-slate-300 mb-2">Coach</label>
                        <select id="coach" class="w-full bg-slate-900/50 border border-slate-700 text-white rounded-lg p-3 focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all">
                            <option value="">-- Choisir un coach --</option>
                            <option value="1">John Doe</option>
                            <option value="2">Jane Smith</option>
                            <option value="3">Mike Brown</option>
                        </select>
                    </div>

                    <!-- Date Picker -->
                    <div>
                        <label for="date" class="block text-sm font-medium text-slate-300 mb-2">Date</label>
                        <input type="date" id="date" class="w-full bg-slate-900/50 border border-slate-700 text-white rounded-lg p-3 focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all">
                    </div>

                    <!-- Time Slots -->
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-3">Heure disponible</label>
                        <div class="grid grid-cols-3 gap-3">
                            <button type="button" class="py-3 px-4 bg-slate-900/50 border border-slate-700 text-slate-300 rounded-lg hover:bg-orange-500 hover:text-white hover:border-orange-500 transition-all duration-200 font-medium">09:00</button>
                            <button type="button" class="py-3 px-4 bg-slate-900/50 border border-slate-700 text-slate-300 rounded-lg hover:bg-orange-500 hover:text-white hover:border-orange-500 transition-all duration-200 font-medium">10:00</button>
                            <button type="button" class="py-3 px-4 bg-slate-900/50 border border-slate-700 text-slate-300 rounded-lg hover:bg-orange-500 hover:text-white hover:border-orange-500 transition-all duration-200 font-medium">11:00</button>
                            <button type="button" class="py-3 px-4 bg-slate-900/50 border border-slate-700 text-slate-300 rounded-lg hover:bg-orange-500 hover:text-white hover:border-orange-500 transition-all duration-200 font-medium">14:00</button>
                            <button type="button" class="py-3 px-4 bg-slate-900/50 border border-slate-700 text-slate-300 rounded-lg hover:bg-orange-500 hover:text-white hover:border-orange-500 transition-all duration-200 font-medium">15:00</button>
                            <button type="button" class="py-3 px-4 bg-slate-900/50 border border-slate-700 text-slate-300 rounded-lg hover:bg-orange-500 hover:text-white hover:border-orange-500 transition-all duration-200 font-medium">16:00</button>
                        </div>
                    </div>

                    <!-- Reserve Button -->
                    <div>
                        <button type="submit" class="w-full bg-gradient-to-br from-orange-500 to-orange-600 hover:shadow-lg hover:shadow-orange-500/20 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-300 hover:scale-[1.02] flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Confirmer la réservation
                        </button>
                    </div>
                </form>
            </div>

            <!-- Coach Info Card -->
            <div class="lg:col-span-1">
                <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700/50 rounded-xl p-6 sticky top-8">
                    <div class="flex items-center gap-3 mb-6">
                        <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        <h2 class="text-xl font-bold text-white">Informations du coach</h2>
                    </div>
                    
                    <div class="flex flex-col items-center text-center space-y-4">
                        <div class="relative">
                            <img src="https://via.placeholder.com/120" alt="Coach Photo" class="rounded-full w-24 h-24 border-4 border-slate-700">
                            <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-green-500 rounded-full border-4 border-slate-800"></div>
                        </div>
                        
                        <div>
                            <p class="font-bold text-xl text-white mb-1">John Doe</p>
                            <p class="text-orange-500 text-sm font-medium mb-3">Coach de Tennis</p>
                        </div>

                        <div class="w-full space-y-3 pt-3 border-t border-slate-700">
                            <div class="flex items-center gap-3 text-slate-300">
                                <div class="w-8 h-8 bg-slate-900/50 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <span class="text-sm">5 ans d'expérience</span>
                            </div>
                            
                            <div class="flex items-center gap-3 text-slate-300">
                                <div class="w-8 h-8 bg-slate-900/50 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                                    </svg>
                                </div>
                                <span class="text-sm">Coach National</span>
                            </div>

                            <div class="flex items-center gap-3 text-slate-300">
                                <div class="w-8 h-8 bg-slate-900/50 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-orange-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                </div>
                                <span class="text-sm">4.8/5 (24 avis)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
