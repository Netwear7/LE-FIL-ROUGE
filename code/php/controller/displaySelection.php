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
        if(isset($_SESSION["user_id"])){
            $idUser=$_SESSION["user_id"];
        }
        else{
            $idUser="";
        }
        $idAnimal=$value["ID_ANIMAL"];
        $dataFavourite=$serviceAnimauxFavoris->serviceVerifyIfAnimalAlreadyFavourite($idUser, $idAnimal);
        if(count($dataFavourite)>0){

            echo '<div class="col-lg-3 mb-4 contentDisplay">
                      <div class="card" style="min-height:300px" >

                      <img  style="z-index:1;width:100%" data-toggle="modal" data-target="#myModal'.$i.'"  src="data:image/png;base64,'.base64_encode($value['PHOTO']).'"/>  
                     
                                <a class="js-like" style="color:#fc0341">
                                <i id="icone" class="fas fa-heart fa-3x" style="z-index : 2; position : absolute; left: 81%; bottom: 83%; opacity: 0.6"></i> 
                                <input type="hidden" value="'.$idUser.'" class="like_user_id">
                                <input type="hidden" value="'.$value["ID_ANIMAL"].'" class="like_animal_id">
                                </a>                       
                        <div class="card-body bg-1" style="min-height:100px" data-toggle="modal" data-target="#myModal'.$i.'">
                                <div class="row justify-content-center">
                                    <h4 class="card-text "><strong>'.$value["NOM"].'</strong></h4>
                                </div>
                                <div class="row justify-content-center">
                                    <p class="card-text"><i>'.$value["NOM_RACE"].'</i></p>
                                </div>
                        </div>                   
                      </div>                   
                  </div>';        
            }
            else{
                echo '
                    <div class="col-lg-3 mb-4 contentDisplay">
                        <div class="card" style="min-height:300px;">

                                <img  style="z-index:1; width:100%" data-toggle="modal" data-target="#myModal'.$i.'" src="data:image/png;base64,'.base64_encode($value['PHOTO']).'"/>
                      
                                <a class="js-like" style="color:#fc0341">
                                <i id="icone" class="far fa-heart fa-3x" style="z-index : 2; position : absolute; left: 81%; bottom: 83%; opacity: 0.6"></i> 
                                <input type="hidden" value="'.$idUser.'" class="like_user_id">
                                <input type="hidden" value="'.$value["ID_ANIMAL"].'" class="like_animal_id">
                                </a>                       
                            <div class="card-body bg-1" data-toggle="modal" data-target="#myModal'.$i.'" style="min-height:100px">
                                <div class="row justify-content-center">
                                    <h4 class="card-text "><strong>'.$value["NOM"].'</strong></h4>
                                </div>
                                <div class="row justify-content-center">
                                    <p class="card-text"><i>'.$value["NOM_RACE"].'</i></p>
                                </div>
                            </div>                   
                        </div>                   
                    </div>';        
        }

        echo'<div id="myModal'.$i.'" class="modal fade" role="dialog"">
                <div class="modal-dialog modal-xl modal-dialog-centered">                    
                    <div class="modal-content" style="min-height:max-content">
                        <div class="col-12  border rounded border-black pt-2">
                            <div class="row bg-light" style="font-size:1.4em">
                                <div class="col-lg-3 col-sm-12">
                                    <div class="row">
                                    <img  style="z-index:1; height:100%; width:100%" src="data:image/png;base64,'.base64_encode($value['PHOTO']).'"/>
                                    </div>                            
                                </div>
                                <div class="col-lg-3 col-sm-12 text-center mt-2">
                                    <div class="row ">
                                        <div class="col-12">
                                        <h4 class="text-break"><strong>'.$value["NOM"].'</strong></h4>
                                        </div>
                                        <div class="col-12">
                                            <p class="text-break">Race : '.$value["NOM_RACE"].'</p>
                                        </div>   
                                        <div class="col-12">
                                        <p><strong>Né le  : </strong><br/>'.$value["DATE_NAISSANCE"].'  </p>
                                        </div>                           
                                    </div>                            
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                
                                    <div class="row mt-2">
                                        <div class="col-lg-6 col-sm-12">
                                            <ul class="list-group list-group-flush">
                                                <li class="mb-1">Identification : '.$value["NO_PUCE"].' </li>
                                                <li class="mb-1">Poils : '.$value["ROBE"].'</li>
                                                <li class="mb-1">Couleur : '.$value["COULEUR"].'</li>
                                                <li>Caractère : '.$value["CARACTERE"].'</li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <ul class="list-group list-group-flush">
                                                <li> Sexe : '.$value["SEXE"].'</li>
                                                <li >Poids : '.$value["POIDS"].' kg</li>
                                                <li >Taille : '.$value["TAILLE"].' cm</li>
                                                <li >Spécificités : <br/>'.$value["SPECIFICITE"].'</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row bg-info text-white" style="font-size:1.2em">
                                <div class="col-lg-12 text-center">
                                    <i>Vous avez eu un coup de coeur pour cet animal ? Contactez nous !</i>
                                    <p>ANITOPIA - '.$value["VILLE"].' </br> '.$value["NUMERO"].', '.$value["RUE"].' - '.$value["CODE_POSTAL"].' '.$value["VILLE"].' </br><i>tél</i> : '.$value["TELEPHONE"].' / <i>email</i> : '.$value["EMAIL"].'</p>
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