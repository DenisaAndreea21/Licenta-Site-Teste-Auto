<?php 
    session_start();
    $raspunsuri_corecte = isset($_SESSION['raspunsuri_corecte']) ? $_SESSION['raspunsuri_corecte'] : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TraseuSigur Chestionare Auto</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Serif:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/result.css">
</head>
<body>
        <!-- HEADER -->
        <header class="header-home">

            <a href="index.php">
                <div class="header-home-logo">
                    <img src="img/logo.png" alt="Logo TraseuSigur">
                        <div>
                            <span class="header-home-logo-Traseu">Traseu</span>
                            <span class="header-home-logo-Sigur">Sigur</span>
                        </div>
                </div>
            </a>

             <nav class="header-home-nav">
                <ul>
                    <li><a href="#">Mediu de învățare</a></li>
                    <li><a href="#">Mediu de testare</a></li>
                    <li><a href="#">Indicatoare</a></li>
                    <li><a href="#">Utile</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>

            <div class="header-home-buttons">
                <button class="pill" type="button">
                    <p>Autentificare</p>
                </button>
                <button class="pill" type="button">
                    <p>Înregistrare</p>
                </button>
            </div>

        </header>

        <p>
        <?php echo "Felicitari! Ai raspuns corect la " . $raspunsuri_corecte . " intrebari!";?>
        </p>
        <div class="main-intro">
        <form method="post" action="chestionar.php">
            <input type="hidden" name="start_new_quiz" value="1">
                <button type="submit">
                    <a href="chestionar.php">
                        <img src="img/sagetica.png" alt="right arrow image">
                        <p>Rezolvă din nou!</p>
                    </a>
                </button>
        </form>
        </div>
</body>



