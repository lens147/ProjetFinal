<?php

    $id_user = $_GET['id'];

    include_once('./../services/crud.php');

    $lastname = htmlspecialchars($_POST["lastname"]);
    $name = htmlspecialchars($_POST["name"]);
    $pseudo = htmlspecialchars($_POST["pseudo"]);
    $email = htmlspecialchars($_POST["email"]);
    $description = htmlspecialchars($_POST["description"]);


    $email_validator = (filter_var($email, FILTER_VALIDATE_EMAIL));

    $max_name = '/[a-zA-Z0-9]{3,20}/';
    $name_regex = (preg_match($max_name, $name));

    $max_lastname = '/[a-zA-Z0-9]{3,20}/';
    $lastname_regex = (preg_match($max_lastname, $lastname));

    $max_pseudo = '/[a-zA-Z0-9?!@#$%^&*-=&]{3,25}/';
    $pseudo_regex = (preg_match($max_pseudo, $pseudo));
    

    $db = new Crud("mysql:host=localhost;dbname=projetfinal;charset=utf8mb4", "root", "");

    if ($email_validator && $pseudo_regex && $lastname_regex && $name_regex){

        if($db->userModif($name, $lastname, $email, $pseudo, $description, $id_user)){
            session_start();
            $_SESSION['pseudo'] = $pseudo;
            header("Location: ./../compte");
            exit();
        }else{
            $error_equal_email_or_pseudo = false;
            header("Location: ./../compte");
            exit();
        }
    }else{
        header("Location: ./../accueil");
        exit();
    }


?>