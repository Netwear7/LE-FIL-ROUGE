<?php

include_once '../model/Animaux.php';
include_once '../service/AnimauxService.php';
include_once '../data-access/AnimauxDataAccess.php';


include_once '../model/Perte.php';
include_once '../service/PerteService.php';
include_once '../data-access/PerteDataAccess.php';
include_once '../service/RaceService.php';
include_once '../data-access/RaceDataAccess.php';

include_once '../service/CouleurAnimalService.php';
include_once '../data-access/CouleurAnimalDataAccess.php';

include_once '../model/PhotoAnimal.php';
include_once '../service/PhotoAnimalService.php';
include_once '../data-access/PhotoAnimalDataAccess.php';

include_once '../model/AvoirCouleur.php';
include_once '../service/AvoirCouleurService.php';
include_once '../data-access/AvoirCouleurDataAccess.php';


session_start();

    $daoAnimaux = new AnimauxDataAccess();
    $serviceAnimaux = new AnimauxService($daoAnimaux);
    $couleurDataAccess = new CouleurAnimalDataAccess;
    $couleurService = New CouleurAnimalService($couleurDataAccess);


    $daoPerte = new PerteDataAccess();
    $servicePerte = new PerteService($daoPerte);
    $dataAnimaux = $serviceAnimaux->serviceSelectAllUserAnimals($_SESSION["user_id"]);
    if (empty($dataAnimaux)){
        echo 
        '
            <div class="col-8 offset-2 text-center componentContainer">
                <div class="row m-3 ">
                    <div class="col-12 text-center">
                        <h5>Vous n\'avez pas encore ajouté votre Compagnon ?</h5>
                        <p> Pour ajouter votre compagnon à votre liste, cliquez sur le bouton suivant : </p>
                        <button type="button" class="btn btn-outline-info" id="buttonAddAnimal" " role="tab" aria-controls="addmyAnimal">Ajoutez votre Compagnon</button>
                    </div>
                </div>
            </div>                                
        ';
    } else {
        echo 
        '
            <div class="col-8 offset-2 text-center componentContainer">
                <div class="row mt-3 ">
                    <div class="col-12 text-center">
                        <p> Pour ajouter un nouveau compagnon à votre liste, cliquez sur le bouton suivant : </p>
                        <button type="button" class="btn btn-outline-info mb-2" id="buttonAddAnimal" " role="tab" aria-controls="addmyAnimal">Ajoutez votre Compagnon</button>
                    </div>
                </div>
            </div>                                
        ';


        $count = count($dataAnimaux);
        for ($i = 0; $i < $count ; $i++) 
                
        {
    
        

            $rawPhoto = "data:image/png;base64," . base64_encode($dataAnimaux[$i]["PHOTO"]);

                
            echo 
            '
                <div class="col-8 mt-3  offset-2 componentContainer">
                    <div class="row">
                        <div class="col-lg-4 col-sm-12 ">
                            <div class="row">
                                <a href="" data-toggle="modal" data-target="#modalPhotos'.$i.'">'.redimension($rawPhoto).'</a>
                            </div>                            
                        </div>
                        <div class="col-lg-2 col-sm-12 text-center">
                            <div class="row ">
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
                                        <li >Identification : '.$dataAnimaux[$i]["NO_PUCE"].' </li>
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
                                <button type="button" class="btn updateAnimal"  value="'.$dataAnimaux[$i]["ID_ANIMAL"].'"><i class="fas fa-edit"></i></button>
                                <button type="button" class="btn remove" name="'.$dataAnimaux[$i]["ID_COULEUR"].'" value="'.$dataAnimaux[$i]["ID_ANIMAL"].'" id="removeAnimal-list" aria-controls="removeAnimal"><i class="fas fa-times"></i></button>
                            </div>
                            <div class="row">
                            ';
                            $perdu = $servicePerte->serviceSelect($dataAnimaux[$i]["ID_ANIMAL"]);
                            echo empty($perdu) ?  '<button class="btn btn-link lost" value="'.$dataAnimaux[$i]["ID_ANIMAL"].'">Signaler perdu</button>' : '<button class="btn btn-link back" value="'.$dataAnimaux[$i]["ID_ANIMAL"].'">Signaler Retrouvé</button>' ;  
                            echo'
                            </div>
                        </div>
                    </div> 
                </div>     
    
            ';

        }   
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


function dateFr($date){
    return strftime('%d-%m-%Y',strtotime($date));
}


?>


<script src="../../javascript/showLostModal.js"></script>
<script src="../../javascript/showModalRetrait.js"></script>
<script src="../../javascript/displayAnimalUpdatePanel.js"></script>
<script src="../../javascript/showAnimalIsBackModal.js"></script>
<script src="../../javascript/panels/panelAddAnimal.js"></script>

