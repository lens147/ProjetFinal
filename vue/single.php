<!DOCTYPE html>
<html lang="fr">

    <?php

        $titre = "Oeuvre";

        $id_oeuvre = $_GET['id'];

        include('./services/crud.php');

        $db = new Crud("mysql:host=localhost;dbname=projetfinal;charset=utf8mb4", "root", "");

        $oeuvre = $db->oneOeuvre($id_oeuvre);

        $id_user = $oeuvre['user_key'];

        $commentaire = $db->getComment($id_oeuvre);


        include('./vue/layout/head.php');

    ?>



    <body class="homepage text-light">

        <?php include('./vue/layout/header.php');?>

        <div class="page-content col m-lg-5 p-5" id="content">


            <div class="col blog">
                <div class="card h-100 bg-dark">
                    <div class="card-body">
                        <h2 class="card-title text-center text-capitalize"><?php echo $oeuvre['titre']; ?></h2>
                        <p class="card-text"></p>
                        <p class="text-muted text-center"><img src="./assets/img/oeuvre/<?php echo $oeuvre['image']; ?>" alt="" width="70%"> </p>
                        <div class="d-flex justify-content-between">
                            <small class="text-muted"><?php echo $oeuvre['date']; ?> </small>
                            <small class="text-muted"><?php $user = $db->oneAutor($id_user); echo $user['pseudo']; ?></small>
                        </div>
                        
                        
                    </div>

                </div>
            </div>
        </div>
        <div class="d-flex">
            <form class="justify-content-center col col-lg-6" action="./traitement/comment.php?id=<?php echo $id_oeuvre ?>" method="post">
                <section class="gradient-custom">
                    <div class="container py-5">
                        <div class="">
                            <div>
                                <div class="" style="border-radius: 1rem;">
                                    <div class="card-body col p-xl-5 text-center">

                                        <div class="pb-4">

                                            <h2 class="h5 fw-bold mb-2 text-uppercase">Laisser un commentaire</h2>
                                            <div class="form-outline form-white mb-2">
                                                <textarea id="comment" name="comment" rows="1" cols="80" class="form-control form-control-lg"></textarea>
                                            </div>

                                            <button class="btn btn-outline-light mt-2 btn-lg px-5" type="submit">Publier</button>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
        </div>
        <div class="d-flex flex-column-reverse">
            <?php  foreach($commentaire as $commentaires): ?>

                <div class="m-4 col col-md-5">
                    <div class="d-flex"><p class="h5"><?=$commentaires['pseudo']?> <small class="fw-normal">dit :</small></p></div>
                    <div class="border border border-secondary p-1 m-2"><p><?=$commentaires['commentaire']?></p>
                    <div class="d-flex justify-content-end"><small class="small text-muted"><?=$commentaires['date']?></div></small></div>
                </div>

            <?php  endforeach;?>
        </div>
        <?php include('./vue/layout/footer.php');?>
    </body>
</html>