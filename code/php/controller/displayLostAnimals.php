<?php

include_once('../data-access/AnimauxDataAccess.php');
include_once('../service/AnimauxService.php');


    function affichage($data){
        $i=0;
        foreach($data as $key => $value){
            $i++;
            echo '<div class="col-lg-3 mb-4 contentDisplay">
                    <div class="card">
                        <img  style="z-index:1; width:100%" data-toggle="modal" data-target="#myModal'.$i.'" src="data:image/png;base64,'.base64_encode($value['PHOTO']).'"/>
                        <div class="card-body bg-white shadow-sm" data-toggle="modal" data-target="#myModal'.$i.'">
                            <div class="row justify-content-center">
                            <h4 class="card-text "><strong>'.$value["nom"].'</strong></h4>
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
                            <div class="col-12  border rounded border-black">
                                <div class="row bg-light" style="font-size:1.4em">
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="row">
                                        <img  style="z-index:1; height:100%; width:100%" src="data:image/png;base64,'.base64_encode($value['PHOTO']).'"/>
                                        </div>                            
                                    </div>
                                    <div class="col-lg-3 col-sm-12 text-center bg-1 d-flex align-items-center">
                                        <div class="row ">
                                            <div class="col-12">
                                            <h4 class="text-break"><strong>'.$value["nom"].'</strong></h4>
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
                                                <div class="col-lg-12 col-sm-12 d-flex justify-content-center">';
                                            if($value["SEXE"]=="Mâle"){
                                                echo'
                                                <i>Perdu le : </i> <strong>&nbsp; '.$value["DATE_PERTE"].' </strong><i>&nbsp;&nbsp;à&nbsp;&nbsp; <strong></i>'.$value["VILLE"].'</strong>';
                                            }
                                            else{
                                                echo'
                                                <i>Perdue le : </i> <strong>&nbsp; '.$value["DATE_PERTE"].' </strong><i>&nbsp;&nbsp;à&nbsp;&nbsp; <strong></i>'.$value["VILLE"].'</strong>';
                                            }
                                            echo'</div>
                                                <div class="col-lg-12 col-sm-12 text-center"><i> Circonstances de la perte : </i></div>
                                                <div class="col-lg-12 col-sm-12 text-center"><strong> '.$value["DESC_PERTE"].'</strong></div>
                                        </div>
                                    </div>


                                  
                                </div>
                                <div class="row bg-2" style="font-size:1.2em">
                                    <div class="col-lg-12 text-center p-2 bg-grey-light">
                                        <i>Vous avez vu cet animal ? Contactez '.$value["PRENOM"].' ! </br>
                                            Par téléphone : '.$value["NUM"].' </br>
                                            ou </br>
                                            Par mail : '.$value["ADRESSE_EMAIL"].'</i>
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

    if(isset($_GET["id"])){
        $idAnimal=$_GET["id"];
        $data=$animauxService->serviceSelectlostAnimalById($idAnimal);
        if(count($data)>0){
            affichage($data);
        }
        else{
            echo '<div class="alert alert-primary text-center col-lg-6 offset-lg-3" role="alert">Aucun animal ne correspond à votre recherche !</div>';
        }
    }

    else{
        if(empty($_POST["nom_espece"]) && empty($_POST["nom_race"]) && empty($_POST["couleur"]) && empty($_POST["poil"]) && empty($_POST["sexe"]) && empty($_POST["ville"])){
            $data=$animauxService->serviceSelectAllLostAnimals();
            affichage($data);
        }
    
        if(!empty($_POST["nom_espece"]) ||!empty($_POST["nom_race"]) ||!empty($_POST["couleur"]) ||!empty($_POST["poil"]) ||!empty($_POST["sexe"]) ||!empty($_POST["ville"])){
            $data=$animauxService->serviceSearchLostAnimals($_POST);
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