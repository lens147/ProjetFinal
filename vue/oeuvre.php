<?php

    include('./services/crud.php');

    $db = new Crud("mysql:host=localhost;dbname=projetfinal;charset=utf8mb4", "root", "");

    $oeuvres = $db->oeuvre();




?>

<!DOCTYPE html>
<html lang="fr">

    <?php $titre = "Blog"; include('./vue/layout/head.php');?>
    <body class="homepage">

        <?php include('./vue/layout/header.php'); isset($_SESSION['id_user']);?>

        <div class="page-content p-5" id="content">

            <div class="row row-cols-1 row-cols-md-3 g-4 d-flex justify-content-evenly">

                <?php  foreach($oeuvres as $oeuvre): ?>
                    <div class="col blog">
                        <div class="p-xl-5">
                            <div class="card h-100 border-0 bg-dark shadow">
                                <a class="btn text-light" href="./single?id=<?php echo $oeuvre['id_oeuvre']; ?>">
                                    <div class="card-body">
                                        <h2 class="card-title"><?php echo $oeuvre['titre']; ?></h2>
                                        <p class="card-text"></p>
                                        <p class="text-muted"><img src="./assets/img/oeuvre/<?php echo $oeuvre['image']; ?>" alt="" width="100%" class="hei"></p>

                                        <div class="d-flex justify-content-between">
                                            <small class="text-muted"><?php echo $oeuvre['date'] ?></small>
                                            <small><?php $user_key = $oeuvre['user_key']; $userInfo = $db->userInfo($user_key); echo $userInfo['pseudo']?></small>
            
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