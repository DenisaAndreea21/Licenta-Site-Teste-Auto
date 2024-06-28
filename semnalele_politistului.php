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
    <title>TraseuSigur - Semnalele politistului</title>
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
    <link rel="stylesheet" href="css/semnalele_politistului.css">
</head>
<body>
    <!-- Sectiune principala -->
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
            <h3 id="intro">Semnalele Polițistului</h3>
        </div>
    </div>

    <!-- Indicatoare -->
    <div class="wrapper-index">
        <a class="backBtn" href="mediu_invatare.php">
            <div>
                <img src="img/back.png" alt="">
                <p>Înapoi</p>
            </div>
        </a>
        <div class="cont-semnale">
            <div class="rand">
                <div class="semnal">
                    <div class="pozaTitlu">
                        <h4 class="titluSemnal">Atenție oprire</h4>
                        <img class="pozaSemnal" src="imgPolitist/Atentie_Oprire.jpg" alt="">
                    </div>
                    <div class="textSemnal">
                        &nbsp;&nbsp;&nbsp;Brațul ridicat vertical semnifică "Atenție, oprire!" pentru toți participanții la trafic (vehicule si pietoni) care se apropie, cu excepția conducătorilor de vehicule care nu ar mai putea opri în condiții de siguranță. <br><br> &nbsp;&nbsp;&nbsp;Dacă semnalul este dat într-o intersecție, aceasta nu impune oprirea conducătorilor de vehicule care se află deja angajați în traversare.
                    </div>
                </div>

                <div class="semnal">
                    <div class="pozaTitlu">
                        <h4 class="titluSemnal">Oprire</h4>
                        <img class="pozaSemnal" src="imgPolitist/Oprire_dreapta.jpg" alt="">
                    </div>
                    <div class="textSemnal">
                        &nbsp;&nbsp;&nbsp;Brațul drept întins orizontal semnifică "Oprire!" pentru toți participanții la trafic care vin din spatele polițistului. <br><br>&nbsp;&nbsp;&nbsp; Dacă polițistul din imagine ar avea brațul stang întins orizontal, atunci semnificația ar fi de "Oprire!" pentru vehiculele care se apropie din fața acestuia.
                    </div>
                </div>
            </div>

            <div class="rand">
                <div class="semnal">
                    <div class="pozaTitlu">
                        <h4 class="titluSemnal">Oprire</h4>
                        <img class="pozaSemnal" src="imgPolitist/Oprire_ambele_sensuri.jpg" alt="">
                    </div>
                    <div class="textSemnal">
                        &nbsp;&nbsp;&nbsp;Brațele polițistului rutier întinse orizontal înseamnă "Oprire!" pentru toți participanții la trafic care, indiferent de de sensul lor de mers, circulă din direcțiile intersectate de brațele întinse.
                    </div>
                </div>

                <div class="semnal">
                    <div class="pozaTitlu">
                        <h4 class="titluSemnal">Oprire</h4>
                        <img class="pozaSemnal" src="imgPolitist/Oprire_simplu.jpg" alt="">
                    </div>
                    <div class="textSemnal">
                        &nbsp;&nbsp;&nbsp;Brațele polițistului rutier întinse orizontal înseamnă "Oprire!" pentru toți participanții la trafic care, indiferent de sensul lor de mers, circulă din direcțiile intersectate de brațele întinse. <br><br>&nbsp;&nbsp;&nbsp; După ce a dat această comandă, polițistul rutier poate să coboare brațele, pozitia sa însemnând de asemenea "Oprire!" pentru toți conducătorii de vehicule care circulă din față ori din spate.
                    </div>
                </div>
            </div>

            <div class="rand">
                <div class="semnal">
                    <div class="pozaTitlu">
                        <h4 class="titluSemnal">Măriți viteza</h4>
                        <img class="pozaSemnal" src="imgPolitist/Mariti_viteza.jpg" alt="">
                    </div>
                    <div class="textSemnal">
                        &nbsp;&nbsp;&nbsp;Rotirea vioaie a brațului semnifică mărirea vitezei și grăbirea traversării drumului de către pietoni, dacă acest semnal li se adresează.
                    </div>
                </div>

                <div class="semnal">
                    <div class="pozaTitlu">
                        <h4 class="titluSemnal">Reduceți viteza</h4>
                        <img class="pozaSemnal" src="imgPolitist/Reduceti_viteza.jpg" alt="">
                    </div>
                    <div class="textSemnal">
                        &nbsp;&nbsp;&nbsp;Balansarea pe verticală a brațului întins orizontal de către polițistul rutier, semnifică pentru conducătorii de vehicule, reducerea vitezei.
                    </div>
                </div>
            </div>

            <div class="rand">
                <div class="semnal">
                    <div class="pozaTitlu">
                        <h4 class="titluSemnal">Oprire</h4>
                        <img class="pozaSemnal" src="imgPolitist/Oprire_stanga_bat.jpg" alt="">
                    </div>
                    <div class="textSemnal">
                        &nbsp;&nbsp;&nbsp;Balansarea cu brațul, pe verticală, a unui dispozitiv cu lumină roșie ori a bastonului reflectorizant pe timp de noapte, semnifică "Oprire!" pentru participanții la trafic spre care este îndreptat.
                    </div>
                </div>

                <div class="semnal">
                    <div class="pozaTitlu">
                        <h4 class="titluSemnal">Oprire</h4>
                        <img class="pozaSemnal" src="imgPolitist/Oprire_din_masina.jpg" alt="">
                    </div>
                    <div class="textSemnal">
                        &nbsp;&nbsp;&nbsp;Balansarea bastonului reflectorizant sau a bratului din partea dreapta a vehiculului politiei semnifica oprire pentru cei din spate. <br><br> &nbsp;&nbsp;&nbsp;Balansarea din partea stanga pentru cei din fata sau cei care circula pe banda/benzile din stanga in acelasi sens.
                    </div>
                </div>
            </div>

            <div class="rand" style="margin-bottom: 0;">
                <div class="semnal">
                    <div class="pozaTitlu">
                        <h4 class="titluSemnal">Oprire</h4>
                        <img class="pozaSemnal" src="imgPolitist/Oprire_motocicleta1.jpg" alt="">
                    </div>
                    <div class="textSemnal">
                        &nbsp;&nbsp;&nbsp;Balansarea cu brațul, pe verticală din motocicleta de politie semnifică "Oprire!" pentru participanții la trafic spre care este îndreptat.    
                    </div>
                </div>

                <div class="semnal">
                    <div class="pozaTitlu">
                        <h4 class="titluSemnal">Oprire</h4>
                        <img class="pozaSemnal" src="imgPolitist/Reduceti_viteza_motocicleta.jpg" alt="">
                    </div>
                    <div class="textSemnal">
                        &nbsp;&nbsp;&nbsp;Balansarea pe verticală a brațului întins orizontal dintr-o motocicleta de politie, semnifică pentru conducătorii de vehicule, reducerea vitezei.
                    </div>
                </div>
            </div>
        </div>
    </div>

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