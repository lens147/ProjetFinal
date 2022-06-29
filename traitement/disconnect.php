<?php

        session_start();
        session_destroy();
        header('Location: http://localhost/CCP/projetFinal/accueil');
        exit;

?>