<?php

include_once '../service/AnimauxService.php';
include_once '../data-access/AnimauxDataAccess.php';
include_once '../service/RaceService.php';
include_once '../data-access/RaceDataAccess.php';
include_once '../service/CouleurAnimalService.php';
include_once '../data-access/CouleurAnimalDataAccess.php';
session_start();

$daoAnimaux = new AnimauxDataAccess();
$serviceAnimaux = new AnimauxService($daoAnimaux);


if(isset($_GET)){
$id = key($_GET);

$daoAnimaux = new AnimauxDataAccess();
$serviceAnimaux = new AnimauxService($daoAnimaux);
$raceDao = new RaceDataAccess();
$raceService = new RaceService($raceDao);
$couleurDataAccess = new CouleurAnimalDataAccess;
$couleurService = New CouleurAnimalService($couleurDataAccess);

$dataAnimaux = $serviceAnimaux->serviceSelect($id);


    $raceDao = new RaceDataAccess();
    $raceService = new RaceService($raceDao);
    $couleurDataAccess = new CouleurAnimalDataAccess;
    $couleurService = New CouleurAnimalService($couleurDataAccess);

    if (!empty($dataAnimaux)){
    echo '




            
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
                                        <input type="text" class="form-control" name="nomAnimal" value="'.$dataAnimaux["NOM"].'">
                                    </div>
                                    <div class="col-lg-2 col-sm-12 offset-5">
                                        <label for="inputDateNaissance" class="mt-2">Date de naissance : </label>
                                        <input type="date" class="form-control" name="dateNaissance" value="'.$dataAnimaux["DATE_NAISSANCE"].'">
                                    </div >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5 ">
                    <div class="col-4 offset-4"><input type="file" name="photo" accept="image/png, image/jpeg"></div>
                </div>
                <div class="row mt-3 ">
                    <div class="col-lg-6 col-sm-12">
                        <label for="inputEspece" class="mt-2">Espece : </label>
                            <div>
                                <select class="form-control selectEspece" name="especeAnimale">
                                    <option>Selectionnez une Race</option>
                                    <option>Chat</option>
                                    <option>Chien</option>
                                </select>
                            </div>
                        <label for="inputRace" class="mt-2">Race :</label>
                            <div>
                                <select class="form-control popSelect"  name="raceAnimale">
                                    <option value="'.$dataAnimaux["ID_RACE"].'">'.$dataAnimaux["NOM_RACE"].'</option>
                                </select>
                            </div>
                        <label for="inputSexe" class="mt-2">Sexe : </label>
                            <select class="form-control selectSexe" name="sexeAnimal">
                                <option>Mâle</option>
                                <option>Femelle</option>
                            </select>
                        <label for="inputNumeroPuce" class="mt-2" >Numéro d\'identification : </label>
                            <input type="text" class="form-control" name="numeroPuce" value="'.$dataAnimaux["NO_PUCE"].'">
                        <label for="textAreaCaractere" class="mt-2">Caractère :</label>
                            <input type="text" class="form-control " value="'.$dataAnimaux["CARACTERE"].'"  name="caractere" rows="3">                         
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
                                <select class="form-control" class="selectCouleur" name="couleur">';
                                    $dataCouleur = $couleurService->serviceSelectAll();
                                    $cmpt = count($dataCouleur);
                                    for ($h = 0; $h < $cmpt; $h++){
                                        echo '<option value="'.$dataCouleur[$h]["ID_COULEUR"].'">'.$dataCouleur[$h]["COULEUR"].'</option>';
                                    }

                            echo '    </select>
                            <label for="inputTaille" class="mt-2" >Taille <small> (en centimètres)</small> :</label>
                                <input class="form-control " type="number" value="'.$dataAnimaux["TAILLE"].'" name="taille">
                            <label for="inputPoids" class="mt-2" >Poids <small> (en Kg)</small> :</label>
                                <input class="form-control " type="float" value="'.$dataAnimaux["POIDS"].'" name="poids">
                            <label for="specTextArea" class="mt-2">Spécificités :</label>
                            <input type="text" class="form-control " value="'.$dataAnimaux["SPECIFICITE"].'" name="specificite" rows="3">
                            <input type="hidden" name="idAnimal" value="'.$dataAnimaux["ID_ANIMAL"].'"></input>   
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
        ';
        
    }
}

?>

<script src="../../javascript/scriptDisplayRaceInUpdateAnimal.js"></script>