<!DOCTYPE html>
<html lang="en">

    <?php

        $titre = "Modification";

        include_once('./services/crud.php');

        $db = new Crud("mysql:host=localhost;dbname=projetfinal;charset=utf8mb4", "root", "");

        $oeuvre_id = htmlspecialchars($_GET['id']);

        $oeuvres = $db->oneOeuvre($oeuvre_id);

        $commentaire = $db->getComment($oeuvre_id);


        include('./vue/layout/head.php');

    ?>

    <body>

        <?php include('./vue/layout/header.php');?>

        <form action="./traitement/modification.php?id=<?php echo $oeuvre_id ?>" method="post" enctype="multipart/form-data">
            <div class="page-content p-5" id="content">


                <div class="col blog">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <textarea class="text-center" id="titre" name="titre" rows="1" cols="80"><?php echo $oeuvres[0]['titre'];?></textarea>
                            </div></br>
                            <div class="d-flex justify-content-center">
                                <img src="./assets/img/oeuvre/<?php echo $oeuvres[0]['image'];?>" alt="Oeuvre">
                            </div>
                            <div class="d-flex justify-content-center">
                                <label for="file"></label>
                                <input type="file" name="file">
                            </div>
                            <input type="submit" value="Modifier">
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form action="./traitement/comment.php?id=<?php echo $oeuvre_id ?>" method="post">
            <label for="comment">commentaire</label>
                <textarea id="comment" name="comment" rows="1" cols="80"></textarea>
                <input type="submit" value="Envoyer">
        </form>
        <?php  foreach($commentaire as $commentaires): ?>

            <div>
                <p><?=$commentaires['commentaire']?></p>
                <div>
                    <p><?=$commentaires['pseudo_user']?></p>
                    <p><?=$commentaires['date']?></p>
                </div>
            </div>

        <?php  endforeach;?>
        <?php include('./vue/layout/footer.php');?>
    </body>
</html>