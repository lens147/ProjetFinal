<!DOCTYPE html>
<html lang="fr">

    <?php $titre = "Login"; include('./vue/layout/head.php');?>


    <body class="loginPage">

        <form action="./traitement/checkLogin.php" method="post" class="vh-100 gradient-custom">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <div class="mb-md-5 mt-md-4 pb-5">

                        <h2 class="fw-bold mb-2 text-uppercase">Connexion</h2>
                        <p class="text-white-50 mb-5">Entrer votre Identifiant et votre Mot de Passe !</p>

                        <div class="form-outline form-white mb-4">
                            <label class="form-label" for="typeEmailX">Email</label>
                            <input type="text" name="pseudoEmail" id="typeEmailX" class="form-control form-control-lg" placeholder="Email" />
                        </div>

                        <div class="form-outline form-white mb-4">
                            <label class="form-label" for="typePasswordX">Mot de Passe</label>
                            <div class="wrapper">
                                <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Mot de Passe" />
                                <span id="visiblity-toggle" class="material-icons-outlined">visibility_off</span>
                            </div>
                        </div>

                        <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="./mailing">Mot de Passe perdu ?</a></p>

                        <button class="btn btn-outline-light btn-lg px-5" type="submit">Connexion</button>

                        </div>

                        <div>
                        <p class="mb-0">Vous n'avez pas de compte ? <a href="./inscription" class="text-white-50 fw-bold">Inscription</a>
                        </p>
                        </div>

                    </div>
                    </div>
                </div>
                </div>
            </div>
        </form>

        <script type="text/javascript" src="./assets/JS/main.js"></script>
        <script type="text/javascript" src="./assets/JS/visibility.js"></script>

    </body>
</html>