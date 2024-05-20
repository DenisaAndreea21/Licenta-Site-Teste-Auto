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
    <link rel="stylesheet" href="css/index.css">
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

            <!-- MAIN SECTION-->
            <main>
                <div class="main-intro">
                    <h2>Succesul tău în sala de examinare începe <span>aici</span>!</h2>
                    <h3>Descoperă cel mai eficient și personalizat mod de pregătire pentru examenul auto pe platforma
                        noastră. Cu chestionarele pregătite de noi, vei putea obține rezultate excelente încă de la
                        prima încercare. Te vom ghida pas cu pas către succes, asigurându-ne că vei fi pregătit în mod
                        optim pentru fiecare aspect al examinării.
                    </h3>
                    <form method="post" action="chestionar.php">
                    <input type="hidden" name="start_new_quiz" value="1">
                        <button type="submit">
                            <a href="chestionar.php">
                                <img src="img/sagetica.png" alt="right arrow image">
                                <h1>Rezolvă primul chestionar acum!</h1>
                            </a>
                        </button>
                    </form>
                </div>
                <img src="img/portrait.png" alt="image of a woman holding a driving license" class="img-portrait">
            </main>
        </div>
    </div>
    
    <!-- Sectiune care prezinta resursele de invatare -->
    <div class="wrapper-index">
        <div class="sectiune-resurse">
            <span class="resurse-intro">Nu te simți pregătit?</span>
            <h3>Descoperă resursele noastre de învățare, create special pentru a-ți oferi încrederea de care ai nevoie.</h3>
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
    </div>

    <!-- Sectiune traseu recomandat -->
    <div class="BG-traseu">
        <div class="sectiune-traseu">
            <h3>Recomandăm următorul traseu pentru o învățare eficientă:</h3>
            <div class="traseu">
                <a href="cod_rutier.php">
                    <div class="traseu-codRutier">
                        <div class="container-traseu-codRutier">
                            <i><img src="img/codRutier.png" alt=""></i>
                            <p>Cod Rutier</p>
                        </div>
                        <div class="traseu-descCodRutier">Aici vei gasi reguli fundamentale care stau la temelia unui comportament sigur și responsabil în trafic</div>
                    </div>
                </a>

                <a href="indicatoare.php">
                    <div class="traseu-indicatoare">
                        <div class="container-traseu-indicatoare">
                            <i><img src="img/indicatoare.png" alt=""></i>
                            <p>Indicatoare</p>
                        </div>
                        <div class="traseu-descIndicatoare">Vei găsi explicații clare care te vor ajuta să înțelegi cu ușurință semnificația fiecărui indicator și marcaj rutier.</div>
                    </div>
                </a>

                <a href="mediu_invatare.php">
                    <div class="traseu-mediuDeInvatare">
                        <div class="container-traseu-mediuDeInvatare">
                            <i><img src="img/invatare.png" alt=""></i>
                            <p>Mediu de învățare</p>
                        </div>
                        <div class="traseu-descMediuDeInvatare">O varietate de chestionare, împărțite pe categorii, unde răspunsul întrebării este afișat pe loc și justificat.</div>
                    </div>
                </a>

                <a href="chestionar.php">
                    <div class="traseu-mediuDeTestare">
                        <div class="container-traseu-mediuDeTestare">
                            <i><img src="img/testare.png" alt=""></i>
                            <p>Mediu de testare</p>
                        </div>
                        <div class="traseu-descMediuDeTestare">Când te simți pregătit, îți poți verifica cunoștințele cu un chestionar de 26 de întrebări.</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    
    <!-- Sectiune about -->
    <div class="BG-about">
        <div class="sectiune-about">
            <h3>De ce să faci chestionarele noastre?</h3>
            <div class="about">
                <div>Chestionarele sunt complet gratuite.</div>
                <div>Mediul de învățare oferă o multitudine de moduri de a învață pentru sala într-un mod eficient.</div>
                <div>Toate întrebările au fost verificate și actualizate pentru anul 2024.</div>
                <div>Platforma noastră funcționează perfect pe orice dispozitiv, ceea ce îți va permite să înveți de oriunde și oricând.</div> 
            </div>
        </div>
    </div>

    <!-- Sectiune recenzii -->
    <div class="wrapper-index">
        <div class="sectiune-recenzii">
            <h3>Ce spun utilizatorii noștri?</h3>
            <div class="recenzii">
                <div class="recenzie">
                    <img src="img/ghilimele.png" alt="">
                    <div class="text-recenzie"> Acest site m-a ajutat foarte mult cand a trebuit sa ma pregatesc pentru examenul auto, recomand.</div>
                    <hr class="liniuta">
                    <div class="user-recenzie">
                        <img src="img/Maria.png" alt="">
                        <span>Maria Ionescu</span>
                    </div>
                </div>
                <div class="recenzie">
                    <img src="img/ghilimele.png" alt="">
                    <div class="text-recenzie"> Imi place acest site pentru ca are o sectiune de invatare care este foarte de ajutor cand te pregatesti pentru sala.</div>
                    <hr class="liniuta">
                    <div class="user-recenzie">
                        <img src="img/ilie.jpg" alt="">
                        <span>Ilie Ciobanu</span>
                    </div>
                </div>
                <div class="recenzie">
                    <img src="img/ghilimele.png" alt="">
                    <div class="text-recenzie"> Am postat o nelamurire in legatura cu o intrebare din sectiunea de invatare pe forum si mi s-a raspuns imediat.</div>
                    <hr class="liniuta">
                    <div class="user-recenzie">
                        <img src="img/mihai.jpg" alt="">
                        <span>Mihai Laurentiu</span>
                    </div>
                </div>
            </div>
            <div class="comm">
                <h4>Vrei să adaugi și tu un comentariu?</h4>
                <a href="inregistrare.php">
                    <button type="button">
                        <div>
                            <img src="img/log-in.png" alt="">
                            <p>Înregistrează-te!</p>
                        </div>
                    </button>
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

</html>