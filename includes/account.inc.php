<?php

function print_name(){
    if(isset($_SESSION["user_firstName"]) && isset($_SESSION["user_lastName"])){
        echo $_SESSION["user_firstName"] . " " . $_SESSION["user_lastName"];
    } 
}

function print_email(){
    if(isset($_SESSION["user_email"])){
        echo $_SESSION["user_email"];
    } 
}