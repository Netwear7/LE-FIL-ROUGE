<?php
include_once('../service/RaceService.php');

    echo '<option value="" selected>Race</option>';
    $raceService = new RaceService();
    if(isset($_GET["nomEspece"])){
        $data = $raceService->selectRace($_GET["nomEspece"]);
        foreach($data as $key =>$value){
            foreach($value as $key2 => $value2){
                echo '<option>' . $value2 . '</option>';
            }
        }
    }

?>