<?php

    include_once('./../services/crud.php');

    $pseudo = htmlspecialchars($_POST["pseudoEmail"]);
    $email = htmlspecialchars($_POST["pseudoEmail"]);
    $password = htmlspecialchars($_POST["password"]);

    $hash = hash('sha1',$password);

    $db = new Crud("mysql:host=localhost;dbname=projetfinal;charset=utf8mb4", "root", "");

    $users = $db->getdb();



    $loginCheckPseudo = $db->checkLoginPseudo($pseudo, $hash);
    $loginCheckEmail = $db->checkLoginEmail($email, $hash);

    if ($loginCheckPseudo) {
        session_start();
        $user = $db->userP($pseudo);
        if($user['confirmer']){

            $_SESSION = array_merge($_SESSION,$user);

            header("Location: ./../accueil");
            exit;

        }else{
            header("Location: ./../thank");
            exit();
        }


    }elseif($loginCheckEmail) {
        session_start();
        $user = $db->userE($email);

        if($user['confirmer']){
            $_SESSION = array_merge($_SESSION,$user);

            header("Location: ./../accueil");
            exit;

        }else{
            header("Location: ./../thank");
            exit();
        }

    }else {
        header("Location: ./../login");
        exit;
    }
        

    

?>