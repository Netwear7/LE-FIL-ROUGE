<?php

session_start();

include_once('../data-access/AnimauxDataAccess.php');
include_once('../service/AnimauxService.php');
include_once('../data-access/AnimauxFavorisDataAccess.php');
include_once('../service/AnimauxFavorisService.php');


function affichage($data){
    $daoAnimauxFavoris = new AnimauxFavorisDataAccess();
    $serviceAnimauxFavoris = new AnimauxFavorisService($daoAnimauxFavoris);
        foreach($data as $key => $value){
            $idUser=$_SESSION["user_id"];
            $idAnimal=$value["id_animal"];
            $dataFavourite=$serviceAnimauxFavoris->serviceVerifyIfAnimalAlreadyFavourite($idUser, $idAnimal);
            if(count($dataFavourite)>0){

                echo '<div class="col-lg-3 mb-4 contentDisplay">
                        <div class="card">
                                <img class="card-img-top" src="../../img/Koala.jpg" alt="Card image cap" style="z-index : 1">                        
                                <a class="js-like" style="color:#fc0341">
                                <i id="icone" class="fas fa-heart fa-3x" style="z-index : 2; position : absolute; left: 81%; bottom: 83%; opacity: 0.6"></i> 
                                <input type="hidden" value="'.$_SESSION["user_id"].'" class="like_user_id">
                                <input type="hidden" value="'.$value["id_animal"].'" class="like_animal_id">
                                </a>                       
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <p class="card-text ">' . $value["nom"] . '</p>
                                </div>
                                <div class="row justify-content-center">
                                    <p class="card-text">' . $value["nom_race"] . '</p>
                                </div>
                            </div>                   
                        </div>                   
                    </div>';        
                }
                else{
                    echo '<div class="col-lg-3 mb-4 contentDisplay">
                            <div class="card">
                                    <img class="card-img-top" src="../../img/Koala.jpg" alt="Card image cap" style="z-index : 1">                        
                                    <a class="js-like" style="color:#fc0341">
                                    <i id="icone" class="far fa-heart fa-3x" style="z-index : 2; position : absolute; left: 81%; bottom: 83%; opacity: 0.6"></i> 
                                    <input type="hidden" value="'.$_SESSION["user_id"].'" class="like_user_id">
                                    <input type="hidden" value="'.$value["id_animal"].'" class="like_animal_id">
                                    </a>                       
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <p class="card-text ">' . $value["nom"] . '</p>
                                    </div>
                                    <div class="row justify-content-center">
                                        <p class="card-text">' . $value["nom_race"] . '</p>
                                    </div>
                                </div>                   
                            </div>                   
                        </div>';        

            }
        }
    }

    if(isset($_POST["userLike"])){
        $daoAnimauxFavoris = new AnimauxFavorisDataAccess();
        $animauxFavorisService = new AnimauxFavorisService($daoAnimauxFavoris);
        $data = $animauxFavorisService->serviceAddOrRemoveFavouriteAnimal($_POST["userLike"], $_POST["animalLike"]);
        $count = count($data);
        echo $count;
    }

    $daoAnimaux = new AnimauxDataAccess();
    $animauxService = new AnimauxService($daoAnimaux);
    if(empty($_POST["nom_espece"]) && empty($_POST["nom_race"]) && empty($_POST["couleur"]) && empty($_POST["sexe"]) && empty($_POST["ville"]) && empty($_POST["urgence"])){
        $data=$animauxService->serviceSelectAllAdoptableAnimals();
        affichage($data);
    }
    
    if((!empty($_POST["nom_espece"]) ||!empty($_POST["nom_race"]) ||!empty($_POST["couleur"]) ||!empty($_POST["sexe"]) ||!empty($_POST["ville"])) && empty($_POST["urgence"])){
        $data=$animauxService->serviceSearchAnimals2($_POST);
        if(count($data)>0){
            affichage($data);
        }
        else{
            echo '<div class="alert alert-primary text-center col-lg-6 offset-lg-3" role="alert">Aucun animal ne correspond à votre recherche !</div>';
        }
    }

    elseif(!empty($_POST["nom_espece"]) ||!empty($_POST["nom_race"]) ||!empty($_POST["couleur"]) ||!empty($_POST["sexe"]) ||!empty($_POST["ville"]) ||!empty($_POST["urgence"])){
        $data=$animauxService->serviceSearchAnimals($_POST);
        if(count($data)>0){
            affichage($data);
        }
        else{
            echo '<div class="alert alert-primary text-center col-lg-6 offset-lg-3" role="alert">Aucun animal ne correspond à votre recherche !</div>';
        }
    }
    
     
?>
<script src="../../javascript/like.js"></script>
<script src="../../javascript/scriptDisplaySelection.js"></script>