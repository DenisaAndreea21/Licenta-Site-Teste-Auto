<?php

function setComment($pdo){
    if(isset($_POST['commentSubmit'])){
        $data = $_POST['date'];
        $comentariu = $_POST['comment'];
        $nume = $_SESSION["user_firstName"] . " " . $_SESSION["user_lastName"];
        
        $query = "INSERT INTO forum (username, date, comment) VALUES (:nume, :data, :comentariu)";
        $stmt = $pdo->prepare($query);
        
        $stmt->bindParam(':nume', $nume);
        $stmt->bindParam(':data', $data);
        $stmt->bindParam(':comentariu', $comentariu);
        
        $stmt->execute();
    }
}

function getComments($pdo){
    $query = "SELECT * FROM forum;";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo '<div class="comms">';
    foreach ($results as $result) {
        echo '<div class="comentariu">';
            echo '<div class="contComm">';
                echo '<p class="commUsername">' . htmlspecialchars($result["username"]) . '</p>';
                echo '<p class="commDate">' . htmlspecialchars($result["date"]) . '</p>';
            echo '</div>';
            
            echo '<p class="commText">' . nl2br(htmlspecialchars($result["comment"])) . '</p>';
        echo '</div>';
    }
    echo '</div>';
}