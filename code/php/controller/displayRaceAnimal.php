<?php

include_once('../service/RaceService.php');
include_once('../service/CouleurAnimalService.php');
include_once('../service/AdresseService.php');
include_once('../service/AnimauxService.php');
include_once('../data-access/AnimauxDataAccess.php');
include_once('../data-access/AdresseDataAccess.php');
include_once('../data-access/RaceDataAccess.php');

if(isset($_GET["nomEspece"]) && !empty($_GET["nomEspece"])){

        $raceDataAccess = new RaceDataAccess();
        $raceService = new RaceService($raceDataAccess);
        $data = $raceService->selectRaceForAdd($_GET["nomEspece"]);
            $count = count($data);
            for ($i = 0; $i < $count-1; $i++){
            echo '<option value="'.$data[$i]["id_race"].'">'.$data[$i]["nom_race"].'</option>';
            }

        }




    ?>