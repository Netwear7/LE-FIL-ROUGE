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
            <div class="col-8 offset-2 text-center border rounded border-black text-center">
                <div class="row m-3 ">
                    <div class="col-12 text-center">
                        <h5>Vous n\'avez pas encore ajouté votre Compagnon ?</h5>
                        <p> Pour ajouter votre compagnon à votre liste, cliquez sur le bouton suivant : </p>
                        <button type="button" class="btn btn-outline-info" id="addAnimal-list" data-toggle="list" href="#list-addAnimal" role="tab" aria-controls="addmyAnimal">Ajoutez votre Compagnon</button>
                    </div>
                </div>
            </div>                                
        ';
    } else {
        echo 
        '
            <div class="col-8 offset-2 text-center border rounded border-black">
                <div class="row mt-3 ">
                    <div class="col-12 text-center">
                        <p> Pour ajouter un nouveau compagnon à votre liste, cliquez sur le bouton suivant : </p>
                        <button type="button" class="btn btn-outline-info mb-2" id="addAnimal-list" data-toggle="list" href="#list-addAnimal" role="tab" aria-controls="addmyAnimal">Ajoutez votre Compagnon</button>
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
            <div class="row mt-1">
                <div class="col-8  offset-2 border rounded border-black">
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
                            ';
                            $perdu = $servicePerte->serviceSelect($dataAnimaux[$i]["ID_ANIMAL"]);
                            $pasPerdu = '<a href="" data-toggle="modal" data-target="#modalPerdu'.$i.'">Signaler perdu</a>';
                            $signalerRetrouver = '<a href="" data-toggle="modal" data-target="#modalRetrouvé'.$i.'">Signaler Retrouvé</a>';
                            echo empty($perdu) ?  $pasPerdu : $signalerRetrouver ;                                                                            ;
                        echo '                            
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
                                <button type="button" class="btn  " id="modAnimal-list" data-toggle="list" href="#list-modAnimal" role="tab" aria-controls="modAnimal"><i class="fas fa-edit"></i></button>
                                <button type="button" class="btn " data-toggle="modal" data-target="#modalRetrait'.$i.'"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>      
    
            ';

        }   
    }


function displayModals($dataAnimaux){
    if (!empty($dataAnimaux)){
        $count = count($dataAnimaux);
        for ($i = 0; $i < $count ; $i++) {
    echo '
    <div class="modal fade" id="modalPerdu'.$i.'" tabindex="-1" role="dialog" aria-labelledby="modalPerduTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="formPerte">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalRetrouvéTitle">Signaler votre animal comme étant perdu ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Date de la disparition :</p>
                        <input type="date" name="datePerte" class="mb-3"/>
                        <label for="textAreaperte">Quelques précisions concernant le lieu ? L\'heure ?</label>
                        <textarea class="form-control mb-3" name="precisionPerte" rows="3"></textarea>
                        <p>Une fois la perte déclarée, votre animal sera affiché dans la section "Animaux perdus" visible en cliquant <a href="animaux-perdus.php">ici</a> , <br/> Les utilisateurs pourront avoir accès aux informations de contact présentes sur votre profil dans le cas ou ils auraient des informations ou peut-être apercu votre animal.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <input type="hidden" name="idAnimalPerdu" value="'.$dataAnimaux[$i]["ID_ANIMAL"].'"></input>
                        <button type="button submit" class="btn btn-primary lost" id="perte">Signaler Perdu</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
            
    <!-- Modal signaler retrouvé -->
    <div class="modal fade" id="modalRetrouvé'.$i.'" tabindex="-1" role="dialog" aria-labelledby="modalRetrouvéTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" class="modalRetrouvéTitle1">Confirmez vous avoir Retrouvé votre animal?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <small id="lostAnimal" class="form-text text-muted">Si c\'est bien le cas, nous somme heureux que vous ayez pu le retrouver</small>
                </div>
                <div class="modal-footer">
                    <form class="formRetrouve">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <input type="hidden" name="idAnimalRetrouve" value="'.$dataAnimaux[$i]["ID_ANIMAL"].'"></input>
                        <button type="button submit" class="btn btn-primary name="animalRetrouve">Confirmer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
        
    <!-- Modal -->
    <div class="modal fade" id="modalRetrait'.$i.'" tabindex="-1" role="dialog" aria-labelledby="modalRetraitTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalRetraitCenterTitle">Êtes vous sûr de vouloir retirer la fiche?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>En cliquant sur le bouton ci-dessous vous confirmez le retrait de la fiche animale de vos fiches. Une fois l\'action validée, la fiche ne sera plus disponible</p>
                    <p class="mt-2">Confirmer le retrait ?</p>
                </div>
                <div class="modal-footer">
                    <form class="formRetrait">
                        <input type="hidden" name="couleurAnimalRetrait" value="'.$dataAnimaux[$i]["ID_COULEUR"].'"></input>
                        <input type="hidden" name="idAnimalRetrait" value="'.$dataAnimaux[$i]["ID_ANIMAL"].'"></input>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="button submit"  class="btn btn-outline-info" name="removeUserAnimal" value="true">Confirmer le retrait</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
         ';
}
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


