<?php

    require 'vendor/autoload.php';

    $router = new AltoRouter();

    $router->setBasePath('/CCP/projetFinal');

    // map homepage
    $router->map( 'GET', '/', function() {
        require __DIR__ . '/vue/accueil.php';
    });
    $router->map( 'GET', '/accueil', function() {
        require __DIR__ . '/vue/accueil.php';
    });
    $router->map( 'GET', '/admin', function() {
        require __DIR__ . '/vue/admin.php';
    });
    $router->map( 'GET', '/oeuvre', function() {
        require __DIR__ . '/vue/oeuvre.php';
    });
    $router->map( 'GET', '/single', function() {
        require __DIR__ . '/vue/single.php';
    });
    $router->map( 'GET', '/compte', function() {
        require __DIR__ . '/vue/compte.php';
    });
    $router->map( 'GET', '/img', function() {
        require __DIR__ . '/vue/img.php';
    });
    $router->map( 'GET', '/inscription', function() {
        require __DIR__ . '/vue/inscription.php';
    });
    $router->map( 'GET', '/login', function() {
        require __DIR__ . '/vue/login.php';
    });
    $router->map( 'GET', '/mailing', function() {
        require __DIR__ . '/vue/mailing.php';
    });
    $router->map( 'GET', '/renimdp', function() {
        require __DIR__ . '/vue/renimdp.php';
    });
    $router->map( 'GET', '/myPublication', function() {
        require __DIR__ . '/vue/myPublication.php';
    });
    $router->map( 'GET', '/update', function() {
        require __DIR__ . '/vue/update.php';
    });

    // map user details page
/*     $router->map( 'GET', '/user/[i:id]/', function( $id ) {
        require __DIR__ . '/views/user-details.php';
    }); */

    // match current request url
    $match = $router->match();

    // call closure or throw 404 status
    if( is_array($match) && is_callable( $match['target'] ) ) {
        call_user_func_array( $match['target'], $match['params'] ); 
    } else {
        // no route was matched
        header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    }

?>