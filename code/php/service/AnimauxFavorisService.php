<?php

class AnimauxFavorisService extends ServiceCommun implements InterfaceService{

    public function serviceSelectAll(){}
    
    public function serviceSelectAllUserFavouriteAnimals($id)
    {
        $data = $this->getDataAccessObject()->daoSelectAllUserFavouritesAnimals($id);
        return $data;
    }

    public function serviceSelect($id){}
    public function serviceCount(){}
    public function serviceAdd(object $var){}
    public function serviceSearch($search){}
    public function serviceUpdate($post){}

    public function serviceDelete($infosRetraitFavoris){
        $this->getDataAccessObject()->daoDelete($infosRetraitFavoris);
    }
    public function serviceCountUserFavouriteAnimals($id){}

    public function serviceDisplayUserFavouriteAnimals($id)
    {

            $dataAnimaux = $this->getDataAccessObject()->daoSelectAllUserFavouritesAnimals($id);
            $count = count($dataAnimaux);

            echo 
            '
                <div class="row mt-2 ">
                    <div class="col-8 offset-2 text-center border rounded border-black text-center">
                        <div class="row m-3 ">
                            <div class="col-12 text-center">
                                <p> Pour ajouter d\'autres animaux dans vos coups de coeur, cliquez sur le <a href="adopter-un-animal.php"><i class="far fa-heart"></i></a> situé en haut à droite des fiches sur la page d\'adoption</p>
                                <a href="adopter-un-animal.php"><button type="button" class="btn btn-outline-info">Ajoutez d\'autres compagnons dans vos coups de coeur</button></a>
                            </div>
                        </div>
                    </div>                                
                </div>
            ';

            for ($i = 0; $i < $count ; $i++) 
            
            {
                $rawPhoto = "data:image/png;base64," . base64_encode($dataAnimaux[$i]["PHOTO"]);
                echo 
                '
                <div class="row mt-2">
                    <div class="col-8  offset-2 border rounded border-black">
                        <div class="row">
                            <div class="col-lg-4 col-sm-12 ">
                                <div class="row">
                                    <a href="" data-toggle="modal" data-target="#modalPhotos'.$i.'"></a>
                                </div>                            
                            </div>
                            <div class="col-lg-2 col-sm-12 text-center">
                                <div class="row mt-2">
                                    <div class="col-12">
                                    <h4 class="text-break">'.$dataAnimaux[$i]["NOM"].'</h4>
                                    </div>
                                    <div class="col-12">
                                        <p class="text-break"><small><strong>Race/Apparence :</strong></small></p>
                                        <p>'.$dataAnimaux[$i]["NOM_RACE"].'</p>
                                    </div>                           
                                </div>
                                    <div class="col-12">
                                        <p><strong>Né le  : </strong><br/>'.dateFr($dataAnimaux[$i]["DATE_NAISSANCE"]).'  </p>
                                    </div>                                                         
                            </div>
                            <div class="col-lg-5 col-sm-12">
                                <div class="row mt-2">
                                    <div class="col-lg-6 col-sm-12">
                                        <ul class="list-group list-group-flush">
                                            <li >Identification : '.$dataAnimaux[$i]["NO_PUCE"].' </li>
                                            <li >Poils : '.$dataAnimaux[$i]["ROBE"].'</li>
                                            <li >Couleur : '.$dataAnimaux[$i]["COULEUR"].'</li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <ul class="list-group list-group-flush">
                                            <li> Sexe : '.$dataAnimaux[$i]["SEXE"].'</li>
                                            <li >Poids : '.$dataAnimaux[$i]["POIDS"].' kg</li>
                                            <li >Taille : '.$dataAnimaux[$i]["TAILLE"].' cm</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <ul class="list-group list-group-flush">
                                            <li >Caractère : <br/>'.$dataAnimaux[$i]["CARACTERE"].'</li>
                                        </ul>
                                    </div>
                                    <div class="col-6">
                                        <ul class="list-group list-group-flush">
                                            <li >Spécificités : <br/>'.$dataAnimaux[$i]["SPECIFICITE"].'</li>
                                        </ul>
                                    </div>                                    
                                </div>                                
                            </div>
                            <div class="col-lg-1 col-sm-12">
                                <div class="row">
                                    <button type="button" class="btn " data-toggle="modal" data-target="#modalRetrait'.$i.'"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>      
        
                ';
            }
            
        }

        

    public function serviceDisplayNoFavoritesAnimals()
    {
        echo 
        '
            <div class="row mt-2">
                <div class="col-8 offset-2 text-center border rounded border-black text-center">
                    <div class="row m-3 ">
                        <div class="col-12 text-center">
                            <h5>Pas encore d\'animaux Coup de coeur ?</h5>
                            <p> Pour en ajouter un, cliquez sur le <a href="adopter-un-animal.php"><i class="far fa-heart"></i></a> situé en haut à droite des fiches sur la page d\'adoption</p>
                            <a href="adopter-un-animal.php"><button type="button" class="btn btn-outline-info">Ajoutez un Compagnon dans vos coups de coeur</button></a>
                        </div>
                    </div>
                </div>                                
            </div>
        ';
    }

    public function serviceVerifyIfAnimalAlreadyFavourite($idUser, $idAnimal){
        $data = $this->getDataAccessObject()->daoVerifyIfAnimalAlreadyFavourite($idUser, $idAnimal);
        return $data;
    }

    public function  serviceAddOrRemoveFavouriteAnimal($idUser, $idAnimal){

        $data=$this->serviceVerifyIfAnimalAlreadyFavourite($idUser, $idAnimal);

        if(count($data)>0){
            $this->getDataAccessObject()->daoRemoveFavouriteAnimal($idUser, $idAnimal);
        }
        else{
            $this->getDataAccessObject()->daoAddFavouriteAnimal($idUser, $idAnimal);            
        }

    }

}


?>