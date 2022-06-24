<!DOCTYPE html>
<html lang="en">

    <?php

        $titre = "Mon Article";

        $id_oeuvre = $_GET['id'];

        include('../services/crud.php');

        $db = new Crud("mysql:host=localhost;dbname=projetfinal;charset=utf8mb4", "root", "");

        $oeuvres = $db->oneOeuvre($id_oeuvre);

        $id_user = $oeuvres[0]['user_key'];

        include('./layout/head.php');

    ?>



    <body>

        <?php include('./layout/header.php');?>

        <div class="page-content p-5" id="content">


            <div class="col blog">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title text-center text-capitalize"><?php echo $oeuvres[0]['titre']; ?></h2>
                        <p class="card-text"></p>
                        <p class="text-muted text-center"><img src="../assets/img/oeuvre/<?php echo $oeuvres[0]['image']; ?>" alt="" width="70%"> </p>
                        <div class="d-flex justify-content-between">
                            <small class="text-muted"><?php echo $oeuvres[0]['date']; ?> </small>
                            <small class="text-muted"><?php $user = $db->oneAutor($id_user); echo $user[0]['name']; ?></small>


                            
                        </div>
                        
                        
                    </div>

                </div>
            </div>
        </div>
        <?php include('./layout/footer.php');?>
    </body>
</html>