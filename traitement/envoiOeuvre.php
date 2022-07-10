<?php

    include_once('./../services/crud.php');

    $db = new Crud("mysql:host=localhost;dbname=projetfinal;charset=utf8mb4", "root", "");

    session_start();


    $titre = htmlspecialchars($_POST["titre"]);
    $user_key = $_SESSION['id_user'];
    $pseudo = $_SESSION['pseudo'];

    if(isset($_FILES['file'])){
        $tmpName = $_FILES['file']['tmp_name'];
        $name = $_FILES['file']['name'];
        $size = $_FILES['file']['size'];
        $error = $_FILES['file']['error'];
        $type = $_FILES['file']['type'];

        $tableExtention = explode('.', $name);
        $extension = strtolower(end($tableExtention));

        $extensionAutorise = ['png', 'jpg', 'jpeg'];
        $tailleMax = 1200000;


        if (in_array($extension, $extensionAutorise) && $size <= $tailleMax && $error == 0) {
            $uniqueName = uniqid('', true);
            $fileName = $uniqueName.'.'.$extension;

            move_uploaded_file($tmpName, '../assets/img/oeuvre/'.$fileName);

            $oeuvreAdd = $db->addOeuvre($user_key, $titre, $fileName, $pseudo);

            header("Location: ./../oeuvre");
            exit;
        }else{
            echo "Mauvaise extension ou taille trop importante, ou erreur";
        }

    }

?>