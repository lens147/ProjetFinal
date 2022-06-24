<?php

        session_start();
        session_destroy();
        header('Location: http://localhost/CCP/projetFinal/vue/accueil.php');
        exit;

?>