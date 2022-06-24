<?php

/*     ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); */


    require_once('../services/crud.php');

    $lastname = htmlspecialchars($_POST["lastname"]);
    $name = htmlspecialchars($_POST["name"]);
    $pseudo = htmlspecialchars($_POST["pseudo"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    $confirm_password = htmlspecialchars($_POST["confirm_password"]);


    $email_validator = (filter_var($email, FILTER_VALIDATE_EMAIL));

    $max_name = '/[a-zA-Z0-9]{3,20}/';
    $name_regex = (preg_match($max_name, $name));

    $max_lastname = '/[a-zA-Z0-9]{3,20}/';
    $lastname_regex = (preg_match($max_lastname, $lastname));

    $max_pseudo = '/[a-zA-Z0-9?!@#$%^&*-=&]{3,25}/';
    $pseudo_regex = (preg_match($max_pseudo, $pseudo));

    $max_password = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{6,25}$/';
    $password_regex = (preg_match($max_password, $password));

    if ($password === "" || $password !== $confirm_password) {
        $password_good = false;
    }
    else {
        $password_good = true;
    }

    
    $number = rand(2, 99999999999);

    $token = hash('sha1',$number);


    $hash = hash('sha1', $password);

    $db = new Crud("mysql:host=localhost;dbname=projetfinal", "root", "");

    if ($password_good && $email_validator && $pseudo_regex && $password_regex && $lastname_regex && $name_regex){

        if($db->insertIntoInscription($lastname, $name, $email, $pseudo, $hash, $token)){
            session_start();
            $_SESSION['pseudo'] = $pseudo;
            header("Location: ../vue/accueil.php");
            exit();
        }else{
            $error_equal_email_or_pseudo = false;
            header("Location: ../vue/inscription.php");
            exit();
        }
    }else{
        header("Location: ../vue/inscription.php");
        exit();
    }



?>