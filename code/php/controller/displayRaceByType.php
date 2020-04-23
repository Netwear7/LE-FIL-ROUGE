<?php
include_once('../service/RaceService.php');
include_once('../service/CouleurAnimalService.php');
include_once('../service/AdresseService.php');
include_once('../service/AnimauxService.php');
include_once('../data-access/AnimauxDataAccess.php');
include_once('../data-access/AdresseDataAccess.php');
include_once('../data-access/RaceDataAccess.php');

if(isset($_GET["nomEspece"]) && !empty($_GET["nomEspece"])){
    echo '<div class="row mt-3" >
          <div class="col-lg-12">
          <select name="nom_race" id="nom_race" class="simple-select custom-select custom-select-md">
          <option value="" selected>Race</option>';
          $raceDataAccess = new RaceDataAccess();
          $raceService = new RaceService($raceDataAccess);
          $data = $raceService->selectRace($_GET["nomEspece"]);
          foreach($data as $key =>$value){
              foreach($value as $key2 => $value2){
                  echo '<option>' . $value2 . '</option>';
              }
          }

    echo '</select></div></div>
        <div class="row mt-3">
        <div class=col-lg-12>
        <select name="couleur" id="couleur" class="simple-select custom-select custom-select-md">
        <option value="" selected>Couleur</option>';
        $couleurAnimalService = new CouleurAnimalService();
        $data = $couleurAnimalService->afficherCouleur();
        foreach($data as $key =>$value){
            foreach($value as $key2 => $value2){
                echo '<option>' . $value2 . '</option>';
            }
        }
    echo '</select></div></div>
        <div class="row mt-3">
        <div class=col-lg-12>
        <select name="sexe" id="sexe" class="simple-select custom-select custom-select-md">
        <option value="" selected>Sexe</option>';
        $daoAnimaux = new AnimauxDataAccess();
        $animauxService = new AnimauxService($daoAnimaux);
        $data = $animauxService->serviceDisplaySelectGender();
        foreach($data as $key =>$value){
            foreach($value as $key2 => $value2){
                echo '<option>' . $value2 . '</option>';
            }
        }
    echo'</select></div></div>
    <div class="row mt-3">
    <div class=col-lg-12>
    <select name="poil" id="poil" class="simple-select custom-select custom-select-md">
    <option value="">Poil</option>
    <option>Court</option>
    <option>Mi-long</option>
    <option>Long</option>
    </select></div></div>';
}
?>



