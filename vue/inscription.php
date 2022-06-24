

<?php

    if(isset($error_equal_email_or_pseudo) === false){
        $message = "votre email ou pseudo est invalide";
    }

    $name = !empty($_POST['name']) ? $_POST['name'] : '';
    $lastname = !empty($_POST['lastname']) ? $_POST['lastname'] : '';
    $pseudo = !empty($_POST['pseudo']) ? $_POST['pseudo'] : '';
    $email = !empty($_POST['email']) ? $_POST['email'] : '';
    $password = !empty($_POST['password']) ? $_POST['password'] : '';
    $repass = !empty($_POST['confirm_password']) ? $_POST['confirm_password'] : '';


    $mail = (!empty($email_validator)?"":"Votre email doit être valide");
    $pseudonym = (!empty($pseudo_regex)?"":"Votre pseudonyme doit comporter au moins 3 caractères");
    $xName = (!empty($name_regex)?"":"Votre prénom doit être correct");
    $xLast = (!empty($lastname_regex)?"":"Votre nom doit être correct");
    $mdp = (!empty($password_regex)?"":"Votre mot de passe doit comporter au moins 6 caractères dont un caractère spécial, un nombre, une majuscule et minuscule");
    $reMdp = (!empty($password_good)?"":"Vos mots de passes doivent être indentiques");
    


?>

<!DOCTYPE html>
<html lang="en">

    <?php $titre = "Inscription"; include('./layout/head.php');?>


    <body class="loginPage">

        <form action="../traitement/inscription.php" method="post" class="vh-100 gradient-custom">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <div class="mb-md-5 mt-md-4 pb-5">

                        <h2 class="fw-bold mb-2 text-uppercase">Inscription</h2>
                        <p class="text-white-50 mb-5">Inscrivez vous ci-dessous!</p>

                        <div class="form-outline form-white mb-4">
                            <label class="form-label" for="lastname">Nom</label>
                            <input type="text" name="lastname" id="lastname" class="form-control form-control-lg" placeholder="Nom" />
                            <?=$xLast?>
                        </div>

                        <div class="form-outline form-white mb-4">
                            <label class="form-label" for="name">Prénom</label>
                            <input type="text" name="name" id="name" class="form-control form-control-lg" placeholder="Prénom" />
                            <?=$xName?>
                        </div>


                        <div class="form-outline form-white mb-4">
                            <label class="form-label" for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control form-control-lg" placeholder="Email" />
                            <?=$mail?>
                        </div>

                        <div class="form-outline form-white mb-4">
                            <label class="form-label" for="pseudo">Pseudo</label>
                            <input type="text" name="pseudo" id="pseudo" class="form-control form-control-lg" placeholder="Pseudo" />
                            <?=$pseudonym?>
                        </div>

                        <div class="form-outline form-white mb-4">
                            <label class="form-label" for="password">Mot de Passe</label>
                            <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Mot de Passe" />
                            <?=$mdp?>
                        </div>

                        <div class="form-outline form-white mb-4">
                            <label class="form-label" for="confirm_password">Confirmer le Mot de Passe</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control form-control-lg" placeholder="Confirmer le Mot de Passe" />
                            <?=$reMdp?>
                        </div>

                        <button class="btn btn-outline-light btn-lg px-5" type="submit">Inscription</button>

                        <div class="d-flex justify-content-center text-center mt-4 pt-1">
                            <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                            <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                            <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                        </div>

                        </div>

                        <div>
                            <p class="mb-0">Vous avez déjà un compte? <a href="./login.php" class="text-white-50 fw-bold">Connexion</a></p>
                        </div>

                    </div>
                    </div>
                </div>
                </div>
            </div>
        </form>


    </body>
</html>