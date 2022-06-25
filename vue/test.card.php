<?php

    $body_color = "blue";

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />
        <link href="../assets/CSS/style.css" rel="stylesheet">
            <style type="text/css">

                body { background-color: <?php echo $body_color; ?>; }

            </style>
        
        <title><?=$titre?></title>
    </head>
    <?php

    $titre = "Accueil";
                

    include_once('./../services/crud.php');

    $db = new Crud("mysql:host=localhost;dbname=projetfinal;charset=utf8mb4", "root", "");

    $oeuvre = $db->oeuvre();
    

    ?>

    <body>
        
        <?php include('./layout/header.php'); isset($_SESSION['id_user']);?>
        
        <h1 class="text-center pt-4">Bienvenue sur mon Blog</h1>
        <p class="text-center">Vous pouvez voir ci dessous une multitude d'articles créer par une communautée composé de moi et de moi</p>

        <div class="page-content" id="content">

        <div class="d-flex justify-content-evenly">

        <?php  foreach($oeuvre as $oeuvres): ?>
            <a href="./single.php?id=<?=$oeuvres['id_oeuvre'];?>" class="block max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?=$oeuvres['titre'];?></h5>
                <p class="font-normal text-gray-700 dark:text-gray-400 bg-gradient-to-t"></p>
            </a>
        <?php  endforeach;?>
        </div>
        </div>

        <?php include('./layout/footer.php');?>

    </body>
</html>