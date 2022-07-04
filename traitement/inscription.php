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


    $token = uniqid('', true);


    $hash = hash('sha1', $password);

    $db = new Crud("mysql:host=localhost;dbname=projetfinal;charset=utf8mb4", "root", "");

    if ($password_good && $email_validator && $pseudo_regex && $password_regex && $lastname_regex && $name_regex){

        if($db->insertIntoInscription($lastname, $name, $email, $pseudo, $hash, $token)){

            $nom = "Confirmation Biche";
            $subject = "Confirmation de l'email";
            $message = " Confirmer votre adresse email



            Nous vous remercions d’avoir créé un compte sur Biche.
            
            
            Nous vous invitons à cliquer sur le lien ci-dessous pour confirmer votre email.
            
            
            Lien de confirmation : http://localhost/CCP/projetFinal/traitement/confirmation.php?id=$token";

            $header = 'From:'.$nom;
        
            mail($email,$subject,$message, $header);


            header("Location: ./../thank");
            exit();
        }else{
            $error_equal_email_or_pseudo = false;
            header("Location: ./../inscription");
            exit();
        }
    }else{
        header("Location: ./../inscription");
        exit();
    }



?>