<!DOCTYPE html>
<html lang="fr">

    <?php

        $titre = "Modification";

        include_once('./services/crud.php');

        $db = new Crud("mysql:host=localhost;dbname=projetfinal;charset=utf8mb4", "root", "");

        $oeuvre_id = $_GET['id'];

        $oeuvres = $db->oneOeuvre($oeuvre_id);

        $commentaire = $db->getComment($oeuvre_id);


        include('./vue/layout/head.php');

    ?>

    <body class="homepage text-light">

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

        <form class="d-flex" action="./traitement/comment.php?id=<?php echo $oeuvre_id ?>" method="post">
            <label for="comment">commentaire</label>
                <textarea id="comment" name="comment" rows="1" cols="80"></textarea>
                <input type="submit" value="Envoyer">
        </form>
        <?php  foreach($commentaire as $commentaires): ?>

            <div class="m-4 w-50">
                <div class="d-flex"><p class="h5"><?=$commentaires['name_user']?> <small class="fw-normal">dit :</small></p></div>
                <div class="border border border-secondary p-1 m-2"><p><?=$commentaires['commentaire']?></p>
                <div class="d-flex justify-content-end"><small class="small text-muted"><?=$commentaires['date']?></div></small></div>
            </div>

        <?php  endforeach;?>
        <?php include('./vue/layout/footer.php');?>
    </body>
</html>