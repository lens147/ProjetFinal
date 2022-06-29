<!DOCTYPE html>
<html lang="en">
    <?php $titre = "Mot de passe perdu"; include('./vue/layout/head.php');?>

    <body class="loginPage">
        <form action="./traitement/mailing.php" method="post" class="vh-100 gradient-custom">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <div class="mb-md-5 mt-md-4 pb-5">

                        <h2 class="fw-bold mb-2 text-uppercase">Récupération</h2>
                        <p class="text-white-50 mb-5">S'il vous plait entrez votre Email</p>

                        <div class="form-outline form-white mb-4">
                            <label class="form-label" for="typeEmailX">Email</label>
                            <input type="email" id="typeEmailX" name="email" class="form-control form-control-lg" />
                        </div>

                        <button class="btn btn-outline-light btn-lg px-5" type="submit">Envoyez</button>

                    </div>
                    </div>
                </div>
                </div>
            </div>
        </form>
    </body>
</html>