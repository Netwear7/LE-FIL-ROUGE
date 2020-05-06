<?php

include_once '../service/CouleurAnimalService.php';
include_once '../data-access/CouleurAnimalDataAccess.php';

$couleurDao = new CouleurAnimalDataAccess();
$couleurService = new CouleurAnimalService($couleurDao);
$data = $couleurService->serviceSelectAll();
$cmpt = count($data);
for ($i = 0; $i < $cmpt; $i++){
    echo '<option value="'.$data[$i]["ID_COULEUR"].'">'.$data[$i]["COULEUR"].'</option>';
}