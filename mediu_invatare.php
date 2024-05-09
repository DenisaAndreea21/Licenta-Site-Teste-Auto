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
    <title>TraseuSigur - Mediu de învățare</title>
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
    <link rel="stylesheet" href="css/mediu_invatare.css">
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
                            <span class="header-home-logo-Sigur">Sigur</span>                            </div>
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
            <div class="sectiune-resurse">
                <span class="resurse-intro">Nu te simți pregătit?</span>
                <h3>Descoperă resursele noastre de învățare, create special pentru a-ți oferi încrederea de care ai nevoie.</h3>
            </div>   
        </div>
    </div>

    <div class="wrapper-index">
        <div class="container-resurse">
            <div class="resurse-row1">
                <a href="cod_rutier.php">
                    <div class="resursa-codRutier">
                        <i><img src="img/codRutier.png" alt=""></i>
                        <span>Codul Rutier</span>
                        <div>Aici vei găsi cursul de legislație rutieră structurat pe capitole. Este foarte important să-l citești deoarece conține informații esențiale despre regulile de circulație.</div>
                    </div>
                </a>

                <a href="indicatoare.php">
                    <div class="resursa-indicatoare">
                        <i><img src="img/indicatoare.png" alt=""></i>
                        <span>Indicatoare</span>
                        <div>Indicatoarele si marcajele rutiere sunt importante pentru navigarea sigură pe drumurile publice. Vei găsi explicații clare care te vor ajuta să înțelegi cu ușurință semnificația fiecărui indicator și marcaj rutier.</div>
                    </div>
                </a>

                <a href="intrebari_categorii.php">
                    <div class="resursa-intrebariPeCategorii">
                        <i><img src="img/intrebari pe categorii.png" alt=""></i>
                        <span>Întrebări Pe Categorii</span>
                        <div>Această secțiune conține o multitudine de întrebări care sunt sortate pe categorii, pentru o învățare mai ușoară.</div>
                    </div>
                </a>
            </div>

            <div class="resurse-row2">
                <a href="cursuri_video.php">
                    <div class="resursa-cursuriVideo">
                        <i><img src="img/cursuri video.png" alt=""></i>
                        <span>Cursuri Video</span>
                        <div>Poți viziona cursurile video pentru o înțelegere mai bună a regulilor de conducere.</div>                       
                    </div>
                </a>

                <a href="semnalele_politistului.php">
                    <div class="resursa-semnalelePolitistului">
                        <i><img src="img/semnalele politistului.png" alt=""></i>
                        <span>Semnalele Polițistului</span>
                        <div>Explorează semnificația fiecărui semnal al polițistului pentru a înțelege cum să răspunzi eficient și în conformitate cu normele de circulație.</div>
                    </div>
                </a>

                <a href="puncte_penalizare.php">
                    <div class="resursa-puncteDePenalizare">
                        <i><img src="img/puncte de penalizare.png" alt=""></i>
                        <span>Puncte De Penalizare</span>
                        <div>Aici poți afla ce acțiuni conduc la penalizare și cu câte puncte se sancționează.</div>
                    </div>
                </a>
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
                        <a href="index.php"><li>Home</li></a>
                        <a href="chestionar.php"><li>Mediu de testare</li></a>
                        <a href="mediu_invatare.php"><li>Mediu de învățare</li></a>
                        <a href="indicatoare.php"><li>Indicatoare</li></a>
                        <a href="utile.php"><li>Utile</li></a>
                        <a href="about.php"><li>Despre noi</li></a>
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