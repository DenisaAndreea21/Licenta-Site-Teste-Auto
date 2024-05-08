<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $lastName = $_POST["nume"];
    $firstName = $_POST["prenume"];
    $email = $_POST["mail"];
    $password = $_POST["pw"];
    
    try {
        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_control.inc.php';

        $errors = [];

        if(is_input_empty($lastName, $firstName, $email, $password)){
            $errors["empty_input"] = "Nu toate campurile au fost completate!";
        }

        if(is_email_invalid($email)){
            $errors["invalid_email"] = "Email-ul folosit nu este valid!";
        }

        if(is_email_taken($pdo, $email)){
            $errors["email_taken"] = "Acest email a fost deja inregistrat!";
        }

        require_once 'config_session.inc.php';

        if($errors){
            $_SESSION["errors_signup"] = $errors;

            $signup_data = [
                "nume" => $lastName,
                "prenume" => $firstName,
                "email" => $email
            ];

            $_SESSION["signup_data"] = $signup_data;

            header("Location: ../inregistrare.php");
            die();
        }

        create_user($pdo, $lastName, $firstName, $email, $password);

        header("Location: ../inregistrare.php?signup=success");

        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}else{
    header("Location: ../inregistrare.php");
    die();
}