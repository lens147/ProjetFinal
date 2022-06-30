<?php

    session_start();
    if (isset($_SESSION['pseudo'])||isset($_SESSION['email'])) {
        $connect = true;
    }
?>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            
                
                
        <div class="container-fluid">
            <div>
                <a class="navbar-brand" href="./accueil"><img src="./assets/img/logo/2abe5dc119b244fda757bbcbd019a19a-removebg-preview.png" alt="logo"></a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="./oeuvre">Oeuvre</a>
                </li>
                <?php if(isset($connect)){echo '<li class="nav-item">
                                                    <a class="nav-link" aria-current="page" href="./myPublication">Mes Publication</a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" href="./admin">My Panel</a>
                                                </li>'
                ;}?>
            </ul>

            </div>
            

        
        </div>
        <ul class="navbar-nav">
            <?php

                if(isset($connect)){
                    echo '<li><a class="nav-link btn btn-secondary" href="./traitement/disconnect.php">Deconnexion</a></li>';
                }else{
                    echo '<li><a class="nav-link btn btn-primary" href="./login">Connexion</a></li> <li><a class="nav-link btn btn-secondary ms-3" href="./inscription">inscription</a></li>';
                }

            ?>
        </ul>
    
    </nav>
</header>