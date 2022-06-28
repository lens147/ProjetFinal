<?php

    include_once('./../services/crud.php');

    $token_user = htmlspecialchars($_GET['id']);

    $db = new Crud("mysql:host=localhost;dbname=projetfinal", "root", "");

    $users = $db->confirmation($token_user);

    echo "Merci d'avoir confirmé :)";

?>