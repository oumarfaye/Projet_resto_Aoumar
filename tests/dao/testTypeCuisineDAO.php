<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>TypeCuisineDAO : tests unitaires</title>
    </head>

    <body>

        <?php

        use modele\dao\TypeCuisineDAO;
        use modele\dao\Bdd;

        require_once '../../includes/autoload.inc.php';
        
        // Pour augmenter les limites de var_dump
        ini_set('xdebug.var_display_max_depth', '10');
        ini_set('xdebug.var_display_max_children', '256');
        ini_set('xdebug.var_display_max_data', '1024');


        try {
            Bdd::connecter();
            ?>
            <h2>Test TypeCuisineDAO</h2>

            <h3>1- getOneById</h3>
            <?php $idTC = 6; ?>
            <p>Le type de cuisine n° <?= $idTC ?></p>
            <?php
            $leTC = TypeCuisineDAO::getOneById($idTC);
            var_dump($leTC);
            
            ?>
            
            
            <h3>5- getAllByResto</h3>
            <?php $idR = 1; ?>
            <p>Filtrage des type de cuisine sur le resto</p>
            <?php
            $lesTC = TypeCuisineDAO::getAllByResto($idR);
            var_dump($lesTC);
            
            ?>

            <?php            
            Bdd::deconnecter();
        } catch (Exception $ex) {
            ?>
            <h4>*** Erreur récupérée : <br/> <?= $ex->getMessage() ?> <br/>***</h4>
            <?php
        }
        ?>

    </body>
</html>