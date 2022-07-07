<!DOCTYPE html>
<html lang="fr">

    <?php

        $titre = "Oeuvre";

        $id_oeuvre = $_GET['id'];

        include('./services/crud.php');

        $db = new Crud("mysql:host=localhost;dbname=projetfinal;charset=utf8mb4", "root", "");

        $oeuvres = $db->oneOeuvre($id_oeuvre);

        $id_user = $oeuvres[0]['user_key'];

        $commentaire = $db->getComment($id_oeuvre);


        include('./vue/layout/head.php');

    ?>



    <body class="homepage text-light">

        <?php include('./vue/layout/header.php');?>

        <div class="page-content p-5 m-5" id="content">


            <div class="col blog">
                <div class="card h-100 bg-dark">
                    <div class="card-body">
                        <h2 class="card-title text-center text-capitalize"><?php echo $oeuvres[0]['titre']; ?></h2>
                        <p class="card-text"></p>
                        <p class="text-muted text-center"><img src="./assets/img/oeuvre/<?php echo $oeuvres[0]['image']; ?>" alt="" width="70%"> </p>
                        <div class="d-flex justify-content-between">
                            <small class="text-muted"><?php echo $oeuvres[0]['date']; ?> </small>
                            <small class="text-muted"><?php $user = $db->oneAutor($id_user); echo $user[0]['name']; ?></small>


                            
                        </div>
                        
                        
                    </div>

                </div>
            </div>
        </div>
        <form class="d-flex" action="./traitement/comment.php?id=<?php echo $id_oeuvre ?>" method="post">
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
                <div class="d-flex"><p class="h5"><?=$commentaires['name_user']?> <small class="fw-normal">dit :</small></p></div>
                <div class="border border border-secondary p-1 m-2"><p><?=$commentaires['commentaire']?></p>
                <div class="d-flex justify-content-end"><small class="small text-muted"><?=$commentaires['date']?></div></small></div>
            </div>

        <?php  endforeach;?>
        <?php include('./vue/layout/footer.php');?>
    </body>
</html>