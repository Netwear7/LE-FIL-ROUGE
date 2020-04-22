<?php


include_once '../model/Perte.php';
include_once '../service/PerteService.php';
include_once '../data-access/PerteDataAccess.php';
include_once '../service/RaceService.php';
include_once '../data-access/RaceDataAccess.php';



function AffichageAnimaux($dataAnimaux){

    $daoPerte = new PerteDataAccess();
    $servicePerte = new PerteService($daoPerte);
    if (empty($dataAnimaux)){
        echo 
        '
        <div class="row mt-2">
            <div class="col-8 offset-2 text-center border rounded border-black text-center">
                <div class="row m-3 ">
                    <div class="col-12 text-center">
                        <h5>Vous n\'avez pas encore ajouté votre Compagnon ?</h5>
                        <p> Pour ajouter votre compagnon à votre liste, cliquez sur le bouton suivant : </p>
                        <button type="button" class="btn btn-outline-info" id="addAnimal-list" data-toggle="list" href="#list-addAnimal" role="tab" aria-controls="addmyAnimal">Ajoutez votre Compagnon</button>
                    </div>
                </div>
            </div>                                
        </div>
        ';
    } else {
        echo 
        '
        <div class="row mt-2 mb-3">
            <div class="col-8 offset-2 text-center border rounded border-black">
                <div class="row mt-3 ">
                    <div class="col-12 text-center">
                        <p> Pour ajouter un nouveau compagnon à votre liste, cliquez sur le bouton suivant : </p>
                        <button type="button" class="btn btn-outline-info mb-2" id="addAnimal-list" data-toggle="list" href="#list-addAnimal" role="tab" aria-controls="addmyAnimal">Ajoutez votre Compagnon</button>
                    </div>
                </div>
            </div>                                
        </div>









        ';


        $count = count($dataAnimaux);
        for ($i = 0; $i < $count ; $i++) 
                
        {
    
    
            echo 
            '
            <div class="row mt-2">
                <div class="col-8  offset-2 border rounded border-black">
                    <div class="row">
                        <div class="col-lg-4 col-sm-12 ">
                            <div class="row">
                                <a href="" data-toggle="modal" data-target="#modalPhotos'.$i.'"><img src="../../img/Chat/chat3.jpg" class="rounded w-100"></a>
                            </div>                            
                            <div class="row">
                                <!--Row pour les photos-->
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-12 text-center">
                            <div class="row mt-2">
                                <div class="col-12">
                                <h4 class="text-break">'.$dataAnimaux[$i]["NOM"].'</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <p class="text-break"><strong>Race/Apparence :</strong></p>
                                    <p>'.$dataAnimaux[$i]["NOM_RACE"].'</p>
                                </div>                               
                            </div>
                            <div class="row ">
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
                                        <li >Poils : '.$dataAnimaux[$i]["ROBE"].'</li>
                                        <li >Couleur : '.$dataAnimaux[$i]["COULEUR"].'</li>
                                        <li >Caractère : '.$dataAnimaux[$i]["CARACTERE"].' </li>
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
                                <div class="col-12">
                                    <ul class="list-group list-group-flush">
                                        <li >Spécificités : <br/>'.$dataAnimaux[$i]["SPECIFICITE"].'</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 col-sm-12">
                            <div class="row">
                                <button type="button" class="btn btn-outline-info btn-block" id="modAnimal-list" data-toggle="list" href="#list-modAnimal'.$i.'" role="tab" aria-controls="modAnimal">Modifier</button>
                            </div>
                            <div class="row">
                                <button type="button" class="btn btn-outline-info mb-2 btn-block " data-toggle="modal" data-target="#modalRetrait'.$i.'">Retrait</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>      
    
            ';

        }   
    }
}

