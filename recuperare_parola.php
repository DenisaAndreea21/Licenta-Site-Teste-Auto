<?php 
    session_start();
    unset($_SESSION['id_question_generator']);
    unset($_SESSION['timer_started']);
?>
<!DOCTYPE html>
<html lang="ro">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TraseuSigur - Recuperare parola</title>
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
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/recuperare_parola.css">
</head>
<body>
    <div class="BG">
        <div class="wrapper-index">
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
                        <li><a href="mediu_invatare.php">Mediu de învățare</a></li>
                        <li><a href="chestionar.php">Mediu de testare</a></li>
                        <li><a href="indicatoare.php">Indicatoare</a></li>
                        <li><a href="forum.php">Forum</a></li>
                    </ul>
                </nav>

                <div class="header-home-buttons">
                <?php if(isset($_SESSION["user_id"])){ ?>
                        <a href="my_account.php">
                        <button type="button">
                            <p>Contul meu</p>
                        </button>
                        </a>
                        <a href="includes/logout.inc.php">
                            <button type="button">
                                <p>Logout</p>
                            </button>
                        </a>
                    <?php } else{ ?>
                        <a href="logare.php">
                        <button type="button">
                            <p>Autentificare</p>
                        </button>
                        </a>
                        <a href="inregistrare.php">
                            <button type="button">
                                <p>Înregistrare</p>
                            </button>
                        </a>
                    <?php } ?>
                </div>

            </header>

            <h3 id="intro">Recuperare parola</h3>
        </div>
    </div>

    <form method="post" action="trimite-mail.php">

        <label for="email">Introdu adresa ta de email pentru a-ti recupera parola</label>
        <input type="email" name="email" id="email" class="inputText">

        <button>Trimite</button>

    </form>

    <!-- Footer -->
    <footer class="footer-home">
        <div class="wrapper-index">
            <div class="upperSection">
                <a href="index.php">
                    <div class="footer-home-logo">
                        <img src="img/logo.png" alt="Logo TraseuSigur">
                        <div>
                            <span class="header-home-logo-Traseu">Traseu</span>
                            <span class="header-home-logo-Sigur">Sigur</span>
                        </div>
                    </div>
                </a>

                <div class="util-footer">
                    <h4>Pagini Utile</h4>
                    <ul>
                        <a href="index.php">
                            <li>Home</li>
                        </a>
                        <a href="chestionar.php">
                            <li>Mediu de testare</li>
                        </a>
                        <a href="mediu_invatare.php">
                            <li>Mediu de învățare</li>
                        </a>
                        <a href="indicatoare.php">
                            <li>Indicatoare</li>
                        </a>
                        <a href="forum.php">
                            <li>Forum</li>
                        </a>
                    </ul>
                </div>

                <ul class="lista-footer">
                    <li>Termeni si condiţii de utilizare a site-ului</li>
                    <li>Politica de confidentialitate</li>
                    <li>Politica de cookie-uri</li>
                </ul>

                <div class="contact-footer">
                    <span>Ne găsiți pe:</span>
                    <div class="sm-footer">
                        <img src="img/fb.png" alt="">
                        <img src="img/insta.png" alt="">
                        <img src="img/linkedin.png" alt="">
                    </div>
                </div>
            </div>

            <hr class="linie">

            <div class="lowerSection">
                <div>
                    <span>Copyright by</span>
                    <div>© 2024 TraseuSigur</div>
                </div>
                <div>
                    <span>Contactează-mă la:</span>
                    <div>+40 787 387 994</div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>