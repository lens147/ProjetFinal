<?php

    $email = htmlspecialchars($_POST["email"]);

    include_once('./../services/crud.php');

    $db = new Crud("mysql:host=localhost;dbname=projetfinal;charset=utf8mb4", "root", "");
    $tokens = $db->recuperation($email);

    $token = $tokens[0]['token'];


    $subject = "Récupération de Mot de Passe";
    $message = "Bonjour,
    voici le lien de réinitialisation de mot de passe: http://localhost/CCP/projetFinal/vue/renimdp.php?id=$token";

/*     mail($to,$subject,$message, $headers); */

    mail($email,$subject,$message);

    header("Location: ../vue/login.php");
    exit;

?>