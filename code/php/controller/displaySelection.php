<?php

session_start();

include_once('../data-access/AnimauxDataAccess.php');
include_once('../service/AnimauxService.php');
include_once('../data-access/AnimauxFavorisDataAccess.php');
include_once('../service/AnimauxFavorisService.php');


function affichage($data){
    $daoAnimauxFavoris = new AnimauxFavorisDataAccess();
    $serviceAnimauxFavoris = new AnimauxFavorisService($daoAnimauxFavoris);

    $i=0;
    foreach($data as $key => $value){
        $i++;
        $idUser=$_SESSION["user_id"];
        $idAnimal=$value["ID_ANIMAL"];
        $dataFavourite=$serviceAnimauxFavoris->serviceVerifyIfAnimalAlreadyFavourite($idUser, $idAnimal);
        if(count($dataFavourite)>0){

            echo '<div class="col-lg-3 mb-4 contentDisplay">
                      <div class="card" data-toggle="modal" data-target="#myModal'.$i.'">
                        <img  style="z-index:1; height:170px; width:100%" src="data:image/png;base64,'.base64_encode($value['PHOTO']).'"/>                        
                                <a class="js-like" style="color:#fc0341">
                                <i id="icone" class="fas fa-heart fa-3x" style="z-index : 2; position : absolute; left: 81%; bottom: 83%; opacity: 0.6"></i> 
                                <input type="hidden" value="'.$_SESSION["user_id"].'" class="like_user_id">
                                <input type="hidden" value="'.$value["ID_ANIMAL"].'" class="like_animal_id">
                                </a>                       
                        <div class="card-body" style="z-index:1">
                                <div class="row justify-content-center">
                                    <p class="card-text ">' . $value["NOM"] . '</p>
                                </div>
                                <div class="row justify-content-center">
                                    <p class="card-text">' . $value["NOM_RACE"] . '</p>
                                </div>
                        </div>                   
                      </div>                   
                  </div>';        
            }
            else{
                echo '
                    <div class="col-lg-3 mb-4 contentDisplay">
                        <div class="card" data-toggle="modal" data-target="#myModal'.$i.'">
                                <img  style="z-index:1; height:170px; width:100%" src="data:image/png;base64,'.base64_encode($value['PHOTO']).'"/>                        
                                <a class="js-like" style="color:#fc0341">
                                <i id="icone" class="far fa-heart fa-3x" style="z-index : 2; position : absolute; left: 81%; bottom: 83%; opacity: 0.6"></i> 
                                <input type="hidden" value="'.$_SESSION["user_id"].'" class="like_user_id">
                                <input type="hidden" value="'.$value["ID_ANIMAL"].'" class="like_animal_id">
                                </a>                       
                            <div class="card-body" style="z-index:1">
                                <div class="row justify-content-center">
                                    <p class="card-text ">' . $value["NOM"] . '</p>
                                </div>
                                <div class="row justify-content-center">
                                    <p class="card-text">' . $value["NOM_RACE"] . '</p>
                                </div>
                            </div>                   
                        </div>                   
                    </div>';        
        }

        echo'<div id="myModal'.$i.'" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">                    
                    <div class="modal-content" >
                        <div class="col-12  border rounded border-black py-2">
                            <div class="row">
                                <div class="col-lg-4 col-sm-12 ">
                                    <div class="row">
                                    <img  style="z-index:1; height:100%; width:100%" src="data:image/png;base64,'.base64_encode($value['PHOTO']).'"/>
                                    </div>                            
                                </div>
                                <div class="col-lg-3 col-sm-12 text-center">
                                    <div class="row ">
                                        <div class="col-12">
                                        <h4 class="text-break">'.$value["NOM"].'</h4>
                                        </div>
                                        <div class="col-12">
                                            <p class="text-break">Race/Apparence :</p>
                                            <p>'.$value["NOM_RACE"].'</p>
                                        </div>   
                                        <div class="col-12">
                                        <p><strong>Né le  : </strong><br/>'.$value["DATE_NAISSANCE"].'  </p>
                                        </div>                           
                                    </div>                            
                                </div>
                                <div class="col-lg-5 col-sm-12">
                                
                                    <div class="row mt-2">
                                        <div class="col-lg-6 col-sm-12">
                                            <ul class="list-group list-group-flush">
                                                <li >Identification : '.$value["NO_PUCE"].' </li>
                                                <li >Poils : '.$value["ROBE"].'</li>
                                                <li >Couleur : '.$value["COULEUR"].'</li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <ul class="list-group list-group-flush">
                                                <li> Sexe : '.$value["SEXE"].'</li>
                                                <li >Poids : '.$value["POIDS"].' kg</li>
                                                <li >Taille : '.$value["TAILLE"].' cm</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-6">
                                            <ul class="list-group list-group-flush">
                                                <li >Caractère : <br/>'.$value["CARACTERE"].'</li>
                                            </ul>
                                        </div>
                                        <div class="col-6">
                                            <ul class="list-group list-group-flush">
                                                <li >Spécificités : <br/>'.$value["SPECIFICITE"].'</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> 
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
            var_dump($data);
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