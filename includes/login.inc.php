<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $email = $_POST["mail"];
    $password = $_POST["pw"];

    try {
        require_once 'dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_control.inc.php';

        $errors = [];

        if(is_input_empty($email, $password)){
            $errors["empty_input"] = "Nu toate campurile au fost completate!";
        }

        $result = get_user($pdo, $email);

        if(is_email_wrong($result)){
            $errors["wrong_email"] = "Datele introduse sunt incorecte!";
        }

        if(!is_email_wrong($result) && is_password_wrong($password, $result["parola"])){
            $errors["wrong_password"] = "Datele introduse sunt incorecte!";
        }

        require_once 'config_session.inc.php';

        if($errors){
            $_SESSION["errors_login"] = $errors;

            header("Location: ../logare.php");
            die();
        }

        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_firstName"] = htmlspecialchars($result["prenume"]);
        header("Location: ../logare.php?login=success");

        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

} else{
    header("Location: ../logare.php");
    die();
}