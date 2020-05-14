<?php

session_start();

include_once '../service/NewsService.php';
include_once '../data-access/NewsDataAccess.php';

$newsDao = new NewsDataAccess();
$newsService = new NewsService($newsDao);

try{
    $data = $newsService->serviceSelectAll();
    if($data){
        foreach($data as $key => $value){
            $rawPhoto = "data:image/png;base64," . base64_encode($value["IMG_BLOB"]);
            echo
            '
            <div  class="row bg-grey-light shadow-sm mt-4 p-3"  style="border-color: white;">
            ';
            if(isset($_SESSION["user_role"]) && $_SESSION["user_role"] == "[admin]" ){
                echo
                '
                <div class="col-12">
                <button type="button" class="btn updateNews"  value="'.$value["ID_NEWS"].'"><i class="fas fa-edit"></i></button>
                <button type="button" class="btn removeNews" name="'.$value["ID_IMG_SITE"].'" value="'.$value["ID_NEWS"].'"><i class="fas fa-times"></i></button>
                </div>
                ';
            }
            echo'
                <div class="col-6">
                        '.redimension($rawPhoto).'
                </div>
                <div class="col-6">
                    <h5 class="card-title text-center mt-3">'.$value["TITRE"].'</h5>
                    <p class="card-text">'.$value["CONTENU"].'</p>
                </div>
            </div>

            ';
        }
    } else {
        if(isset($_SESSION["user_role"]) && $_SESSION["user_role"] == "[admin]"){
            echo 
            '
            <div class="col-12 mt-3">
                <div class="alert alert-info" role="alert">
                   Ajoutez une news !
                </div>
            </div>
            ';
        }
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


function redimension($rawPhoto)
{
    $maxWidth = 760;
    $maxHeight = 760;
    # Passage des paramètres dans la table : imageinfo
    $imageinfo= getimagesize("$rawPhoto");
    $iw=$imageinfo[0];
    $ih=$imageinfo[1];
    # Calcul des rapport de Largeur et de Hauteur
    $widthscale = $iw/$maxWidth;
    $heightscale = $ih/$maxHeight;
    $rapport = $ih/$widthscale;
    # Calul des rapports Largeur et Hauteur à afficher
    if($rapport < $maxHeight){
        
        $nwidth = $maxWidth;
    }else{
        $nwidth = $iw/$heightscale;
    }if($rapport < $maxHeight){
        $nheight = $rapport;
    }else{
        $nheight = $maxHeight;
    }
    # Affichage
    return " <img class=\"rounded img-fluid\" src=$rawPhoto width=\"$nwidth\" height=\"$nheight\" >";
}


function dateFr($date){
    return strftime('%d-%m-%Y',strtotime($date));
}



?>

<script src="../../javascript/accueil/showModalRemoveNews.js"></script>
