<?php

    include('../services/crud.php');

    $db = new Crud("mysql:host=localhost;dbname=projetfinal;charset=utf8mb4", "root", "");

    $article = $db->oeuvre();


?>

<!DOCTYPE html>
<html lang="en">


    <?php $titre = "tableau de bord"; include('./layout/head.php');?>


    <body>

        <?php include('./layout/header.php');?>
        <?php

        include('./layout/head.php');

            include_once('./../services/crud.php');

            
            $db = new Crud("mysql:host=localhost;dbname=projetfinal;charset=utf8mb4", "root", "");
        
            $user_key = $_SESSION['id_user'];

            $allMyArticle = $db->getAllMyOeuvre($user_key);

        ?>

        <!-- MyPannel Start-->
        <div class="d-flex justify-content-center">
            <div class="m-5">
                <div class="">
                    <h1 class="text-center m-3 text-dark">Manager mes Post</h1>
                    <button type="button" class="btn btn-primary mr-3"><a class="text-white" href="./create.php">Add Post</a></button>
                </div>
                <div class="row justify-content-center m-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="">Titre</th>
                                <th class="">Auteur</th>
                                <th class="">Date</th>
                                <th class="text-center" colspan="2">Actions</th>
                            </tr>
                        </thead>
                        

                        <?php  foreach($allMyArticle as $allMyArticles):  ?>
                        <tr>
                            <td maxlength="20" class="pt-3 pb-3"><?php echo $allMyArticles['titre']?></td>
                            <td class="pt-3 pb-3"><?php echo $_SESSION['pseudo']?></td> 
                            <td class="pt-3 pb-3"><?php echo $allMyArticles['date']?> </td>
                            <td class="text-center pt-3 pb-3">
                                <a href="./update.php?id=<?php echo $allMyArticles['id_article'] ?>" class="text-success m-3">Edit</a>
                                <a href="../traitement/deleteArticle.php?id=<?php echo $allMyArticles['id_article'] ?>" class="text-danger m-3">Delete</a> 
                            </td>
                        </tr>
                        <?php  endforeach; ?>

                    </table>

                </div>
                
            </div>
            <!-- MyPannel End-->

        </div>

        <?php include('./layout/footer.php');?>



    </body>
</html>