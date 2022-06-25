<?php

    include_once('./../services/crud.php');

    $db = new Crud("mysql:host=localhost;dbname=projetfinal;charset=utf8mb4", "root", "");

    $oeuvres = $db->oeuvre();

    foreach ($oeuvres as $oeuvre) {
        $base_url = "url(".$oeuvre['image'].")";
    }


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />
        <style>

            .bg-url{
                background-image: <?php echo $base_url?>;
                background-size: contain;
                background-repeat: no-repeat;
                width: 400px;
                height: 400px;
            }
            .tg{
                text-align: center;
                position: relative;
                top: 40px;
                filter: contrast(1);
                color: white;
            }

        </style>
    </head>
    <body>



            <div class="d-flex justify-content-evenly">
                <div class="bg-url">
                    <a href="" class="block max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white tg">Merdouille</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400"></p>
                    </a>
                </div>
                <div class="bg-url">
                    <a href="" class="block max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white tg">Merdouille</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400"></p>
                    </a>
                    </div>
                <div class="bg-url">
                    <a href="" class="block max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white tg">Merdouille</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400"></p>
                    </a>
                </div>
            </div>
        
    </body>
</html>