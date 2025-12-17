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
    <title>CoachPro</title>
</head>
<body>

<h1>Bienvenue sur CoachPro</h1>
<p>Trouvez votre coach sportif facilement.</p>

<a href="auth/login.php">Se connecter</a>
<a href="auth/register.php">Créer un compte</a>

</body>
</html>