<!DOCTYPE html>
<html lang="en">

    <?php $titre = "Mes Publication"; include('./vue/layout/head.php');


            $titre = "Oeuvre";

            
    
            include('./services/crud.php');
    
            $db = new Crud("mysql:host=localhost;dbname=projetfinal;charset=utf8mb4", "root", "");
    
            

    ?>

    <body class="homepage">
        <?php include('./vue/layout/header.php');$id_user = $_SESSION['id_user'];$oeuvres = $db->getAllMyOeuvre($id_user);?>

        <div class="page-content p-5" id="content">

            <div class="row row-cols-1 row-cols-md-3 g-4 d-flex justify-content-evenly">
                <?php  foreach($oeuvres as $oeuvre): ?>
                    <div class="col blog">
                        <div class="p-5">
                            <div class="card h-100">
                                <a class="btn btn-dark" href="./update?id=<?php echo $oeuvre['id_oeuvre']; ?>">
                                    <div class="card-body">
                                        <h2 class="card-title text-center text-capitalize"><?php echo $oeuvre['titre']; ?></h2>
                                        <p class="text-muted text-center"><img src="./assets/img/oeuvre/<?php echo $oeuvre['image']; ?>" alt="" width="100%"> </p>
                                        <div class="d-flex justify-content-between">
                                            <small class="text-muted"><?php echo $oeuvre['date']; ?> </small>
                                            <small class="text-muted"><?=$_SESSION['name']; ?></small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                <?php  endforeach;?>
            </div>
        </div>

        <?php include('./vue/layout/footer.php');?>
    </body>
</html>