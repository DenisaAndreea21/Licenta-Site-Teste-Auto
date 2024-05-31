<?php

function setComment($pdo) {
    if (isset($_POST['commentSubmit'])) {
        $data = $_POST['date'];
        $comentariu = $_POST['comment'];
        $nume = $_SESSION["user_firstName"] . " " . $_SESSION["user_lastName"];
        
        //imagine
        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $image = $_FILES['image'];
            $imageName = uniqid('', true) . "-" . basename($image['name']);
            $targetDir = 'uploads/';
            $targetFile = $targetDir . $imageName;
            
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }
            
        
            if (move_uploaded_file($image['tmp_name'], $targetFile)) {
                $imagePath = $targetFile;
            } else {
                die("Failed to upload image.");
            }
        } else {
            $imagePath = null;
        }

        //video
        $videoPath = null;
        if (isset($_FILES['video']) && $_FILES['video']['error'] == UPLOAD_ERR_OK) {
            $video = $_FILES['video'];
            $videoName = uniqid('', true) . "-" . basename($video['name']);
            $targetDir = 'uploads/videos/';
            $targetFile = $targetDir . $videoName;

            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            if (move_uploaded_file($video['tmp_name'], $targetFile)) {
                $videoPath = $targetFile;
            } else {
                die("Failed to upload video.");
            }
        }

        $query = "INSERT INTO forum (username, date, comment, image, video) VALUES (:nume, :data, :comentariu, :image, :video)";
        $stmt = $pdo->prepare($query);
        
        $stmt->bindParam(':nume', $nume);
        $stmt->bindParam(':data', $data);
        $stmt->bindParam(':comentariu', $comentariu);
        $stmt->bindParam(':image', $imagePath);
        $stmt->bindParam(':video', $videoPath);
        
        $stmt->execute();
    }
}

function getComments($pdo) {
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

            if (!empty($result['image'])) {
                echo '<img src="' . htmlspecialchars($result["image"]) . '" alt="User Image" class="commImage">';
            }
            if (!empty($result['video'])) {
                echo '<video controls class="commVideo">';
                echo '<source src="' . htmlspecialchars($result["video"]) . '" type="video/mp4">';
                echo 'Your browser does not support the video tag.';
            echo '</video>';            }
        echo '</div>';
    }
    echo '</div>';
}
