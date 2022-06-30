<?php

    include_once('./../services/crud.php');

    $db = new Crud("mysql:host=localhost;dbname=projetfinal", "root", "");

    session_start();

    $comment = htmlspecialchars($_POST['comment']);
    $oeuvre_id = htmlspecialchars($_GET['id']);

    $id_user = $_SESSION['id_user'];
    $name_user = $_SESSION['name'];

/*     var_dump($comment, $oeuvre_id, $id_user, $name_user);die(); */

    $commentaire = $db->addComment($comment, $id_user, $name_user, $oeuvre_id);


?>