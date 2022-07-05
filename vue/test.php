<!DOCTYPE html>
<html lang="fr">

    <?php

    $titre = "Test";
                
    include('./vue/layout/head.php');
    include_once('./services/crud.php');

    $db = new Crud("mysql:host=localhost;dbname=projetfinal;charset=utf8mb4", "root", "");

    $oeuvres = $db->oeuvre();
    

    ?>

    <body class="homepage">
        
        <?php include('./vue/layout/header.php'); isset($_SESSION['id_user']);?>
        
        <h1 class="text-center pt-4 text-light">Bienvenue sur mon Blog</h1>
        <p class="text-center text-light">Vous pouvez voir ci dessous une multitude d'articles créer par une communautée composé de moi et de moi</p>

        <div class="page-content p-5" id="content">

            <div class="row row-cols-1 row-cols-md-3 g-4 d-flex justify-content-evenly">

                <?php  foreach($oeuvres as $oeuvre): ?>
                  <div class="d-flex image card border-0 bg-dark shadow position-relative" style="background-image: url('./assets/img/oeuvre/<?=$oeuvre['image'];?>');">
                    <div>
                      <a class="btn text-light cardLeny cardLg" href="./single?id=<?php echo $oeuvre['id_oeuvre']; ?>">
                        <div class="card-body">
                            <h2 class="card-title h3"><?php echo $oeuvre['titre']; ?></h2>
                            <p class="card-text"></p>
                            <div class="bg-dark">
                              <div class="d-flex align-items-center"><!-- position-absolute bottom-0" -->
                                <div class="">
                                    <small class="text-muted"><?php echo $oeuvre['date'] ?></small>
                                    <small><?php $user_key = $oeuvre['user_key']; $userInfo = $db->userInfo($user_key); echo $userInfo[0]['name']?></small>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                    </div>
                  </div>
                <?php  endforeach;?>
            </div>
        </div>

        <?php include('./vue/layout/footer.php');?>

    </body>
</html>