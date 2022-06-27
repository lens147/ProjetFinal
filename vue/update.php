<!DOCTYPE html>
<html lang="en">

    <?php

        $titre = "Modification";

        include_once('./../services/crud.php');

        $db = new Crud("mysql:host=localhost;dbname=projetfinal;charset=utf8mb4", "root", "");

        $article_id = htmlspecialchars($_GET['id']);

        $articles = $db->oneOeuvre($article_id);

        include('./layout/head.php');

    ?>

    <body>

        <?php include('./layout/header.php');?>

        <form action="../traitement/modification.php?id=<?php echo $article_id ?>" method="post">
            <div class="page-content p-5" id="content">


                <div class="col blog">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <textarea class="text-center" id="title" name="title" rows="1" cols="80"><?php echo $articles[0]['title'];?></textarea>
                            </div></br>
                            <div class="d-flex justify-content-center">
                                    <textarea id="content" name="content" rows="20" cols="80"><?php echo $articles[0]['content'];?></textarea>
                            </div>
                            <input type="submit" value="Modifier">
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php include('./layout/footer.php');?>
    </body>
</html>