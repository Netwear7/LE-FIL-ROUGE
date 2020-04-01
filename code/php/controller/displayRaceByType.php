<?php
include_once('../service/RaceService.php');

echo '<div class="col-lg-12">
     <select name="nom_race" id="nom_race" class="simple-select custom-select custom-select-md">
     <option value="" selected>Race</option>';
        $raceService = new RaceService();
        if(isset($_GET["nomEspece"]) && !empty($_GET["nomEspece"])){
            $data = $raceService->selectRace($_GET["nomEspece"]);
            foreach($data as $key =>$value){
                foreach($value as $key2 => $value2){
                    echo '<option>' . $value2 . '</option>';
                }
            }
        }
echo '</select>
      </div>'
?>


                                    