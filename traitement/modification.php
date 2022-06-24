<?php

    session_start();
    include_once('./../services/crud.php');

    $title = htmlspecialchars($_POST['title']);
    $modification = htmlspecialchars($_POST['modification']);
    $content = htmlspecialchars($_POST['content']);
    $oeuvre_id = $_GET['id'];

    date_default_timezone_set("Europe/Paris");

    $modification = date("Y-m-d H:i:s");

    $db = new Crud("mysql:host=localhost;dbname=projetfinal;charset=utf8mb4", "root", "");

    if ($title == "" || $content == "") {
        header("Location: ../vue/update.php?id=$oeuvre_id");
    }else{
        $addOeuvre =  $db->modifOeuvre($title, $modification, $content, $oeuvre_id);
        header('Location: ../vue/admin.php');
}

?>