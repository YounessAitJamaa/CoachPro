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
            <h1 class="text-2xl sm:text-3xl font-bold mb-2">John Doe</h1>
            <p class="text-slate-400 mb-4 text-sm sm:text-base">Coach sportif certifié</p>

            <!-- Made tags wrap and center on mobile -->
            <div class="flex flex-wrap gap-2 sm:gap-4 justify-center sm:justify-start">
                <span class="bg-orange-500/20 text-orange-400 px-3 py-1 rounded-full text-xs sm:text-sm">
                    Musculation
                </span>
                <span class="bg-orange-500/20 text-orange-400 px-3 py-1 rounded-full text-xs sm:text-sm">
                    Cardio
                </span>
            </div>
        </div>
    </div>

    <!-- Enhanced responsive grid for info cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6 mb-6 sm:mb-10">
        <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-4 sm:p-6 text-center sm:text-left">
            <p class="text-slate-400 text-xs sm:text-sm">Expérience</p>
            <p class="text-xl sm:text-2xl font-bold">6 ans</p>
        </div>
        <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-4 sm:p-6 text-center sm:text-left">
            <p class="text-slate-400 text-xs sm:text-sm">Séances réalisées</p>
            <p class="text-xl sm:text-2xl font-bold">350+</p>
        </div>
        <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-4 sm:p-6 text-center sm:text-left">
            <p class="text-slate-400 text-xs sm:text-sm">Note moyenne</p>
            <p class="text-xl sm:text-2xl font-bold">⭐ 4.7 / 5</p>
        </div>
    </div>

    <!-- Responsive padding and text sizing -->
    <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-4 sm:p-6 mb-6 sm:mb-10">
        <h2 class="text-lg sm:text-xl font-semibold mb-3">À propos</h2>
        <p class="text-slate-300 leading-relaxed text-sm sm:text-base">
            Coach passionné avec plus de 6 ans d'expérience dans le coaching
            personnalisé. J'aide mes clients à atteindre leurs objectifs
            physiques de manière saine et durable.
        </p>
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
