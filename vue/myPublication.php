<!DOCTYPE html>
<html lang="en">

    <?php $titre = "Mes Publication"; include('./vue/layout/head.php');


            $titre = "Oeuvre";

            
    
            include('./services/crud.php');
    
            $db = new Crud("mysql:host=localhost;dbname=projetfinal;charset=utf8mb4", "root", "");
    
            

    ?>

    <body>
        <?php include('./vue/layout/header.php');$id_user = $_SESSION['id_user'];$oeuvre = $db->getAllMyOeuvre($id_user);?>

        <div class="page-content p-5" id="content">


            <div class="row row-cols-1 row-cols-md-3 g-4 d-flex justify-content-evenly">
        <?php  foreach($oeuvre as $oeuvres): ?>

                <div class="card h-100">
                    <a class="card-body" href="./update?id=<?php echo $oeuvres['id_oeuvre']; ?>">
                        <h2 class="card-title text-center text-capitalize"><?php echo $oeuvres['titre']; ?></h2>
                        <p class="card-text"></p>
                        <p class="text-muted text-center"><img src="./assets/img/oeuvre/<?php echo $oeuvres['image']; ?>" alt="" width="100%"> </p>
                        <div class="d-flex justify-content-between">
                            <small class="text-muted"><?php echo $oeuvres['date']; ?> </small>
                            <small class="text-muted"><?=$_SESSION['name']; ?></small>


                            
                        </div>
                        
                        
                    </a>

                </div>
            <?php  endforeach;?>
            </div>
        </div>

        <?php include('./vue/layout/footer.php');?>
    </body>
</html>