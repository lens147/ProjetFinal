<?php

    include_once('./../services/crud.php');

    $db = new Crud("mysql:host=localhost;dbname=projetfinal", "root", "");

    $user = $db->getdb();


?>

<!DOCTYPE html>
<html lang="en">
<?php include('./layout/head.php');?>

    <body>
        <?php include('./layout/header.php');?>
        <form action="../traitement/envoiOeuvre.php?" method="POST" enctype="multipart/form-data">
            <label for="titre"></label>
            <input type="text" name="titre">
            <label for="file"></label>
            <input type="file" name="file">
            <input type="submit" value="Envoyer">
        </form>
    </body>
</html>