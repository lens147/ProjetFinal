<?php

    session_start();
    include_once('./../services/crud.php');
    $db = new Crud("mysql:host=localhost;dbname=projetfinal;charset=utf8mb4", "root", "");
    $titre = htmlspecialchars($_POST['titre']);
    $image = htmlspecialchars($_POST['image']);
    $oeuvre_id = htmlspecialchars($_GET['id']);

    date_default_timezone_set("Europe/Paris");

    $modification = date("Y-m-d H:i:s");
    $oeuvres = $db->oneOeuvre($oeuvre_id);

    $image = $oeuvres[0]['image'];



    if ($titre == "" || $image == "") {
        header("Location: ./../update?id=$oeuvre_id");
    }else{
        $addOeuvre =  $db->modifOeuvre($titre, $modification, $image, $oeuvre_id);
        header('Location: ./../admin');
}

?>