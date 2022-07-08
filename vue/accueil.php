<!DOCTYPE html>
<html lang="fr">

    <?php

    $titre = "Accueil";
                
    include('./vue/layout/head.php');
    include_once('./services/crud.php');

    $db = new Crud("mysql:host=localhost;dbname=projetfinal;charset=utf8mb4", "root", "");

    $oeuvres = $db->oeuvre();
    

    ?>

    <body class="homepage text-light">
        
        <?php include('./vue/layout/header.php'); isset($_SESSION['id_user']);?>
        
        <h1 class="text-center pt-4 text-light">Bienvenue dans la galérie d'oeuvre d'art</h1>
        <p class="text-center text-light">Le meilleur de l’art à portée de clic</p>

        <div class="page-content p-5" id="content">

            <div class="row row-cols-1 row-cols-md-3 g-4 d-flex justify-content-evenly">

                <?php  foreach($oeuvres as $oeuvre): ?>
                    <div class="col blog">
                        <div class="p-5">
                            <div class="card h-100 border-0 bg-dark shadow">
                                <a class="btn text-light cardLeny" href="./single?id=<?php echo $oeuvre['id_oeuvre']; ?>">
                                    <div class="card-body">
                                        <h2 class="card-title h3"><?php echo $oeuvre['titre']; ?></h2>
                                        <p class="card-text"></p>
                                        <p class="text-muted"><img src="./assets/img/oeuvre/<?php echo $oeuvre['image']; ?>" alt="" width="100%"></p>

                                        <div class="d-flex justify-content-between">
                                            <small class="text-muted"><?php echo $oeuvre['date'] ?></small>
                                            <small><?php $user_key = $oeuvre['user_key']; $userInfo = $db->userInfo($user_key); echo $userInfo[0]['name']?></small>
            
                                        </div>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php  endforeach;?>
            </div>
        </div>

        <?php include('./vue/layout/footer.php');?>

    </body>
</html>