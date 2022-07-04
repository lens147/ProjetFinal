<?php

    include_once('./../services/crud.php');

    $token_user = $_GET['id'];

    $db = new Crud("mysql:host=localhost;dbname=projetfinal;charset=utf8mb4", "root", "");

    $users = $db->confirmation($token_user);

    header("Location: ./../login");
    exit();

?>