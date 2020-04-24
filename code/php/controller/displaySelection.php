<?php

include_once('../data-access/AnimauxDataAccess.php');
include_once('../service/AnimauxService.php');

    function affichage($data){
        foreach($data as $key => $value){
            echo '<div class="col-lg-3 mb-4 contentDisplay">
                    <div class="card">
                        <img class="card-img-top" src="../../img/Koala.jpg" alt="Card image cap">
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