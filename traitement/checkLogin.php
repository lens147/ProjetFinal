<?php

    include_once('./../services/crud.php');

    $pseudo = htmlspecialchars($_POST["pseudoEmail"]);
    $email = htmlspecialchars($_POST["pseudoEmail"]);
    $password = htmlspecialchars($_POST["password"]);

    $hash = hash('sha1',$password);

    $db = new Crud("mysql:host=localhost;dbname=projetfinal", "root", "");

    $users = $db->getdb();



    $loginCheckPseudo = $db->checkLoginPseudo($pseudo, $hash);
    $loginCheckEmail = $db->checkLoginEmail($email, $hash);

    if ($loginCheckPseudo) {
        session_start();
        $user = $db->userP($pseudo);
        if($user[0]['confirmer']){

            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['id_user'] = $user[0]['id_user']; 
            $_SESSION['admin'] = $user[0]['admin']; 
            $_SESSION['lastname'] = $user[0]['lastname']; 
            $_SESSION['name'] = $user[0]['name']; 
            $_SESSION['email'] = $user[0]['email']; 
            $_SESSION['password'] = $user[0]['password'];
            header("Location: ../vue/accueil.php");
            exit;
        }else{
            echo "Veuillez confirmer votre Email";
        }


    }elseif($loginCheckEmail) {
        session_start();
        $user = $db->userE($email);

        if($user[0]['confirmer']){
            $_SESSION['email'] = $email;
            $_SESSION['id_user'] = $user[0]['id_user']; 
            $_SESSION['admin'] = $user[0]['admin']; 
            $_SESSION['lastname'] = $user[0]['lastname']; 
            $_SESSION['name'] = $user[0]['name']; 
            $_SESSION['pseudo'] = $user[0]['pseudo']; 
            $_SESSION['password'] = $user[0]['password'];
            header("Location: ../vue/accueil.php");
            exit;
        }else{
            echo "Veuillez confirmer votre Email";
        }

    }else {
        header("Location: ../vue/login.php");
        exit;
    }
        

    

?>