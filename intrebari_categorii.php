<?php
session_start();
unset($_SESSION['id_question_generator']);
unset($_SESSION['timer_started']);
require "includes/dbh.inc.php";
$isCategorieDisplayed = false;
//doar daca se selecteaza categorie
if (isset($_GET['categorie'])) {
    $categorie = $_GET['categorie'];
    $isCategorieDisplayed = true;
    if (!isset($_SESSION['id_intrebari']) || empty($_SESSION['id_intrebari'])){
        $_SESSION['id_intrebari'] = [];
        $_SESSION['rasp_corecte'] = 0;
        $_SESSION['rasp_gresite'] = 0;
        //extragem id-urile la intrebarile din :categorie
        try {
            $query = "SELECT question_id
            FROM questions
            WHERE category = :categorie";

            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':categorie', $categorie, PDO::PARAM_STR);
            $stmt->execute();
            $_SESSION['id_intrebari'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt = $pdo->prepare($query);
            $stmt = null;
        } catch (PDOException $e) {
            die ("Eroare la interogare id: " . $e->getMessage());
        }
    }

    //extragem raspunsuri corecte din bd
    try{
        if (!empty($_SESSION['id_intrebari'])) {
            $first_question_id = $_SESSION['id_intrebari'][0]['question_id'];
            $query = "SELECT is_correct
                        FROM answers
                        WHERE question_id = :question_id";
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(':question_id', $first_question_id, PDO::PARAM_INT);
                $stmt->execute();
                $raspunsuri_corecte = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $correct_answers = array_column($raspunsuri_corecte, 'is_correct');
        }else {
            echo "Toate întrebările au fost completate!";
            header("Location: intrebari_categorii.php");
            session_destroy();
            session_unset();
            exit();
        }
    } catch (PDOException $e) {
    die ("Eroare la interogare raspunsuri: " . $e->getMessage());
    }

    $showErrorMessage = false;
    // Verifică dacă a fost apăsat butonul "Trimite"
    if (isset($_POST['trimite'])) {
        // Verifică dacă există răspunsuri selectate
        if (!empty($_POST['selected_answers'])) {
            $final = [];
    
            if (in_array('A', $_POST['selected_answers'])){
                $final[0]= 1 ;
            }else{
                $final[0]= 0 ;
            }
    
            if (in_array('B', $_POST['selected_answers'])){
                $final[1]= 1 ;
            }else{
                $final[1]= 0 ;
            }
    
            if (in_array('C', $_POST['selected_answers'])){
                $final[2]= 1 ;
            }else{
                $final[2]= 0 ;
            }
        
            if ($final == $correct_answers) {
                $_SESSION['rasp_corecte']++;
            } else {
                $_SESSION['rasp_gresite']++;
            }
            array_shift($_SESSION['id_intrebari']);
        } 
        else{
            $showErrorMessage = true;
        }
    }

    // Verifică dacă a fost apăsat butonul "Skip"
    if (isset($_POST['skip'])) {
        if (!empty($_SESSION['id_intrebari'])) {
            // Muta prima valoare din array la coadă
            $firstElement = array_shift($_SESSION['id_intrebari']);
            array_push($_SESSION['id_intrebari'], $firstElement);
        }
    }

    //extragem informatiile pentru primul id din array-ul id_intrebari
    try {
        if (!empty($_SESSION['id_intrebari'])) {
            $first_question_id = $_SESSION['id_intrebari'][0]['question_id'];

            $query = "SELECT question_text, image_url, question_id
                    FROM questions
                    WHERE question_id = :question_id";
            
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':question_id', $first_question_id, PDO::PARAM_INT);
            $stmt->execute();
            $intrebare = $stmt->fetch(PDO::FETCH_ASSOC);
    
            $next = $_SESSION['id_intrebari'][0]['question_id'];
            $query = "SELECT is_correct
                        FROM answers
                        WHERE question_id = :question_id";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':question_id', $next, PDO::PARAM_INT);
            $stmt->execute();
            $raspunsuri_corecte_actuale = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $actual_correct_answers = array_column($raspunsuri_corecte_actuale, 'is_correct');
            
            $query = "SELECT answer_text
                    FROM answers
                    WHERE question_id = :question_id";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':question_id', $first_question_id, PDO::PARAM_INT);
            $stmt->execute();
            $raspunsuri = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $variante = ['A', 'B', 'C'];

            $query = "SELECT justificari_text
                    FROM justificari
                    WHERE question_id = :question_id";
            
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':question_id', $first_question_id, PDO::PARAM_INT);
            $stmt->execute();
            $justificare = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            echo "Toate întrebările au fost completate!";
            session_destroy();
            session_unset();
            header("Location: intrebari_categorii.php");
            exit();
        }
        $stmt = null;
    } catch (PDOException $e) {
        die ("Eroare la interogare info: " . $e->getMessage());
    }
}
else{
    unset($_SESSION['id_intrebari']);
}?>
<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TraseuSigur - Întrebări pe categorii</title>
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
    <link rel="stylesheet" href="css/chestionar.css">
    <link rel="stylesheet" href="css/intrebari_categorii.css">
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
                        <li><a href="mediu_invatare.php" style="color:pink;">Mediu de învățare</a></li>
                        <li><a href="chestionar.php" style="color:var(--kindOfWhite);">Mediu de testare</a></li>
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

            <!-- intro -->
            <?php if ($isCategorieDisplayed): ?>
                <?php switch($categorie):
                    case "1": ?>
                        <h3 class="intro">Întrebări - Mecanică</h3>
                        <?php break;
                    case "2": ?>
                        <h3 class="intro">Întrebări - Conduita în traficul urban și rural</h3>
                        <?php break;
                    case "3": ?>
                        <h3 class="intro">Întrebări - Conduita șoferului</h3>
                        <?php break;
                    case "4": ?>
                        <h3 class="intro">Întrebări - Legislație rutieră generală</h3>
                        <?php break;
                    case "5": ?>
                        <h3 class="intro">Întrebări - Mediu și siguranță</h3>
                        <?php break;
                    case "6": ?>
                        <h3 class="intro">Întrebări - Semne de circulație</h3>
                        <?php break;
                    case "7": ?>
                        <h3 class="intro">Întrebări - Primul ajutor</h3>
                        <?php break;
                    default: ?>
                        <h3 class="intro">Întrebări pe categorii</h3>
                        <?php break;
                endswitch; ?>
            <?php else: ?>
                <h3 class="intro">Întrebări pe categorii</h3>
            <?php endif; ?>

        </div>
    </div>
    <?php if($isCategorieDisplayed){ ?>
        <div class="wrapper-index">
            <a class="backBtn" href="intrebari_categorii.php">
                <div>
                    <img src="img/back.png" alt="">
                    <p>Înapoi</p>
                </div>
            </a>
        </div>
        <div class="informatii-chestionar">
            <div class="rezultate_raspunsuri">
                <p style="margin-right: 15px;">Intrebari ramase: <?php echo count($_SESSION['id_intrebari']);?></p>
                <p>ID intrebare: <?php echo $intrebare['question_id'];?></p>
            </div>
            <div class="rezultate_raspunsuri">
                <p class="r_corecte">Răspunsuri corecte: <span><?php echo $_SESSION['rasp_corecte'];?></span></p>
                <p class="r_gresite">Răspunsuri greșite: <span><?php echo $_SESSION['rasp_gresite'];?></span></p>
            </div>
        </div>
        <div class = "chestionar">

            <!-- Intrebare --> 
            <p class = "intrebare"><?php echo $intrebare['question_text']; ?></p>
            <!-- Raspunsuri --> 
            <div>
                <form class="raspunsuri" method="post">
                    <div class="containter-raspunsuri">
                        <!-- Imagine -->
                        <?php if($intrebare['image_url']){ ?>
                            <img src="<?php echo "$intrebare[image_url]"; ?>" alt="">
                        <?php } ?>

                        <div class="rasp">
                        <?php 
                        foreach ($raspunsuri as $raspuns => $row) {?>
                            <div class="raspuns" onclick="toggleSelection(this)">
                                <p><?php echo $variante[$raspuns] . '. ' . $row['answer_text']; ?></p>
                                <input type="checkbox" name="selected_answers[]" value="<?php echo $variante[$raspuns]; ?>" style="display: none;">
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- Butoane -->
                    <div class="butoane">
                        <?php if (!empty($_SESSION['id_intrebari'])): ?>
                            <button class="verificationBtn" onclick="displayText(event)">
                                <div>
                                    <img src="img/verifica.png" alt="">
                                    <p>Verifică</p>
                                </div>
                            </button>

                            <?php if(count($_SESSION['id_intrebari']) > 1) { ?>
                                <button class="answerLaterBtn" type="submit" name="skip">
                                    <div>
                                       <img src="img/later.png" alt="2 arrows">
                                     <p>Mai târziu</p>
                                    </div>
                                </button>
                            <?php } ?>

                            <button class="submitAnswerBtn" type="submit" name="trimite">
                                <div>
                                    <img src="img/send.png" alt="right arrow">
                                    <p>Trimite</p>
                                </div>
                            </button>
                        <?php else: ?>
                            <!-- Redirectează către altă pagină când nu mai sunt valori în array -->
                            <script>
                                <?php session_destroy();
                                session_unset(); ?>
                                window.location.href = "intrebari_categorii.php";
                            </script>
                        <?php endif; ?>
                    </div>
                </form>
            </div> 
        </div> 
        <div class="justificare wrapper-index">
            <p id="raspuns-verificare"></p>
            <p id="text-verificare"></p>
        </div>
        <div id="mesaj-eroare" <?php if ($showErrorMessage) echo 'style="display: block;"'; ?>>
            <p>Selectează un răspuns!</p>
        </div>
    <?php }  
    else { ?>
        <!-- Categorii -->
        <div class="wrapper-index">
            <a class="backBtn" href="mediu_invatare.php">
                <div>
                    <img src="img/back.png" alt="">
                    <p>Înapoi</p>
                </div>
            </a>

            <div class="sectiune-categorii">
                <div class="row">
                    <div class="categorie">
                        <h3>Semne de circulație</h3>
                        <img src="img/semne de circulatie.png" alt="">
                        <ul>
                            <div class="element"><img src="img/circle.png" alt=""><li>Indicatoare</li></div>
                            <div class="element"><img src="img/circle.png" alt=""><li>Semnalele polițistului</li></div>
                            <div class="element"><img src="img/circle.png" alt=""><li>Semnale luminoase</li></div>
                            <div class="element"><img src="img/circle.png" alt=""><li>Semnalele conducătorilor auto</li></div>
                            <div class="element"><img src="img/circle.png" alt=""><li>Semnalele bicicliștilor</li></div>
                        </ul>
                        <a href="intrebari_categorii.php?categorie=6">Mergi la capitol</a>
                    </div>
    
                    <div class="categorie">
                        <h3>Legislație rutieră generală</h3>
                        <img src="img/legislatie.png" alt="">
                        <ul>
                            <div class="element"><img src="img/circle.png" alt=""><li>Reguli de bază de circulație rutieră</li></div>
                            <div class="element"><img src="img/circle.png" alt=""><li>Reguli de prioritate </li></div>
                            <div class="element"><img src="img/circle.png" alt=""><li>Reguli referitoare la manevre </li></div>
                        </ul>
                        <a href="intrebari_categorii.php?categorie=4">Mergi la capitol</a>
                    </div>
    
                    <div class="categorie">
                        <h3>Mecanică</h3>
                        <img src="img/mecanica.png" alt="">
                        <ul>
                            <div class="element"><img src="img/circle.png" alt=""><li>Noțiuni despre mecanica mașinii</li></div>
                        </ul>
                        <a href="intrebari_categorii.php?categorie=1">Mergi la capitol</a>
                    </div>
                </div>
    
                <div class="row">
                    <div class="categorie">
                        <h3>Conduita în traficul urban și rural</h3>
                        <img src="img/conduita in traficul urban si rural.png" alt="">
                        <ul>
                            <div class="element"><img src="img/circle.png" alt=""><li>Comportamentul șoferului în diferite medii de trafic</li></div>
                        </ul>
                        <a href="intrebari_categorii.php?categorie=2">Mergi la capitol</a>
                    </div>
    
                    <div class="categorie">
                        <h3>Conduita șoferului</h3>
                        <img src="img/conduita soferului.png" alt="">
                        <ul>
                            <div class="element"><img src="img/circle.png" alt=""><li>Conduita preventivă</li></div>
                            <div class="element"><img src="img/circle.png" alt=""><li>Depășirea altor vehicule</li></div>
                            <div class="element"><img src="img/circle.png" alt=""><li>Parcarea </li></div>
                        </ul>
                        <a href="intrebari_categorii.php?categorie=3">Mergi la capitol</a>
                    </div>
    
                    <div class="categorie">
                        <h3>Mediu și siguranță</h3>
                        <img src="img/mediu si siguranta.png" alt="">
                        <ul>
                            <div class="element"><img src="img/circle.png" alt=""><li>Protecția mediului și siguranța traficului</li></div>
                            <div class="element"><img src="img/circle.png" alt=""><li>Sancțiuni</li></div>
                        </ul>
                        <a href="intrebari_categorii.php?categorie=5">Mergi la capitol</a>
                    </div>
                </div>
    
                <div class="categorie ultima">
                    <h3>Informații referitoare la acordarea primului ajutor</h3>
                    <img src="img/primul ajutor.png" alt="">
                    <ul>
                        <div class="element"><img src="img/circle.png" alt=""><li>Informații referitoare la acordarea primului ajutor</li></div>
                    </ul>
                    <a href="intrebari_categorii.php?categorie=7">Mergi la capitol</a>
                </div>
            </div>
        </div> 
    <?php } ?>

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

<script>
    var selected_answers = [];

    function toggleSelection(element) {
        element.classList.toggle("selected");

        var checkbox = element.querySelector('input[type="checkbox"]');
        checkbox.checked = !checkbox.checked;

        var submitButton = document.querySelector('.submitAnswerBtn');
        var selectedAnswers = document.querySelectorAll('.raspuns.selected');

        if (selectedAnswers.length > 0) {
            submitButton.classList.add('selected');
            selected_answers = Array.from(selectedAnswers).map(answer => {
                return checkbox.checked ? 1 : 0;
            });
        } else {
            submitButton.classList.remove('selected');
            selected_answers = [];
        }
        console.log("toggle " + selected_answers);
    }
</script>

<!-- Afisam eroarea pentru o secunda -->
<script>
    setTimeout(function() {
        document.getElementById('mesaj-eroare').style.display = 'none';
    }, 1000);
</script>

<script>
    function displayText(event) {
        event.preventDefault(); 
        var rezultat = "<?php echo $justificare['justificari_text']; ?>";

        <?php 
            $rasp_corect= "Răspunsul corect este: ";
            for ($i=0;$i<3;$i++){
                if($actual_correct_answers[$i]){
                    if($i==0){
                        $rasp_corect = $rasp_corect . "A ";
                    }
                    if($i==1){
                        $rasp_corect = $rasp_corect . "B ";
                    }
                    if($i==2){
                        $rasp_corect = $rasp_corect . "C";
                    }
                }
            }
        ?>
        document.getElementById('text-verificare').textContent = rezultat;
        document.getElementById('raspuns-verificare').textContent = "<?php echo $rasp_corect;?>";
    }
</script>

