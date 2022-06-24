<?php

    session_start();
    include_once('./../services/crud.php');

    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    $user_key = $_SESSION['id_user'];


    $db = new Crud("mysql:host=localhost;dbname=projetfinal;charset=utf8mb4", "root", "");

    if ($title == "" || $content == "") {
        header("Location: ../vue/create.php");
    }else{
        $addOeuvre =  $db->addOeuvre($user_key, $title, $content);
        header('Location: ../vue/admin.php');
    }

?>