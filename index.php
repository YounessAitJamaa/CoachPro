<?php 

    session_start();

    if(isset($_SESSION['user_id'])) {

        if($_SESSION['role'] == 1){
            header('Location: sportif/dashboard.php');
    
        }else {
            header('Location: coach/dashboard.php');
            
        }
        exit();
    }


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoachPro - Trouvez votre coach sportif</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-white">
    
    <!-- Hero Section -->
    <div class="min-h-screen flex flex-col">
        
        <!-- Navigation -->
        <nav class="absolute top-0 left-0 right-0 z-10 p-6">
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 bg-orange-500 rounded-lg flex items-center justify-center font-bold text-xl">
                        CP
                    </div>
                    <span class="text-2xl font-bold">CoachPro</span>
                </div>
                <div class="flex items-center gap-4">
                    <a href="auth/login.php" class="px-6 py-2 text-white hover:text-orange-400 transition-colors duration-200 font-medium">
                        Se connecter
                    </a>
                    <a href="auth/register.php" class="px-6 py-2.5 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-all duration-200 font-medium shadow-lg shadow-orange-500/30">
                        Créer un compte
                    </a>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="flex-1 flex items-center justify-center px-6 py-20">
            <div class="max-w-5xl mx-auto text-center">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-orange-500/10 border border-orange-500/20 rounded-full mb-8">
                    <span class="w-2 h-2 bg-orange-500 rounded-full animate-pulse"></span>
                    <span class="text-orange-400 text-sm font-medium">Plateforme n°1 pour les coachs sportifs</span>
                </div>
                
                <h1 class="text-5xl md:text-7xl font-bold mb-6 text-balance">
                    Bienvenue sur 
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-orange-600">
                        CoachPro
                    </span>
                </h1>
                
                <p class="text-xl md:text-2xl text-slate-300 mb-12 text-balance max-w-3xl mx-auto">
                    Trouvez votre coach sportif facilement et atteignez vos objectifs.
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-16">
                    <a href="auth/register.php" class="px-8 py-4 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-all duration-200 font-semibold text-lg shadow-xl shadow-orange-500/30 w-full sm:w-auto">
                        Commencer maintenant
                    </a>
                    <a href="auth/login.php" class="px-8 py-4 bg-white/10 backdrop-blur-sm text-white rounded-lg hover:bg-white/20 transition-all duration-200 font-semibold text-lg border border-white/20 w-full sm:w-auto">
                        J'ai déjà un compte
                    </a>
                </div>

                <!-- Stats -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto mt-20">
                    <div class="p-6 bg-white/5 backdrop-blur-sm rounded-xl border border-white/10">
                        <div class="text-4xl font-bold text-orange-500 mb-2">500+</div>
                        <div class="text-slate-300">Coachs professionnels</div>
                    </div>
                    <div class="p-6 bg-white/5 backdrop-blur-sm rounded-xl border border-white/10">
                        <div class="text-4xl font-bold text-orange-500 mb-2">10K+</div>
                        <div class="text-slate-300">Sportifs actifs</div>
                    </div>
                    <div class="p-6 bg-white/5 backdrop-blur-sm rounded-xl border border-white/10">
                        <div class="text-4xl font-bold text-orange-500 mb-2">98%</div>
                        <div class="text-slate-300">Satisfaction</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="py-6 text-center text-slate-400 text-sm">
            <p>&copy; 2025 CoachPro. Tous droits réservés.</p>
        </footer>
    </div>

</body>
</html>
