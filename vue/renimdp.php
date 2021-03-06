<?php

    $token = htmlspecialchars($_GET['id']);

    $password = !empty($_POST['password']) ? $_POST['password'] : '';
    $repass = !empty($_POST['confirm_password']) ? $_POST['confirm_password'] : '';

    $mdp = (!empty($password_regex)?"":"Votre mot de passe doit comporter au moins 6 caractères dont un caractère spécial, un nombre, une majuscule et minuscule");
    $reMdp = (!empty($password_good)?"":"Vos mots de passes doivent être indentiques");

?>

<!DOCTYPE html>
<html lang="fr">
    <?php $titre = "Mot de Passe perdu"; include('./vue/layout/head.php');?>

    <body class="loginPage">

        <form action="./traitement/newMDP.php?id=<?=$token;?>" method="post" class="vh-100 gradient-custom">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <div class="mb-md-5 mt-md-4 pb-5">

                        <h2 class="fw-bold mb-2 text-uppercase">Récupération</h2>
                        <p class="text-white-50 mb-5">Entrer votre nouveau Mot de Passe !</p>

                        <div class="form-outline form-white mb-4">
                            <label class="form-label" for="nPassword">Nouveau Mot de Passe</label>
                            <div class="wrapper">
                                <input type="password" name="nPassword" id="password" class="form-control form-control-lg" placeholder="Mot de Passe" onclick="getElementById('warningPassword').innerHTML = 'Votre mot de passe doit comporter au moins 6 caractères dont un caractère spécial, un nombre, une majuscule et minuscule'" />
                                <span id="visiblity-toggle" class="material-icons-outlined">visibility_off</span>
                            </div>
                            <div class="text-warning" style="font-size: 13px; font-weight: 500" id="warningPassword"></div>
                            <div class="text-danger" style="font-size: 13px; font-weight: 500" id="errorPassword"></div>
                        </div>

                        <div class="form-outline form-white mb-4">
                            <label class="form-label" for="confirm_password">Confirmer le nouveau Mot de Passe</label>
                            <div class="wrapper">
                                <input type="password" name="confirm_password" id="repass" class="form-control form-control-lg" placeholder="Confirmer le Mot de Passe" />
                                <span id="re-visiblity-toggle" class="material-icons-outlined">visibility_off</span>
                            </div>
                            <div id="errorRepass" class="text-danger" style="font-size: 13px; font-weight: 500" id="errorRepass"></div>
                        </div>

                        <button class="btn btn-outline-light btn-lg px-5" type="submit">Nouveau Mot de Passe</button>

                    </div>
                    </div>
                </div>
                </div>
            </div>
        </form>

        <script type="text/javascript" src="./assets/JS/visibility.js"></script>
        <script type="text/javascript" src="./assets/JS/main.js"></script>

    </body>
</html>