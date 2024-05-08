<?php
// Porneste o sesiune nouă
session_start();
require "includes/dbh.inc.php";
$raspunsuri_corecte = [];

if (!isset($_SESSION['timer_started']) || isset($_POST['start_new_quiz'])) {
    // Setează sesiunea pentru timer
    $_SESSION['timer_started'] = true;
    // Setează timpul de start al sesiunii
    $_SESSION['timer_start_time'] = time();
}

$elapsed_time = time() - $_SESSION['timer_start_time'];
$remaining_time = 1800 - $elapsed_time;

// Initializează array-ul de numere dacă nu există deja în sesiune
if (!isset($_SESSION['id_question_generator']) || empty($_SESSION['id_question_generator'])) {
    $_SESSION['id_question_generator'] = [];
    $_SESSION['raspunsuri_corecte'] = 0;
    $_SESSION['raspunsuri_gresite'] = 0;
    // Generează 5 numere random între 1 și 10 la începutul sesiunii
    /*
    while (count($_SESSION['id_question_generator']) < 2) {
        $id_random = rand(25, 26);

        if (!in_array($id_random, $_SESSION['id_question_generator'])) {
            $_SESSION['id_question_generator'][] = $id_random;
            echo $id_random . " + ";
        }
    }
    */
    $cat1 = [];
    $cat2 = [];
    $cat3 = [];
    $cat4 = [];
    $cat5 = [];
    $cat6 = [];
    $cat7 = [];
    while (count($_SESSION['id_question_generator']) < 26) {
        
        if(count($cat1)<1){
            $id_random = rand(1, 25);
            if (!in_array($id_random, $_SESSION['id_question_generator'])) {
                $_SESSION['id_question_generator'][] = $id_random;
                array_push($cat1, $id_random);
            }
        }
        else if(count($cat2)<2){
            $id_random = rand(26, 81);
            if (!in_array($id_random, $_SESSION['id_question_generator'])) {
                $_SESSION['id_question_generator'][] = $id_random;
                array_push($cat2, $id_random);
            }
        }
        else if(count($cat3)<5){
            $id_random = rand(82, 231);
            if (!in_array($id_random, $_SESSION['id_question_generator'])) {
                $_SESSION['id_question_generator'][] = $id_random;
                array_push($cat3, $id_random);
            }
        }
        else if(count($cat4)< 10){
            $id_random = rand(232, 356);
            if (!in_array($id_random, $_SESSION['id_question_generator'])) {
                $_SESSION['id_question_generator'][] = $id_random;
                array_push($cat4, $id_random);
            }
        }
        else if(count($cat5)< 2){
            $id_random = rand(357, 425);
            if (!in_array($id_random, $_SESSION['id_question_generator'])) {
                $_SESSION['id_question_generator'][] = $id_random;
                array_push($cat5, $id_random);
            }
        }
        else if(count($cat6)< 5){
            $id_random = rand(426, 515);
            if (!in_array($id_random, $_SESSION['id_question_generator'])) {
                $_SESSION['id_question_generator'][] = $id_random;
                array_push($cat6, $id_random);
            }
        }
        else if(count($cat7)< 1){
            $id_random = rand(516, 540);
            if (!in_array($id_random, $_SESSION['id_question_generator'])) {
                $_SESSION['id_question_generator'][] = $id_random;
                array_push($cat7, $id_random);
            }
        }
    } 
    shuffle($_SESSION['id_question_generator']);
    print_r($_SESSION['id_question_generator']);
}

try{
    if (!empty($_SESSION['id_question_generator'])) {
        $query = "SELECT is_correct
                    FROM answers
                    WHERE question_id = {$_SESSION['id_question_generator'][0]};";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $raspunsuri_corecte = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo "din bd";
            print_r($raspunsuri_corecte);
    }else {
        echo "Toate întrebările au fost completate!";
        header("Location: result.php");
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
        $correct_answers = array_column($raspunsuri_corecte, 'is_correct');
        if ($final == $correct_answers) {
                $_SESSION['raspunsuri_corecte']++;
        } else {
                $_SESSION['raspunsuri_gresite']++;
        }
        array_shift($_SESSION['id_question_generator']);
    } 
    else{
        $showErrorMessage = true;
    }
}


