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
                                <textarea class="text-center" id="titre" name="titre" rows="1" cols="80"><?php echo $oeuvres['titre'];?></textarea>
                            </div></br>
                            <div class="d-flex justify-content-center">
                                <img src="./assets/img/oeuvre/<?php echo $oeuvres['image'];?>" alt="Oeuvre">
                            </div>
                            <div class="d-flex justify-content-center">
                                <label for="file"></label>
                                <input type="file" name="file" class="form-control form-control-lg">
                            </div>
                            <input type="submit" class="btn btn-outline-light btn-lg px-5 loginPage" value="Modifier">
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form class="d-flex" action="./traitement/comment.php?id=<?php echo $oeuvre_id ?>" method="post">
            <section class="vh-100 gradient-custom">
                <div class="container py-5 h-100">
                    <div class=" h-100">
                        <div>
                            <div class="card loginPage text-white" style="border-radius: 1rem;">
                                <div class="card-body p-5 text-center">

                                    <div class="pb-4">

                                        <h2 class="fw-bold mb-2 text-uppercase">Commenter</h2>
                                        <div class="form-outline form-white mb-2">
                                            <label class="form-label" for="comment">Commentaire</label>
                                            <textarea id="comment" name="comment" rows="1" cols="80" class="form-control form-control-lg"></textarea>
                                        </div>

                                        <button class="btn btn-outline-light btn-lg px-5" type="submit">Publier</button>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
        <?php  foreach($commentaire as $commentaires): ?>

            <div class="m-4 w-50">
                <div class="d-flex"><p class="h5"><?=$commentaires['pseudo']?> <small class="fw-normal">dit :</small></p></div>
                <div class="border border border-secondary p-1 m-2"><p><?=$commentaires['commentaire']?></p>
                <div class="d-flex justify-content-end"><small class="small text-muted"><?=$commentaires['date']?></div></small></div>
            </div>

        <?php  endforeach;?>
        <?php include('./vue/layout/footer.php');?>
    </body>
</html>