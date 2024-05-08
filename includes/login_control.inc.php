<?php

declare(strict_types=1);

function is_email_wrong(array|bool $result){
    if(!$result){
        return true;
    } else{
        return false;
    }
}

function is_password_wrong(string $pwd, string $hashedpwd){
    if(!password_verify($pwd, $hashedpwd)){
        return true;
    } else{
        return false;
    }
}

function is_input_empty(string $email, string $pwd){
    if(empty($pwd) || empty($email)){
        return true;
    }
    else{
        return false;
    }
} 