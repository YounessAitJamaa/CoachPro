<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier réservation</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-white min-h-screen flex items-center justify-center">

    <div class="w-full max-w-lg bg-slate-800/50 border border-slate-700/50 rounded-xl p-8">

        <!-- Header -->
        <h1 class="text-2xl font-bold mb-6 text-orange-500">
            Modifier la réservation
        </h1>

        <!-- Coach Info -->
        <div class="mb-6 space-y-2">
            <p class="text-slate-400">
                <span class="font-medium text-white">Coach :</span> John Doe
            </p>
            <p class="text-slate-400">
                <span class="font-medium text-white">Discipline :</span> Musculation
            </p>
        </div>

        <!-- Form -->
        <form>

            <!-- Date -->
            <div class="mb-4">
                <label class="block text-sm mb-1">Date</label>
                <input
                    type="date"
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-orange-500"
                >
            </div>

            <!-- Time Slot -->
            <div class="mb-6">
                <label class="block text-sm mb-1">Créneau horaire</label>
                <select
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-orange-500"
                >
                    <option>09:00 - 10:00</option>
                    <option>10:00 - 11:00</option>
                    <option>14:00 - 15:00</option>
                    <option>16:00 - 17:00</option>
                </select>
            </div>

            <!-- Buttons -->
            <div class="flex justify-between">
                <a
                    href="dashboard.php"
                    class="px-4 py-2 bg-slate-700 hover:bg-slate-600 rounded-lg transition"
                >
                    Annuler
                </a>

                <button
                    type="submit"
                    class="px-6 py-2 bg-orange-500 hover:bg-orange-400 text-slate-900 font-semibold rounded-lg transition"
                >
                    Enregistrer
                </button>
            </div>

        </form>

    </div>

</body>
</html>
