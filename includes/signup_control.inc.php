<?php 

declare(strict_types=1);

function is_input_empty(string $ln, string $fn, string $email, string $pw){
    if(empty($ln) || empty($fn) || empty($pw) || empty($email)){
        return true;
    }
    else{
        return false;
    }
}

function is_email_invalid(string $email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }
    else{
        return false;
    }
}

function is_email_taken(object $pdo, string $email){
    if(get_email($pdo, $email)){
        return true;
    }
    else{
        return false;
    }
}

function create_user(object $pdo, string $ln, string $fn, string $email, string $pw){
    set_user($pdo, $ln, $fn, $email, $pw);
}