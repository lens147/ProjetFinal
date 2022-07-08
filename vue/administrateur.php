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

            $allOeuvres = $db->getAllOeuvre();
            $users = $db->getdb();

        ?>

        <!-- MyPannel Start-->
        <div class="d-flex justify-content-center">
            <div class="m-5">
                <div class="">
                    <h1 class="text-center m-3 text-white">Manager mes Post</h1>
                    <button type="button" class="btn btn-primary mr-3"><a class="text-white" href="./img">Add Post</a></button>
                </div>
                <div class="row justify-content-center m-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-light">Titre</th>
                                <th class="text-light">Auteur</th>
                                <th class="text-light">Date</th>
                                <th class="text-center text-light" colspan="2">Actions</th>
                            </tr>
                        </thead>
                        

                        <?php  foreach($allOeuvres as $allOeuvre):  ?>
                        <tr>
                            <td maxlength="20" class="pt-3 pb-3 text-light"><?php echo $allOeuvre['titre']?></td>
                            <td class="pt-3 pb-3 text-light"><?php echo $users['pseudo']?></td> 
                            <td class="pt-3 pb-3 text-white-50"><?php echo $allOeuvre['date']?> </td>
                            <td class="text-center pt-3 pb-3 text-light">
                                <a href="./update?id=<?php echo $allOeuvre['id_oeuvre'] ?>" class="text-success m-3">Edit</a>
                                <a href="./traitement/deleteOeuvre.php?id=<?php echo $allOeuvre['id_oeuvre'] ?>" class="text-danger m-3">Delete</a> 
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