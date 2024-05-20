<?php 

declare(strict_types=1);

function check_signup_errors(){
    if(isset($_SESSION['errors_signup'])){
        $errors = $_SESSION['errors_signup'];

        echo '<br>';

        foreach ($errors as $error){
            echo '<p class="eroare">' . $error . '</p>';
        }

        unset($_SESSION['errors_signup']);
    } else if(isset($_GET["signup"]) && $_GET["signup"] === "success"){
        echo '<p class="succes">Inregistrare reusita!</p>'; 
    }
}

function signup_inputs(){

    if(isset($_SESSION["signup_data"]["nume"])){
        echo '<label for="lastName">Nume</label>
        <input type="text" id="lastName" name="nume" class="inputText" value="' . $_SESSION["signup_data"]["nume"] . '">';
    } else{
        echo '<label for="lastName">Nume</label>
        <input type="text" id="lastName" name="nume" class="inputText">';
    }

    if(isset($_SESSION["signup_data"]["prenume"])){
        echo '<label for="FirstName">Prenume</label>
        <input type="text" id="FirstName" name="prenume" class="inputText" value="' . $_SESSION["signup_data"]["prenume"] . '">';
    } else{
        echo '<label for="FirstName">Prenume</label>
        <input type="text" id="FirstName" name="prenume" class="inputText">';
    }

    if(isset($_SESSION["signup_data"]["email"]) && !(isset($_SESSION["errors_signup"]["email_taken"])) && !(isset($_SESSION["errors_signup"]["invalid_email"]))){
        echo '<label for="email">Adresă de email</label>
        <input type="text" id="email" name="mail" class="inputText" value="' . $_SESSION["signup_data"]["email"] . '">';
    } else{
        echo '<label for="email">Adresă de email</label>
        <input type="text" id="email" name="mail" class="inputText">';
    }

    echo '<label for="password">Parolă</label>
    <input type="password" id="password" name="pw" class="inputText">';

}

