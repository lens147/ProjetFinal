<?php

    session_start();

    $id = $_SESSION['id_user'];

    $titre = "Accueil";
                
    include('./layout/head.php');
    include_once('./../services/crud.php');

    $db = new Crud("mysql:host=localhost;dbname=projetfinal;charset=utf8mb4", "root", "");

    $oeuvre = $db->userModif($name, $lastname, $email, $pseudo, $password, $description, $id_user);


?>
<!DOCTYPE html>
<html lang="en">
    <?php include('./layout/head.php');?>

    <body>

        <?php include('./layout/header.php');?>
        
        <form action="../traitement/user.php?=id<?=$id?>" method="post"></form>

    </body>
</html>