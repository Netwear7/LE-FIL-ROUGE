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
                                <p> Pour ajouter d\'autres animaux dans vos coups de coeur, cliquez sur le COEURCOEUR situé en haut à droite des fiches sur la page d\'adoption</p>
                                <a href="adopter-un-animal.php"><button type="button" class="btn btn-outline-info">Ajoutez d\'autres compagnons dans vos coups de coeur</button></a>
                            </div>
                        </div>
                    </div>                                
                </div>
            ';

            for ($i = 0; $i < $count ; $i++) 
            
            {
                
                echo 
                '
                <div class="row mt-2  ">
                    <div class="col-8 offset-2 border rounded border-black ">
                        <div class="row">
                            <div class="card w-100">
                                <div class="row ">
                                    <div class="col-md-4 col-sm-12 bg-grey-light">
                                        <!--image-->
                                        <img src="../../img/Chien/chien2.jpg" class="rounded w-100" alt="img-profil-5">
                                    </div>
                                    <div class="col-md-2 col-sm-12 bg-grey-light">
                                        <!--informations sur lanimal-->
                                        <div class="card-block text-center">
                                            <h4 class="card-title mt-3"> '.$dataAnimaux[$i]["NOM"].'</h4>
                                            <h5 class=" mt-3">'.$dataAnimaux[$i]["NOM_RACE"].'</h5>
                                            <p class="card-text"><strong>Né le  : </strong><br/>'.$dataAnimaux[$i]["DATE_NAISSANCE"].'  </p>
                                            <form method="POST" action="">
                                                <input type="hidden" name="id_utilisateur" value="'.$_SESSION["user_id"].'"/>
                                                <button type="button submit" class="btn btn-outline-info" name="retraitFavoris" value="'.$dataAnimaux[$i]["ID_ANIMAL"].'">Retirer des favoris</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!--COL INFORMATIONS-->
                                    <div class="col-md-6 bg-grey-light">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-12">
                                                <div class="card-block">
                                                    <p class="card-text">
                                                        <ul class="list-group list-group-flush">
                                                            <li >Poils : '.$dataAnimaux[$i]["ROBE"].'</li>
                                                            <li >Couleur : '.$dataAnimaux[$i]["COULEUR"].'</li>
                                                            <li >Caractère : '.$dataAnimaux[$i]["CARACTERE"].' </li>
                                                        </ul>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 bg-grey-light">
                                            <div class="card-block">
                                                <p class="card-text">
                                                    <ul class="list-group list-group-flush">
                                                        <li> Sexe : '.$dataAnimaux[$i]["SEXE"].'</li>
                                                        <li >Poids : '.$dataAnimaux[$i]["POIDS"].' kg</li>
                                                        <li >Taille : '.$dataAnimaux[$i]["TAILLE"].' cm</li>
                                                    </ul>
                                                </p>
                                            </div>
                                        </div>
                                        </div>
                                        <!--row spécificités-->
                                        <div class="row">
                                            <div class="col-12 bg-grey-light">
                                                <div class="card-block">
                                                    <p class="card-text">
                                                        <ul class="list-group list-group-flush">
                                                            <li >Spécificités : <br/>'.$dataAnimaux[$i]["SPECIFICITE"].'</li>
                                                        </ul>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                            <p> Pour en ajouter un, cliquez sur le COEURCOEUR situé en haut à droite des fiches sur la page d\'adoption</p>
                            <a href="adopter-un-animal.php"><button type="button" class="btn btn-outline-info">Ajoutez un Compagnon dans vos coups de coeur</button></a>
                        </div>
                    </div>
                </div>                                
            </div>
        ';
    }

}


?>