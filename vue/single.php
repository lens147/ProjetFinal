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



    <body>

        <?php include('./vue/layout/header.php');?>

        <div class="page-content p-5" id="content">


            <div class="col blog">
                <div class="card h-100">
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
        <form action="./traitement/comment.php?id=<?php echo $id_oeuvre ?>" method="post">
            <label for="comment">commentaire</label>
                <textarea id="comment" name="comment" rows="1" cols="80"></textarea>
                <input type="submit" value="Envoyer">
        </form>
        <?php  foreach($commentaire as $commentaires): ?>

            <div>
                <p><?=$commentaires['commentaire']?></p>
                <div>
                    <p><?=$commentaires['name_user']?></p>
                    <p><?=$commentaires['date']?></p>
                </div>
            </div>

        <?php  endforeach;?>
        <?php include('./vue/layout/footer.php');?>
        <?php include('./vue/layout/footer.php');?>
    </body>
</html>