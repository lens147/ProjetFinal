<?php

    include_once('./../services/crud.php');

    $db = new Crud("mysql:host=localhost;dbname=projetfinal", "root", "");

    $oeuvre_id = $_GET['id'];

    $dropOeuvre = $db->dropOeuvre($oeuvre_id);

    header('Location: http://localhost/CCP/projetFinal/vue/admin.php');
    exit;


?>