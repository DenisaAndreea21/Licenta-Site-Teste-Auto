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
    <title>TraseuSigur - Puncte de penalizare</title>
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
    <link rel="stylesheet" href="css/puncte_penalizare.css">
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
            <h3 id="intro">Puncte de penalizare la examenul auto</h3>
        </div>
    </div>

    <p class="avertizare">Daca ai acumulat cel putin 21 de puncte la traseu vei fi considerat respins!</p>

    <div class="wrapper-index">
        <table>
            <tr>
                <th class="principal" style="width:400px;">CATEGORIE</th>
                <th class="principal">DESCRIERE</th>
                <th class="principal" style="width:140px;">PUNCTE</th>
            </tr>
            <tr>
                <td rowspan="3" class="principal">I. PREGĂTIREA ȘI VERIFICAREA TEHNICĂ A AUTOVEHICLULUI/ANSAMBLULUI</td>
                <td class="desc">Neverificarea, prin intermediul aparaturii de bord sau a comenzilor autovehiculului, a funcționării direcției, frânei, a instalației de ungere/ răcire, a luminilor, a semnalizării și a avertizorului sonor;</td>
                <td class="puncte"> -3 puncte</td>
            </tr>
            <tr>
                <td class="desc">Nereglarea scaunului, a oglinzilor retrovizoare, nefixarea centurii de siguranță, neeliberarea frânei de ajutor;</td>
                <td class="puncte"> -3 puncte</td>
            </tr>
            <tr>
                <td class="desc" style="border-bottom: 3px solid black;">Necunoașterea aparaturii de bord sau a comenzilor autovehiculului.</td>
                <td class="puncte" style="border-bottom: 3px solid black;"> -3 puncte</td>
            </tr>

            <tr>
                <td rowspan="8" class="principal">II. COMPORTARE ÎN TRAFIC<br><br>MANEVRAREA ȘI POZIȚIA AUTOVEHICULULUI ÎN TIMPUL MERSULUI</td>
                <td class="desc">Nesincronizarea comenzilor (oprirea motorului, accelerarea excesivă, folosirea incorectă a treptelor de viteză);</td>
                <td class="puncte">-5 puncte</td>
            </tr>
            <tr>
                <td class="desc">Nemenținerea direcției de mers;</td>
                <td class="puncte">-9 puncte</td>
            </tr>
            <tr>
                <td class="desc">Folosirea incorectă a drumului cu sau fără marcaj;</td>
                <td class="puncte">-6 puncte</td>
            </tr>
            <tr>
                <td class="desc">Manevrarea incorectă la încrucișarea cu alte vehicule, inclusiv în spații restrânse;</td>
                <td class="puncte">-6 puncte</td>
            </tr>
            <tr>
                <td class="desc">Intoarcerea incorectă pe o stradă cu mai multe benzi de circulație pe sens;</td>
                <td class="puncte">-5 puncte</td>
            </tr>
            <tr>
                <td class="desc">Manevrarea incorectă la urcarea rampelor/coborârea pantelor lungi, la circulația în tuneluri;</td>
                <td class="puncte">-5 puncte</td>
            </tr>
            <tr>
                <td class="desc">Folosirea incorectă a luminilor de întâlnire/luminilor de drum;</td>
                <td class="puncte">-3 puncte</td>
            </tr>
            <tr>
                <td class="desc" style="border-bottom: 3px solid black;">Conducerea în mod neeconomic și agresiv pentru mediul înconjurător (turație excesivă, frânare/accelerare nejustificate);</td>
                <td class="puncte" style="border-bottom: 3px solid black;">-5 puncte</td>
            </tr>

            <tr>
                <td rowspan="4" class="principal">MANEVRE SPECIALE PRIVID SIGURANȚA TRAFICULUI</td>
                <td class="desc">Executarea incorectă a mersul înapoi;</td>
                <td class="puncte">-5 puncte</td>
            </tr>
            <tr>
                <td class="desc">Executarea incorectă a întoarcerii vehiculului cu fața în sens opus prin efectuarea manevrelor de mers înainte și înapoi;</td>
                <td class="puncte">-5 puncte</td>
            </tr>
            <tr>
                <td class="desc">Executarea incorectă a parcării cu fața, spatele sau lateral;</td>
                <td class="puncte">-5 puncte</td>
            </tr>
            <tr>
                <td class="desc" style="border-bottom: 3px solid black;">Executarea incorectă a frânării cu precizie;</td>
                <td class="puncte" style="border-bottom: 3px solid black;">-5 puncte</td>
            </tr>

            <tr>
                <td rowspan="3" class="principal">SCHIMBAREA DIRECȚIEI DE MERS ȘI EFECTUAREA VIRAJELOR</td>
                <td class="desc">Neasigurarea la schimbarea direcției de mers/ la părăsirea locului de staționare;</td>
                <td class="puncte">-9 puncte</td>
            </tr>
            <tr>
                <td class="desc">Executarea neregulamentară a virajelor;</td>
                <td class="puncte">-6 puncte</td>
            </tr>
            <tr>
                <td class="desc" style="border-bottom: 3px solid black;">Nesemnalizarea sau semnalizarea greșită a schimbării direcției de mers.</td>
                <td class="puncte" style="border-bottom: 3px solid black;">-6 puncte</td>
            </tr>

            <tr>
                <td rowspan="5" class="principal">CIRCULAȚIA ÎN INTERSECȚII, POZIȚII ÎN TIMPUL MERSULUI</td>
                <td class="desc">Incadrarea necorespunzătoare în raport cu direcția de mers indicată;</td>
                <td class="puncte">-6 puncte</td>
            </tr>
            <tr>
                <td class="desc">Efectuarea unor manevre interzise (oprire, staționare, întoarcere, mers înapoi);</td>
                <td class="puncte">-6 puncte</td>
            </tr>
            <tr>
                <td class="desc">Neasigurare la pătrunderea în intersecții;</td>
                <td class="puncte">-9 puncte</td>
            </tr>
            <tr>
                <td class="desc">Folosirea incorectă a benzilor la intrarea/ieșirea pe/de pe autostradă/artere similare;</td>
                <td class="puncte">-5 puncte</td>
            </tr>
            <tr>
                <td class="desc" style="border-bottom: 3px solid black;">Nepăstrarea distanței suficiente față de cei care rulează înainte sau vin din sens opus. </td>
                <td class="puncte" style="border-bottom: 3px solid black;">-9 puncte</td>
            </tr>

            <tr>
                <td rowspan="2" class="principal">DEPĂȘIREA</td>
                <td class="desc">Ezitarea repetată de a depăși alte vehicule;</td>
                <td class="puncte">-3 puncte</td>
            </tr>
            <tr>
                <td class="desc" style="border-bottom: 3px solid black;">Nerespectarea regulilor de executare a depășirii ori efectuarea acestora în locuri și situații interzise.</td>
                <td class="puncte" style="border-bottom: 3px solid black;">-21 puncte</td>
            </tr>

            <tr>
                <td rowspan="2" class="principal">PRIORITATEA</td>
                <td class="desc" >Neacordarea priorității vehiculelor și pietonilor care au acest drept (la plecarea de pe loc, în intersecții, sens giratoriu, stație de mijloc de transport în comun prevăzută cu alveolă, stație de tramvai fără refugiu pentru pietoni, trecere de pietoni);</td>
                <td class="puncte">-21 puncte</td>
            </tr>
            <tr>
                <td class="desc" style="border-bottom: 3px solid black;">Tendințe repetate de a ceda trecerea vehiculelor și pietonilor care nu au prioritate.</td>
                <td class="puncte" style="border-bottom: 3px solid black;">-6 puncte</td>
            </tr>

            <tr>
                <td rowspan="2" class="principal">NERESPECTAREA SEMNIFICAȚIEI INDICATOARELOR ȘI MIJLOACELOR DE SEMNALIZARE RUTIERĂ</td>
                <td class="desc">Nerespectarea semnificației indicatoarelor/ marcajelor/ culorilor semaforului (cu excepția culorii roșii);</td>
                <td class="puncte">-9 puncte</td>
            </tr>
            <tr>
                <td class="desc" style="border-bottom: 3px solid black;">Nerespectarea semnificației culorii roșii a semaforului/ a semnalelor polițistului rutier/ a semnalelor altor persoane cu atribuții legale similare.</td>
                <td class="puncte" style="border-bottom: 3px solid black;">-21 puncte</td>
            </tr>

            <tr>
                <td rowspan="2" class="principal">VITEZA</td>
                <td class="desc">Depășirea vitezei maxime admise;</td>
                <td class="puncte">-5 puncte</td>
            </tr>
            <tr>
                <td class="desc" style="border-bottom: 3px solid black;">Conducerea cu viteză redusă în mod nejustificat, neîncadrarea în ritmul impus de ceilalți participanți la trafic.</td>
                <td class="puncte" style="border-bottom: 3px solid black;">-3 puncte</td>
            </tr>

            <tr>
                <td rowspan="2" class="principal">CONDUCEREA PE TIMP NEFAVORABIL</td>
                <td class="desc">Neîndemânarea în conducere în condiții de ploaie, zăpadă, mâzgă, polei;</td>
                <td class="puncte">-9 puncte</td>
            </tr>
            <tr>
                <td class="desc" style="border-bottom: 3px solid black;">Deplasarea cu viteza neadaptată condițiilor atmosferice și de drum.</td>
                <td class="puncte" style="border-bottom: 3px solid black;">-9 puncte</td>
            </tr>

            <tr>
                <td rowspan="1" class="principal">NERESPECTAREA NORMELOR LEGALE LA TRECERILE LA NIVEL CU CALEA FERATĂ.</td>
                <td class="desc" style="border-bottom: 3px solid black;">Nerespectarea normelor legale la trecerile la nivel cu calea ferată.</td>
                <td class="puncte" style="border-bottom: 3px solid black;">-21 puncte</td>
            </tr>

            <tr>
                <td rowspan="2" class="principal">III. ALTE SITUAȚII CARE CONDUC LA ACORDAREA CALIFICATIVULUI "RESPINS"</td>
                <td class="desc">Prezentarea la examen sub influența băuturilor alcoolice, substanțelor sau produselor stupefiante, a medicamentelor cu efecte similare acestora sau manifestări de natură să perturbe examinarea celorlalți candidați;</td>
                <td class="puncte">-21 puncte</td>
            </tr>
            <tr>
                <td class="desc" style="border-bottom: 3px solid black;">Intervenția examinatorului pentru evitarea unui pericol iminent/ producerea unui eveniment rutier.</td>
                <td class="puncte" style="border-bottom: 3px solid black;">-21 puncte</td>
            </tr>
        </table>
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