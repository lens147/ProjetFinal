<?php

    include_once('./../services/crud.php');

    $id_user = htmlspecialchars($_GET['id']);

    $db = new Crud("mysql:host=localhost;dbname=projetfinal", "root", "");

    $users = $db->confirmation($id_user);

    echo "Merci d'avoir confirmé :)";

?>