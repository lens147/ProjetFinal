<?php

    $token = $_GET['id'];

    include('../services/crud.php');

    $password = htmlspecialchars($_POST["nPassword"]);
    $confirm_password = htmlspecialchars($_POST["confirm_password"]);




    $max_password = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{6,25}$/';
    $password_regex = (preg_match($max_password, $password));

    if ($password === "" || $password !== $confirm_password) {
        $password_good = false;
    }
    else {
        $password_good = true;
    }

    $hash = hash('sha1', $password);

    $db = new Crud("mysql:host=localhost;dbname=projetfinal;charset=utf8mb4", "root", "");

    if ($password_good && $password_regex){

        $test = $db->changeMDP($hash,$token);
        header("Location: ./../login");
        exit();

    }else{
        header("Location: ./../renimdp?id=$token");
        exit();
    }

?>