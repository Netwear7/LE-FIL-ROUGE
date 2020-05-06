<?php

include_once('../data-access/AnimauxFavorisDataAccess.php');
include_once('../service/AnimauxFavorisService.php');

session_start();

if(isset($_POST["userLike"])){
    $daoAnimauxFavoris = new AnimauxFavorisDataAccess();
    $animauxFavorisService = new AnimauxFavorisService($daoAnimauxFavoris);
    $data = $animauxFavorisService->serviceAddOrRemoveFavouriteAnimal($_POST["userLike"], $_POST["animalLike"]);
    $count = count($data);
    echo $count;
}

?>