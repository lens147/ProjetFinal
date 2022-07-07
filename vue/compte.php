<?php

    if(isset($error_equal_email_or_pseudo) === false){
        $message = "votre email ou pseudo est invalide";
    }

    $titre = "Mon compte";
                
    include_once('./services/crud.php');

    $db = new Crud("mysql:host=localhost;dbname=projetfinal;charset=utf8mb4", "root", "");


?>
<!DOCTYPE html>
<html lang="fr">
    <?php include('./vue/layout/head.php');?>

    <body class="homepage text-light">

        <?php include('./vue/layout/header.php');$id = $_SESSION['id_user'];$user = $db->userInfo($id);?>
        
        <form action="./traitement/user.php?id=<?=$id?>" method="post">
            <section class="vh-100 gradient-custom">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                            <div class="card loginPage text-white" style="border-radius: 1rem;">
                                <div class="card-body p-5 text-center">

                                    <div class="mb-md-5 mt-md-4 pb-5">

                                        <h2 class="fw-bold mb-2 text-uppercase">Mon compte</h2>
                                        <p class="text-white-50 mb-3">Voici les information de votre compte</p>

                                        <div class="form-outline form-white mb-2">
                                            <label class="form-label" for="name">Prénom</label>
                                            <input type="text" name="name" id="name" value="<?=$user[0]['name'];?>" class="form-control form-control-lg" />
                                        </div>

                                        <div class="form-outline form-white mb-2">
                                            <label class="form-label" for="lastname">Nom</label>
                                            <input type="text" name="lastname" id="lastname" value="<?=$user[0]['lastname'];?>" class="form-control form-control-lg" />
                                        </div>

                                        <div class="form-outline form-white mb-4">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" name="email" id="email" value="<?=$user[0]['email'];?>" class="form-control form-control-lg" />
                                        </div>

                                        <div class="form-outline form-white mb-2">
                                            <label class="form-label" for="pseudo">Pseudo</label>
                                            <input type="text" name="pseudo" id="pseudo" value="<?=$user[0]['pseudo'];?>" class="form-control form-control-lg" />
                                        </div>

                                        <div class="form-outline form-white mb-3">
                                            <label class="form-label" for="description">Description</label>
                                            <textarea id="description" name="description" rows="4" cols="80" class="form-control form-control-lg"><?=$user[0]['description'];?></textarea>
                                        </div>

                                        <button class="btn btn-outline-light btn-lg px-5" type="submit">Modifier</button>


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>




    </body>
</html>