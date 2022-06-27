<?php

    if(isset($error_equal_email_or_pseudo) === false){
        $message = "votre email ou pseudo est invalide";
    }

    $titre = "Accueil";
                
    include_once('./../services/crud.php');

    $db = new Crud("mysql:host=localhost;dbname=projetfinal;charset=utf8mb4", "root", "");


?>
<!DOCTYPE html>
<html lang="en">
    <?php include('./layout/head.php');?>

    <body>

        <?php include('./layout/header.php');$id = $_SESSION['id_user'];$user = $db->userInfo($id);?>
        
        <form action="../traitement/user.php?id=<?=$id?>" method="post">
            <div>
                <label for="lastname">Prénom</label>
                <input type="text" name="lastname" id="lastname" value="<?=$user[0]['name'];?>">
            </div>
            <div>
                <label for="name">Nom</label>
                <input type="text" name="name" id="name" value="<?=$user[0]['lastname'];?>">
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?=$user[0]['email'];?>">
            </div>
            <div>
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" id="pseudo" value="<?=$user[0]['pseudo'];?>">
            </div>
            <div>
                <label for="password">Mot de Passe</label>
                <input type="password" name="password" id="password" value="*********">
            </div>
            <div>
                <label for="confirm_password">Confirmation Mot de Passe</label>
                <input type="password" name="confirm_password" id="confirm_password" value="*********">
            </div>
            <div>
                <label for="description">Description</label>
                <input type="text" name="description" id="description" value="<?=$user[0]['description'];?>">
            </div>
            <input type="submit" value="Envoyer">
        </form>

    </body>
</html>