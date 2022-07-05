<?php

    include_once('./services/crud.php');

    $db = new Crud("mysql:host=localhost;dbname=projetfinal;charset=utf8mb4", "root", "");

    $user = $db->getdb();


?>

<!DOCTYPE html>
<html lang="fr">
<?php $titre = "Création"; include('./vue/layout/head.php');?>

    <body class="homepage">
        <?php include('./vue/layout/header.php');?>
        <form action="./traitement/envoiOeuvre.php" method="POST" enctype="multipart/form-data">
            <section class="vh-100 gradient-custom">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                            <div class="card loginPage text-white" style="border-radius: 1rem;">
                                <div class="card-body p-5 text-center">

                                    <div class="mb-md-5 mt-md-4 pb-5">

                                        <h2 class="fw-bold mb-2 text-uppercase">Publication</h2>
                                        <p class="text-white-50 mb-3">Vous pouvez publier votre oeuvre ici</p>

                                        <div class="form-outline form-white mb-2">
                                            <label class="form-label" for="name">Titre de l'oeuvre</label>
                                            <input type="text" name="titre" class="text-center form-control form-control-lg" />
                                        </div>

                                        <div class="form-outline form-white mb-4">
                                            <label class="form-label" for="file">Votre oeuvre</label>
                                            <input type="file" name="file" class="form-control form-control-lg" />
                                        </div>

                                        <button class="btn btn-outline-light btn-lg px-5" type="submit">Créer</button>


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
        <?php include('./vue/layout/footer.php');?>
    </body>
</html>