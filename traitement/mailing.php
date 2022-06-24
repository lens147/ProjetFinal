<?php

    $email = htmlspecialchars($_POST["email"]);

    include_once('./../services/crud.php');

    $db = new Crud("mysql:host=localhost;dbname=projetfinal;charset=utf8mb4", "root", "");
    $tokens = $db->recuperation($email);

    $test = $tokens[0]['token'];

    $send = mail("$email","Mot de Passe perdu","Bonjour, voici le lien de réinitialisation de mot de passe:
    http://localhost/CCP/projetFinal/vue/renimdp.php?id=$test");

    header("Location: ../vue/login.php");
    exit;

?>