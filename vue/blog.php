<?php

    include('../services/crud.php');

    $db = new Crud("mysql:host=localhost;dbname=projetfinal;charset=utf8mb4", "root", "");

    $article = $db->oeuvre();


?>

<!DOCTYPE html>
<html lang="en">

    <?php $titre = "Blog"; include('./layout/head.php');?>
    <body>

        <?php include('./layout/header.php'); isset($_SESSION['id_user']);?>


        <?php

/*             include_once('./../services/crud.php');

            $db = new Crud("mysql:host=localhost;dbname=projetfinal", "root", "");

            $aleatoireArticle = $db->article(); */

        ?>

        <div class="page-content p-5" id="content">

        <div class="row row-cols-1 row-cols-md-3 g-4 d-flex justify-content-evenly">

        <?php  foreach($article as $articles): ?>
            <div class="col blog">
                <div class="card h-100">
                    <img src="../assets/img/landscape-4572804_1280.jpg" class="card-img-top" alt="">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $articles['title']; ?></h3>
                        <p class="card-text"></p>
                        <small class="text-muted"><?php echo mb_strimwidth($articles['content'], 0, 300, "..."); ?> </small>

                        
                        
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <small class="text-muted"><?php echo $articles['date'] ?> </small>
                            <small><a class="btn btn-dark"href="./single.php?id=<?php echo $articles['id_article']; ?>">Voir plus</a></small>
                        </div>
                        <small class="text-muted"></small>
                    </div>

                </div>
            </div>
            <?php  endforeach;?>
        </div>
        </div>
        <?php include('./layout/footer.php');?>

    </body>
</html>