<?php

    $email = htmlspecialchars($_POST["email"]);

    include_once('./../services/crud.php');

    $db = new Crud("mysql:host=localhost;dbname=projetfinal;charset=utf8mb4", "root", "");
    $tokens = $db->recuperation($email);

    $token = $tokens[0]['token'];

    $nom = "Récupération de Mot de Passe";
    $subject = "Récupération de votre Mot de Passe";
    $message = "Bonjour,
    voici votre lien de réinitialisation de mot de passe: http://localhost/CCP/projetFinal/renimdp?id=$token";

    $header = 'From:'.$nom;

    mail($email,$subject,$message,$header);

    header("Location: ./../login");
    exit;

?>