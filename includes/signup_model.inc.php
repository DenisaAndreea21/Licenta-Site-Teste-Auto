<?php 

declare(strict_types=1);

function get_email(object $pdo, string $email){
    $query = "SELECT email FROM users WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $ln, string $fn, string $email, string $pw){
    $query = "INSERT INTO users (nume, prenume, email, parola) VALUES (:ln, :fn, :email, :parola)";
    $stmt = $pdo->prepare($query);

    $options = [
        'cost' => 12
    ];
    $hashed_password = password_hash($pw, PASSWORD_BCRYPT, $options);

    $stmt->bindParam(":ln", $ln);
    $stmt->bindParam(":fn", $fn);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":parola", $hashed_password);
    $stmt->execute();
}