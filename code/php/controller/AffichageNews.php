<?php

include_once '../service/NewsService.php';
include_once '../data-access/NewsDataAccess.php';

$newsDao = new NewsDataAccess();
$newsService = new NewsService($newsDao);

try{
    $data = $newsService->serviceSelectAll();
    if($data){
        echo
        '

        ';
    } else {
        echo 
        '
        <div class="col-12 mt-3">
            <div class="alert alert-info" role="alert">
                Aucunes News à afficher !
            </div>
        </div>
        ';
    }
}catch (MysqliQueryException $mqe) {
    if ($mqe->getCode() == 1049) {

        $error = ' 507 Connexion a la base de donnée impossible !';
        echo 
        '
        <div class="col-12 mt-3">
            <div class="alert alert-warning" role="alert">
            507 Connexion a la base de donnée impossible !
            </div>
        </div>
        ';
        
    } else if ($mqe->getCode() == 1062 ){
        $error = ' 509 Erreur lors de l\'execution de la requête ';
        echo 
        '
        <div class="col-12 mt-3">
            <div class="alert alert-warning" role="alert">
            Erreur lors de l\'execution de la requête
            </div>
        </div>
        ';
        
    } else {
        $error = ' 510 Une erreur est survenue merci de réessayer plus tard !';
        echo 
        '
        <div class="col-12 mt-3">
            <div class="alert alert-warning" role="alert">
            510 Une erreur est survenue merci de réessayer plus tard !
            </div>
        </div>
        ';

    }
}




?>


