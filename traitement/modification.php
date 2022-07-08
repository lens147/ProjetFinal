<?php

    session_start();
    include_once('./../services/crud.php');
    $db = new Crud("mysql:host=localhost;dbname=projetfinal;charset=utf8mb4", "root", "");
    $titre = htmlspecialchars($_POST['titre']);
    $oeuvre_id = $_GET['id'];

    date_default_timezone_set("Europe/Paris");

    $modification = date("Y-m-d H:i:s");
    $oeuvre = $db->oneOeuvre($oeuvre_id);

    $image = $oeuvre['image'];

    if ($titre == "" || $image == "") {
        header("Location: ./../update?id=$oeuvre_id");
        exit;
    }else{

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
                $modifOeuvre =  $db->modifOeuvre($titre, $modification, $fileName, $oeuvre_id);
                header("Location: ./../myPublication");
                exit;
            }else{
                $modifOeuvre =  $db->modifOeuvre($titre, $modification, $image, $oeuvre_id);
                header('Location: ./../myPublication');
                exit;
            }
        }


    }

?>