// Verifică dacă a fost apăsat butonul "Skip"
if (isset($_POST['skip'])) {
    if (!empty($_SESSION['id_question_generator'])) {
        // Muta prima valoare din array la coadă
        $firstElement = array_shift($_SESSION['id_question_generator']);
        array_push($_SESSION['id_question_generator'], $firstElement);
    }
}

try {
    if (!empty($_SESSION['id_question_generator'])) {
        $query = "SELECT question_text, image_url
                FROM questions
                WHERE question_id = {$_SESSION['id_question_generator'][0]};";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $intrebare = $stmt->fetch(PDO::FETCH_ASSOC);

        $query = "SELECT answer_text
                FROM answers
                WHERE question_id = {$_SESSION['id_question_generator'][0]};";
        $stmt = $pdo->prepare($query);

        $stmt->execute();
        $raspunsuri = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $variante = ['A', 'B', 'C'];
    } else {
        echo "Toate întrebările au fost completate!";
        header("Location: result.php");
        exit();
    }
    $pdo = null;
    $stmt = null;
} catch (PDOException $e) {
    die ("Eroare la interogare: " . $e->getMessage());
}
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
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/chestionar.css">
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
        </div>
    </div>
        
        

        <div class="informatii-chestionar">
            <p>Intrebari ramase: <?php echo count($_SESSION['id_question_generator']);?></p>
            <div class="rezultate_raspunsuri">
                <p class="r_corecte">Răspunsuri corecte: <span><?php echo $_SESSION['raspunsuri_corecte'];?></span></p>
                <p class="r_gresite">Răspunsuri greșite: <span><?php echo $_SESSION['raspunsuri_gresite'];?></span></p>
            </div>
            <div class="timp">
                <img src="img/timer.png" alt="timer">
                <div id="timer"></div>
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
                        <?php if (!empty($_SESSION['id_question_generator'])): ?>

                            <?php if(count($_SESSION['id_question_generator']) > 1) { ?>
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
                                <?php session_destroy(); ?>
                                window.location.href = "result.php";
                            </script>
                        <?php endif; ?>
                    </div>
                </form>
            </div> 
        </div> 
        <div id="mesaj-eroare" <?php if ($showErrorMessage) echo 'style="display: block;"'; ?>>
            <p>Selectează un răspuns!</p>
        </div>
           
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
</html>

<!-- Selectare raspunsuri -->

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

<!-- Logica Timer -->
<script>
    // timerul în milisecunde
    var timerDuration = <?php echo $remaining_time * 1000; ?>;

    // afișare timer
    updateTimer();

    // Pornesc timerul
    var timer = setInterval(function() {
        timerDuration -= 1000;
        updateTimer();

        // verific dacă a expirat
        if (timerDuration <= 0) {
            clearInterval(timer); // Oprire timer
            alert("Timpul a expirat!"); 
            window.location.href = 'result.php'; 
        }
    }, 1000); // se repetă la fiecare secundă

    // afișare timer
    function updateTimer() {
        var minutes = Math.floor(timerDuration / 60000);
        var seconds = Math.floor((timerDuration % 60000) / 1000);

        var formattedTime = (minutes < 10 ? '0' : '') + minutes + ':' + (seconds < 10 ? '0' : '') + seconds;

        document.getElementById('timer').innerHTML = "Timp rămas: " + formattedTime;
    }
</script>

<!-- Afisam eroarea pentru o secunda -->
<script>
    setTimeout(function() {
        document.getElementById('mesaj-eroare').style.display = 'none';
    }, 1000);
</script>