function displayModals($dataAnimaux){
    if (!empty($dataAnimaux)){
        $count = count($dataAnimaux);
        for ($i = 0; $i < $count ; $i++) {
    echo '
    <div class="modal fade" id="modalPerdu'.$i.'" tabindex="-1" role="dialog" aria-labelledby="modalPerduTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form method="POST" action="">
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
                        <button type="button submit" class="btn btn-primary" name="perte">Signaler Perdu</button>
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
                    <form method="post" action="">
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
                    <form method="POST" action="">
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

function displayUpdatePanel($dataAnimaux){
    $raceDao = new RaceDataAccess();
    $raceService = new RaceService($raceDao);
    if (!empty($dataAnimaux)){
        $count = count($dataAnimaux);
        $data2 = $raceService->selectAllCatRaces();
        $count2 = count($data2);
        for ($i = 0; $i < $count ; $i++) {
    echo '



        <div class="tab-pane fade" id="list-modAnimal'.$i.'" role="tabpanel" aria-labelledby="list-modAnimal-list">
            <form method="POST" action="compte.php">
                <div class="row">
                    <div class="col-8 offset-2 border rounded border-black mt-5">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h3>Modifier mon compagnon</h3>
                            </div>                                                
                        </div>
                    </div>
                </div>
                <div class="row mt-3 ">
                    <div class="col-12 ">
                        <div class="row mt-3">
                            <div class="col-12  text-center">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <h3>Nom :</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-sm-12 offset-4">
                                        <input type="text" class="form-control" name="nomAnimal" value="'.$dataAnimaux[$i]["NOM"].'">
                                    </div>
                                    <div class="col-lg-2 col-sm-12 offset-5">
                                        <label for="inputDateNaissance" class="mt-2">Date de naissance : </label>
                                        <input type="date" class="form-control" name="dateNaissance" value="'.$dataAnimaux[$i]["DATE_NAISSANCE"].'">
                                    </div >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5 ">
                    <div class="col-4 offset-4"><input type="file"   name="photo" accept="image/png, image/jpeg"></div>
                </div>
                <div class="row mt-3 ">
                    <div class="col-lg-6 col-sm-12">
                        <label for="inputEspece" class="mt-2">Espece : </label>
                        <select class="form-control" class="selectEspece" name="especeAnimale">
                            <option>Chat</option>
                            <option>Chien</option>
                        </select>
                        <label for="inputRace" class="mt-2">Race :</label>
                            <select class="form-control" class="popSelect" name="raceAnimale">
                            </select>
                        <label for="inputSexe" class="mt-2">Sexe : </label>
                            <select class="form-control" class="selectSexe" name="sexeAnimal">
                                <option>Mâle</option>
                                <option>Femelle</option>
                            </select>
                        <label for="inputNumeroPuce" class="mt-2" >Numéro d\'identification : </label>
                            <input type="text" class="form-control" name="numeroPuce" value="'.$dataAnimaux[$i]["NO_PUCE"].'">
                        <label for="textAreaCaractere" class="mt-2">Caractère :</label>
                            <input type="text" class="form-control " value="'.$dataAnimaux[$i]["CARACTERE"].'"  name="caractere" rows="3">                         
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label for="inputPoils" class="mt-2">Poils :</label>
                            <select class="form-control " class="selectPoils" name="robe">
                                <option>Courts</option>
                                <option>Mi-longs</option>
                                <option>Long</option>
                            </select>
                            <label for="inputCouleur" class="mt-2">Couleur :</label>
                                <select class="form-control" class="selectCouleur" name="couleur">
                                    <option value="1">Blanc</option>
                                    <option value="3">Gris</option>
                                    <option value="2">Noir</option>
                                    <option value="4">Roux</option>
                                    <option value="5">Chatain</option>
                                </select>
                            <label for="inputTaille" class="mt-2" >Taille <small> (en centimètres)</small> :</label>
                                <input class="form-control " type="number" value="'.$dataAnimaux[$i]["TAILLE"].'" name="taille">
                            <label for="inputPoids" class="mt-2" >Poids <small> (en Kg)</small> :</label>
                                <input class="form-control " type="float" value="'.$dataAnimaux[$i]["POIDS"].'" name="poids">
                            <label for="specTextArea" class="mt-2">Spécificités :</label>
                            <input type="text" class="form-control " value="'.$dataAnimaux[$i]["SPECIFICITE"].'" name="specificites" rows="3">
                            <input type="hidden" name="idAnimal" value="'.$dataAnimaux[$i]["ID_ANIMAL"].'"></input>   
                        </div>
                    </div>
                </div>
                <div class="row mt-3 ">
                    <div class="col-lg-3 col-sm-12 offset-3">
                        <button type="button submit" name="updateAnimalInfos" class="btn btn-block btn-outline-info">Modifier</button>
                    </div>
                    <div class="col-lg-3 col-sm-12">
                        <button type="button " name="annuler" data-toggle="list" href="#list-compagnons" class="btn btn-block btn-outline-info">Annuler</button>
                    </div>                                            
                </div>

            </form>
        </div>

        ';
        } 
        
    }
}




?>

