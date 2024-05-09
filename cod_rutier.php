<?php
session_start();
unset($_SESSION['id_question_generator']);
unset($_SESSION['timer_started']);
require "includes/dbh.inc.php";
$isCapitolDisplayed = false;
if (isset($_GET['id_cr'])) {
    $id_cr = $_GET['id_cr'];
    $isCapitolDisplayed = true;
    try {
        $query = "SELECT titlu_cr, text_cr
                    FROM codrutier
                    WHERE id_cr=:id_cr";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id_cr', $id_cr, PDO::PARAM_STR);
        $stmt->execute();
        $capitol = $stmt->fetch(PDO::FETCH_ASSOC);
        $pdo = null;
        $stmt = null;
    } catch (PDOException $e) {
        die ("Eroare la interogare: " . $e->getMessage());
    }
} 
?>
<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TraseuSigur - Codul Rutier</title>
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
    <link rel="stylesheet" href="css/codRutier.css">
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
                        <li><a href="utile.php">Utile</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </nav>

                <div class="header-home-buttons">
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
                </div>

            </header>

            <!-- intro -->
            <h3 class="intro">Codul Rutier</h3>
        </div>

    </div>
    <?php if (!$isCapitolDisplayed): ?>
        <div class="wrapper-index">
            <a class="backBtn" href="mediu_invatare.php">
                <div>
                    <img src="img/back.png" alt="">
                    <p>Înapoi</p>
                </div>
            </a>
        </div>
        <!-- capitole cod rutier -->
        <div class="wrapper-index">
            <div class="sectiune-capitole">
                <div class="rand">
                    <div class="coloana">
                        <div class="capitol">
                            <p>CAP. I - Dispoziții generale</p>
                            <a href="cod_rutier.php?id_cr=1">Citește</a>
                        </div>

                        <div class="capitol">
                            <p>CAP. II - Vehicule</p>
                            <a href="cod_rutier.php?id_cr=2">Citește</a>
                        </div>

                        <div class="capitol">
                            <p>CAP. III - Conducătorii de vehicule</p>
                            <a href="cod_rutier.php?id_cr=3">Citește</a>
                        </div>

                        <div class="capitol">
                            <p>CAP. IV - Semnalizarea rutieră</p>
                            <a href="cod_rutier.php?id_cr=4">Citește</a>
                        </div>

                        <div class="capitol">
                            <p>CAP. V - Reguli de circulație</p>
                            <a href="cod_rutier.php?id_cr=5">Citește</a>
                        </div>
                    </div>

                    <div class="coloana">
                        <div class="capitol">
                            <p>CAP. VI - Infracțiuni și pedepse</p>
                            <a href="cod_rutier.php?id_cr=6">Citește</a>
                        </div>

                        <div class="capitol">
                            <p>CAP. VII - Răspunderea contravențională</p>
                            <a href="cod_rutier.php?id_cr=7">Citește</a>
                        </div>

                        <div class="capitol">
                            <p>CAP. VIII - Căi de atac împotriva procesului-verbal</p>
                            <a href="cod_rutier.php?id_cr=8">Citește</a>
                        </div>

                        <div class="capitol">
                            <p>CAP. IX - Atribuții ale unor ministere și ale altor autorități ale administrației publice</p>
                            <a href="cod_rutier.php?id_cr=9">Citește</a>
                        </div>

                        <div class="capitol">
                            <p>CAP. X - Dispoziții finale</p>
                            <a href="cod_rutier.php?id_cr=10">Citește</a>
                        </div>
                    </div>
                </div>

                <div class="capitol ultimul">
                    <p>ANEXA 1 - Categorii de vehicule pentru care se eliberează permisul de conducere</p>
                    <a href="cod_rutier.php?id_cr=11">Citește</a>
                </div>
            </div>
        </div> 
    <?php else: ?>
        <div class="wrapper-index">

            <a class="backBtn" href="cod_rutier.php">
                <div>
                    <img src="img/back.png" alt="">
                    <p>Înapoi</p>
                </div>
            </a>

            <h3 class="titlu"><?php echo $capitol['titlu_cr']; ?></h3>
            <div class="continut"> <?php echo $capitol['text_cr']; ?></div>
        </div>
    <?php endif ?>
    <!-- footer -->
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
                        <a href="utile.php">
                            <li>Utile</li>
                        </a>
                        <a href="about.php">
                            <li>Despre noi</li>
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