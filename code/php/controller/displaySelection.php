<?php

session_start();

include_once('../data-access/AnimauxDataAccess.php');
include_once('../service/AnimauxService.php');
include_once('../data-access/AnimauxFavorisDataAccess.php');
include_once('../service/AnimauxFavorisService.php');
include_once('../data-access/MaladieDataAccess.php');
include_once('../service/MaladieService.php');


function affichage($data){
    $daoAnimauxFavoris = new AnimauxFavorisDataAccess();
    $serviceAnimauxFavoris = new AnimauxFavorisService($daoAnimauxFavoris);
    $daoMaladie = new MaladieDataAccess();
    $serviceMaladie = new MaladieService($daoMaladie);

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
        $dataMaladie=$serviceMaladie->serviceVerifyEmergency($idAnimal);


        echo '<div class="col-lg-3 mb-4 contentDisplay">
                    <div class="card">

                        <img  style="z-index:1;width:100%;" data-toggle="modal" data-target="#myModal'.$i.'"  src="data:image/png;base64,'.base64_encode($value['PHOTO']).'"/>                         
                        <a class="js-like" style="z-index : 2; position:absolute; top:5px; right:10px; color:#fc0341">';
                        if(count($dataFavourite)>0){
                            echo'<i id="icone" class="fas fa-heart fa-2x"; opacity: 0.6"></i>'; 
                        }
                        else{
                            echo'<i id="icone" class="far fa-heart fa-2x"; opacity: 0.6"></i>';
                        }
                        echo'<input type="hidden" value="'.$idUser.'" class="like_user_id">
                        <input type="hidden" value="'.$value["ID_ANIMAL"].'" class="like_animal_id">
                        </a>                       
                        <div class="card-body bg-white shadow-sm" data-toggle="modal" data-target="#myModal'.$i.'">
                                <div class="row justify-content-center">
                                    
                                    <h4 class="card-text "><strong>'.$value["NOM"].'</strong>';
                                    if(count($dataMaladie)>0){
                                        echo'&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-first-aid fa-sm"></i>';
                                    }        
                                echo'</h4>
                                </div>
                                <div class="row justify-content-center">
                                    <p class="card-text" style="font-size:1.2em"><i>'.$value["NOM_RACE"].'</i></p>
                                </div>
                                <div class="row justify-content-center">';
                                if($value["SEXE"]=="Mâle"){
                                echo'<i class="fas fa-mars fa-2x"></i>';
                                }
                                else{
                                echo'<i class="fas fa-venus fa-2x"></i>';
                                }                            
                           echo'</div>
                        </div>                   
                    </div>                   
                </div>';        
            
        
        echo'<div id="myModal'.$i.'" class="modal fade" role="dialog"">
                <div class="modal-dialog modal-xl modal-dialog-centered">                    
                    <div class="modal-content" style="min-height:max-content">
                        <div class="col-12">
                            <div class="row bg-light" style="font-size:1.4em">
                                <div class="col-lg-4 col-sm-12 bg-1">
                                    <div class="row">
                                    <img style="z-index:1; height:100%; width:100%" src="data:image/png;base64,'.base64_encode($value['PHOTO']).'"/>
                                    </div>                            
                                </div>
                                <div class="col-lg-3 col-sm-12 text-center bg-1 d-flex align-items-center">
                                    <div class="row ">
                                        <div class="col-12">
                                        <h3 class="text-break"><strong>'.$value["NOM"].'</strong></h3>
                                        </div>
                                        <div class="col-12">
                                            <p class="text-break">Race : '.$value["NOM_RACE"].'</p>
                                        </div>   
                                        <div class="col-12">
                                        <p>Né le  : <br/>'.dateFr($value["DATE_NAISSANCE"]).'  </p>
                                        </div>                           
                                    </div>                            
                                </div>
                                <div class="col-lg-5 col-sm-12 bg-1 d-flex align-items-center">
                                
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12 d-flex align-items-center">
                                            <ul class="list-group list-group-flush">
                                                <li class="mb-1">Identification : '.$value["NO_PUCE"].' </li>
                                                <li class="mb-1">Poils : '.$value["ROBE"].'</li>
                                                <li class="mb-1">Couleur : '.$value["COULEUR"].'</li>
                                                
                                            </ul>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <ul class="list-group list-group-flush">
                                                <li> Sexe : '.$value["SEXE"].'</li>
                                                <li >Poids : '.$value["POIDS"].' kg</li>
                                                <li >Taille : '.$value["TAILLE"].' cm</li>
                                                <li>Caractère : '.$value["CARACTERE"].'</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row bg-3" style="font-size:1.2em">
                                <div class="col-lg-12 text-center p-2 bg-grey-light">
                                    <i>Vous avez eu un coup de coeur pour cet animal ? Contactez nous !</i>
                                    <p class="mb-0">ANITOPIA - '.$value["VILLE"].' </br> '.$value["NUMERO"].', '.$value["RUE"].' - '.$value["CODE_POSTAL"].' '.$value["VILLE"].' </br><i>tél</i> : '.$value["TELEPHONE"].' / <i>email</i> : '.$value["EMAIL"].'</p>
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

    if(isset($_GET["select"])){
        $espece=ucfirst($_GET["select"]);
        $animauxService->serviceSelectAdoptableAnimalsByType($espece);
        if(count($data)>0){

            affichage($data);
        }
        else{
            echo '<div class="alert alert-primary text-center col-lg-6 offset-lg-3" role="alert">Aucun animal ne correspond à votre recherche !</div>';
        }
    }
    elseif(!isset($_GET["select"])){
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
    }
    

    function dateFr($date){
        return strftime('%d-%m-%Y',strtotime($date));
    }
     
?>

<script src="../../javascript/like.js"></script>