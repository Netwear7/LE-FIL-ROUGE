<?php

include_once '../model/Animaux.php';
include_once '../service/AnimauxService.php';
include_once '../data-access/AnimauxDataAccess.php';

include_once '../data-access/AnimauxFavorisDataAccess.php';
include_once '../service/AnimauxFavorisService.php';

include_once '../model/PhotoAnimal.php';
include_once '../service/PhotoAnimalService.php';
include_once '../data-access/PhotoAnimalDataAccess.php';


session_start();


    $daoAnimauxFavoris = new AnimauxFavorisDataAccess();
    $serviceAnimauxFavoris = new AnimauxFavorisService($daoAnimauxFavoris);
    

        $dataAnimaux = $serviceAnimauxFavoris->serviceSelectAllUserFavouriteAnimals($_SESSION["user_id"]);
        if(empty($dataAnimaux)){
            echo 
            '
                <div class="row mt-2">
                    <div class="col-8 offset-2 text-center border rounded border-black text-center">
                        <div class="row m-3 ">
                            <div class="col-12 text-center">
                                <h5>Pas encore d\'animaux Coup de coeur ?</h5>
                                <p> Pour en ajouter un, cliquez sur le <a href="adopter-un-animal.php"><i class="far fa-heart"></i></a> situé en haut à droite des fiches sur la page d\'adoption</p>
                                <a href="adopter-un-animal.php"><button type="button" class="btn btn-outline-info">Ajoutez un Compagnon dans vos coups de coeur</button></a>
                            </div>
                        </div>
                    </div>                                
                </div>
            ';
        }else {
            $count = count($dataAnimaux);

            echo 
            '
                <div class="row mt-2 ">
                    <div class="col-8 offset-2 text-center border rounded border-black text-center">
                        <div class="row m-3 ">
                            <div class="col-12 text-center">
                                <p> Pour ajouter d\'autres animaux dans vos coups de coeur, cliquez sur le <a href="adopter-un-animal.php"><i class="far fa-heart"></i></a> situé en haut à droite des fiches sur la page d\'adoption</p>
                                <a href="adopter-un-animal.php"><button type="button" class="btn btn-outline-info">Ajoutez d\'autres compagnons dans vos coups de coeur</button></a>
                            </div>
                        </div>
                    </div>                                
                </div>
            ';
    
            for ($i = 0; $i < $count ; $i++) 
            
            {
                $rawPhoto = "data:image/png;base64," . base64_encode($dataAnimaux[$i]["PHOTO"]);
                echo 
                '
                <div class="row mt-2">
                    <div class="col-8  offset-2 border rounded border-black">
                        <div class="row">
                            <div class="col-lg-4 col-sm-12 ">
                                <div class="row">
                                    <a href="" data-toggle="modal" data-target="#modalPhotos'.$i.'">'.redimension($rawPhoto).'</a>
                                </div>                            
                            </div>
                            <div class="col-lg-2 col-sm-12 text-center">
                                <div class="row mt-2">
                                    <div class="col-12">
                                    <h4 class="text-break">'.$dataAnimaux[$i]["NOM"].'</h4>
                                    </div>
                                    <div class="col-12">
                                        <p class="text-break">Race/Apparence :</p>
                                        <p>'.$dataAnimaux[$i]["NOM_RACE"].'</p>
                                    </div>
                                    <div class="col-12">
                                    <p><strong>Né le  : </strong><br/>'.dateFr($dataAnimaux[$i]["DATE_NAISSANCE"]).'  </p>
                                    </div>                             
                                </div>                                                        
                            </div>
                            <div class="col-lg-5 col-sm-12">
                                <div class="row mt-2">
                                    <div class="col-lg-6 col-sm-12">
                                        <ul class="list-group list-group-flush">
                                            <li ><strong>Identification :</strong> '.$dataAnimaux[$i]["NO_PUCE"].' </li>
                                            <li >Poils : '.$dataAnimaux[$i]["ROBE"].'</li>
                                            <li >Couleur : '.$dataAnimaux[$i]["COULEUR"].'</li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <ul class="list-group list-group-flush">
                                            <li> Sexe : '.$dataAnimaux[$i]["SEXE"].'</li>
                                            <li >Poids : '.$dataAnimaux[$i]["POIDS"].' kg</li>
                                            <li >Taille : '.$dataAnimaux[$i]["TAILLE"].' cm</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <ul class="list-group list-group-flush">
                                            <li >Caractère : <br/>'.$dataAnimaux[$i]["CARACTERE"].'</li>
                                        </ul>
                                    </div>
                                    <div class="col-6">
                                        <ul class="list-group list-group-flush">
                                            <li >Spécificités : <br/>'.$dataAnimaux[$i]["SPECIFICITE"].'</li>
                                        </ul>
                                    </div>                                    
                                </div>                                
                            </div>
                            <div class="col-lg-1 col-sm-12">
                                <div class="row">
                                    <button type="button" class="btn removeFavoris " value="'.$dataAnimaux[$i]["ID_ANIMAL"].'"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>      
        
                ';
            }
        }

        function dateFr($date){
            return strftime('%d-%m-%Y',strtotime($date));
        }
        
        function redimension($rawPhoto)
        {
            $maxWidth = 380;
            $maxHeight = 380;
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

?>

<script src="../../javascript/showRemoveFavouriteAnimalModal.js"></script>
<script src="../../javascript/lostAnimal.js"></script>