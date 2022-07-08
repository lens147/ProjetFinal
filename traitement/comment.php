<?php

    include_once('./../services/crud.php');

    $db = new Crud("mysql:host=localhost;dbname=projetfinal;charset=utf8mb4", "root", "");

    session_start();

    $comment = htmlspecialchars($_POST['comment']);
    $oeuvre_id = $_GET['id'];

    $id_user = $_SESSION['id_user'];

    if ($comment != '') {
        $commentaire = $db->addComment($comment, $id_user, $oeuvre_id);
    }
    header("Location: ./../single?id=$oeuvre_id");
    exit();


?>