<?php
require "includes/dbh.inc.php";
$isIndicatoareDisplayed = false;
if (isset($_GET['categorie'])) {
    $categorie = $_GET['categorie'];
    $isIndicatoareDisplayed = true;
    try {
        $query = "SELECT explicatie_indicator, url_indicator, titlu_indicator
                    FROM indicatoare
                    WHERE categorie=:categorie";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':categorie', $categorie, PDO::PARAM_STR);
        $stmt->execute();
        $indicatoare = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <title>TraseuSigur - Indicatoare</title>
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
    <link rel="stylesheet" href="css/indicatoare.css">
    <!--pentru schimbare text indicatoare -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                        <li><a href="mediu_testare.php">Mediu de testare</a></li>
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
            <?php if (!$isIndicatoareDisplayed) { ?>
                <h3 id="intro">Indicatoare</h3>
            <?php } else { ?>
                <?php if ($categorie == "aditionale") { ?>
                    <h3 id="intro">Indicatoare adiționale</h3>
                <?php } else { ?>
                    <h3 id="intro">Indicatoare de <?php echo $categorie; ?></h3>
                <?php } ?>
            <?php } ?>

        </div>

    </div>

    <?php if($isIndicatoareDisplayed){ ?>
        <div class="wrapper-indic">
            <?php foreach ($indicatoare as $indicator) {?>
                <div class="cont_indicator">
                    <span><?php echo $indicator['titlu_indicator'] . "<br>"; ?></span>
                    <img src="<?php echo $indicator['url_indicator'] ?>" alt="">
                    <div><?php echo $indicator['explicatie_indicator'] . "<br>"; ?></div>
                </div>
            <?php } ?>
        </div>
    <?php } else { ?>
        <!-- indicatoare -->
        <div class="wrapper-index">
            <div class="sectiune-resurse">
                <div class="container-resurse">
                    <div class="resurse-row1">
                        <div class="categorie">
                            <div class="poze-indicatoare">
                                <i><img src="img/avertizare1.png" alt=""></i>
                                <i><img src="img/avertizare2.png" alt=""></i>
                                <i><img src="img/avertizare3.png" alt=""></i>
                            </div>
                            <span>Indicatoare de avertizare</span>
                            
                                <a href="indicatoare.php?categorie=avertizare">
                                    <p>Învață</p>
                                </a>
                            
                        </div>

                        <div class="categorie">
                            <div class="poze-indicatoare">
                                <i><img src="img/restrictie1.png" alt=""></i>
                                <i><img src="img/restrictie2.png" alt=""></i>
                                <i><img src="img/restrictie3.png" alt=""></i>
                            </div>
                            <span>Indicatoare de restricție/interzicere</span>
                            
                                <a href="indicatoare.php?categorie=interzicere">
                                    <p>Învață</p>
                                </a>
                            
                        </div>

                        <div class="categorie">
                            <div class="poze-indicatoare">
                                <i><img src="img/prioritate1.png" alt=""></i>
                                <i><img src="img/prioritate2.png" alt=""></i>
                                <i><img src="img/prioritate3.png" alt="" class="triunghi"></i>
                            </div>
                            <span>Indicatoare de prioritate</span>
                            
                                <a href="indicatoare.php?categorie=prioritate">
                                    <p>Învață</p>
                                </a>
                            
                        </div>
                    </div>

                    <div class="resurse-row2">
                        <div class="categorie">
                            <div class="poze-indicatoare">
                                <i><img src="img/obligare1.png" alt=""></i>
                                <i><img src="img/obligare2.png" alt=""></i>
                                <i><img src="img/obligare3.png" alt=""></i>
                            </div>
                            <span>Indicatoare de obligare</span>
                            
                                <a href="indicatoare.php?categorie=obligare">
                                    <p>Învață</p>
                                </a>
                            
                        </div>

                        <div class="categorie">
                            <div class="poze-indicatoare">
                                <i><img src="img/orientare1.png" alt=""></i>
                                <i><img src="img/orientare2.png" alt=""></i>
                                <i><img src="img/orientare3.png" alt=""></i>
                            </div>
                            <span>Indicatoare de orientare</span>
                            
                                <a href="indicatoare.php?categorie=orientare">
                                    <p>Învață</p>
                                </a>
                            
                        </div>

                        <div class="categorie">
                            <div class="poze-indicatoare">
                                <i><img src="img/informare3.png" alt=""></i>
                                <i><img src="img/informare2.png" alt=""></i>
                                <i><img src="img/informare1.png" alt=""></i>
                            </div>
                            <span>Indicatoare de informare</span>
                            
                                <a href="indicatoare.php?categorie=informare">
                                    <p>Învață</p>
                                </a>
                            
                        </div>
                    </div>

                    <div class="resurse-row3">
                        <div class="categorie">
                            <div class="poze-indicatoare">
                                <i><img src="img/aditionale1.png" alt=""></i>
                                <i><img src="img/aditionale2.png" alt=""></i>
                                <i><img src="img/aditionale3.png" alt=""></i>
                            </div>
                            <span>Indicatoare adiționale</span>
                            
                                <a href="indicatoare.php?categorie=aditionale">
                                    <p>Învață</p>
                                </a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

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
                        <a href="mediu_testare.php">
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

