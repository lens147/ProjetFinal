<?php

    include('./services/crud.php');

    $db = new Crud("mysql:host=localhost;dbname=projetfinal;charset=utf8mb4", "root", "");

    $article = $db->oeuvre();


?>

<!DOCTYPE html>
<html lang="fr">


    <?php $titre = "tableau de bord"; include('./vue/layout/head.php');?>


    <body class="homepage">

        <?php include('./vue/layout/header.php');?>
        <?php

        if ($_SESSION['admin']) {
            $allOeuvres = $db->oeuvre();
        }else {
            $user_key = $_SESSION['id_user'];

            $allOeuvres = $db->getAllMyOeuvre($user_key);
        }


        ?>

        <!-- MyPannel Start-->
        <div class="d-flex justify-content-center">
            <div class="m-5">
                <div class="">
                    <h1 class="text-center m-3 text-white">Administrer mes publications</h1>
                    <button type="button" class="btn loginPage mr-3 mt-3"><a class="text-white" href="./img">Ajouter une oeuvre</a></button>
                </div>
                <div class="row justify-content-center m-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-light">Titre</th>
                                <th class="text-light">Oeuvre</th>
                                <th class="text-light">Auteur</th>
                                <th class="text-light text-center">Date</th>
                                <th class="text-center text-light" colspan="2">Actions</th>
                            </tr>
                        </thead>
                        

                        <?php  foreach($allOeuvres as $allMyOeuvre):  ?>
                        <tr>
                            <td maxlength="20" class="pt-3 pb-3 text-light"><?php echo $allMyOeuvre['titre']?></td>
                            <td maxlength="20" class="pt-3 pb-3 text-light"><img src="./assets/img/oeuvre/<?php echo $allMyOeuvre['image']?>" alt="" width="50" height="50"></td>
                            <td class="pt-3 pb-3 text-light"><?php echo $allMyOeuvre['pseudo']?></td> 
                            <td class="pt-3 pb-3 text-white-50"><?php echo $allMyOeuvre['date']?> </td>
                            <td class="text-center pt-3 pb-3 text-light">
                                <a href="./update?id=<?php echo $allMyOeuvre['id_oeuvre'] ?>" class="text-success m-3">Modifier</a>
                                <a href="./traitement/deleteOeuvre.php?id=<?php echo $allMyOeuvre['id_oeuvre'] ?>" class="text-danger m-3">Supprimer</a> 
                            </td>
                        </tr>
                        <?php  endforeach; ?>

                    </table>

                </div>
                
            </div>
            <!-- MyPannel End-->

        </div>

        <?php include('./vue/layout/footer.php');?>



    </body>
</html>