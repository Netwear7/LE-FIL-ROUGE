<?php

class AnimauxFavorisService extends ServiceCommun implements InterfaceService{

    public function serviceSelectAll(){}
    public function serviceSelectAllUserFavouriteAnimals()
    {

    }
    public function serviceSelect($id){}
    public function serviceCount(){}
    public function serviceAdd(object $var){}
    public function serviceSearch($search){}
    public function serviceUpdate(array $post){}
    public function serviceDelete($nom){}
    public function serviceCountUserFavouriteAnimals($id){}

    public function serviceDisplayUserFavouriteAnimals()
    {

            $data = $this->getDataAccessObject()->daoSelectAllUserFavouritesAnimals($id);
            $count = count($data);

            for ($i = 0; $i < $count ; $i++) 
            
            {
                
                echo 
                '
                <div class="row mt-2">
                    <div class="col-8 offset-2 border rounded border-black">
                        <div class="row">
                            <div class="card w-100">
                                <div class="row ">
                                    <div class="col-md-4">
                                        <!--image-->
                                        <img src="Koala.jpg" class="rounded w-100" alt="img-profil-5">
                                    </div>
                                    <div class="col-md-2">
                                        <!--informations sur lanimal-->
                                        <div class="card-block text-center">
                                            <h4 class="card-title mt-3"> '.$data[$i]["NOM"].'</h4>
                                            <h5 class=" mt-3">'.$data[$i]["NOM_RACE"].'</h5>
                                            <p class="card-text"><strong>Né le  : </strong><br/>'.$data[$i]["DATE_NAISSANCE"].'  </p>
                                            <!--Bouton pour le modal signaler perdu-->
                                            <a href="#lost" data-toggle="modal" data-target="#modalPerdu">Signaler perdu</a>  
                                            <!--signaler retrouvé ?-->
                                            <a href="#lost" data-toggle="modal" data-target="#modalRetrouvé">Signaler Retrouvé</a>                                                          
                                            <!--bouton modifier-->
                                            <button type="button" class="btn btn-outline-info" id="modAnimal-list" data-toggle="list" href="#list-modAnimal" role="tab" aria-controls="modAnimal">Modifier</button>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-outline-info mb-2 " data-toggle="modal" data-target="#modalRetrait">
                                                retirer la fiche
                                            </button>
                                        </div>
                                    </div>
                                    <!--COL INFORMATIONS-->
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="card-block">
                                                    <p class="card-text">
                                                        <ul class="list-group list-group-flush">
                                                            <li >Couleur : '.$data[$i]["COULEUR"].'</li>
                                                            <li >Caractère : '.$data[$i]["CARACTERE"].' </li>
                                                        </ul>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="card-block">
                                                <p class="card-text">
                                                    <ul class="list-group list-group-flush">
                                                        <li >Poids : '.$data[$i]["POIDS"].' kg</li>
                                                        <li >Taille : '.$data[$i]["TAILLE"].' cm</li>
                                                    </ul>
                                                </p>
                                            </div>
                                        </div>
                                        </div>
                                        <!--row spécificités-->
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card-block">
                                                    <p class="card-text">
                                                        <ul class="list-group list-group-flush">
                                                            <li >Spécificités : <br/>'.$data[$i]["SPECIFICITE"].'</li>
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

                <!-- Modal signaler perdu -->
                <div class="modal fade" id="modalPerdu" tabindex="-1" role="dialog" aria-labelledby="modalPerduTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalRetrouvéTitle">Signaler votre animal comme étant perdu ?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <label for="textAreaperte">Quelques précisions concernant le lieu ? lheure ?</label>
                                <textarea class="form-control" id="textareaperte" name="précisionsPerte" rows="3"></textarea>
                                <p>Une fois la perte déclarée, votre animal sera affiché dans la section "Animaux perdus" visible en cliquant ici : <br/> Les utilisateurs pourront avoir accès aux informations de contact présentes sur votre profil dans le cas ou ils auraient des informations ou peut-être apercu votre animal.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                <button type="button" class="btn btn-primary">Signaler Perdu</button>
                            </div>
                        </div>
                    </div>
                </div>
                        
                <!-- Modal signaler retrouvé -->
                <div class="modal fade" id="modalRetrouvé" tabindex="-1" role="dialog" aria-labelledby="modalRetrouvéTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalRetrouvéTitle1">Confirmez vous avoir Retrouvé votre animal?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <small id="lostAnimal" class="form-text text-muted">Si cest bien le cas, nous somme heureux que vous ayez pu le retrouver</small>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                <button type="button" class="btn btn-primary">Confirmer</button>
                            </div>
                        </div>
                    </div>
                </div>
                    
                <!-- Modal -->
                <div class="modal fade" id="modalRetrait" tabindex="-1" role="dialog" aria-labelledby="modalRetraitTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalRetraitCenterTitle">Êtes vous sûr de vouloir retirer la fiche?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>En cliquant sur le bouton ci-dessous vous confirmez le retrait de la fiche animale de vos fiches. Une fois laction validée, la fiche ne sera plus disponible</p>
                                <p class="mt-2">Confirmer le retrait ?</p>
                            </div>
                            <div class="modal-footer">
                                <form method="post" action="test.php">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="button submit"  class="btn btn-outline-info" name="confirmRetrait" value="true">Confirmer le retrait</button>
                                </form>
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
                            <h5>Pas encore danimaux Coup de coeur ?</h5>
                            <p> Pour en ajouter, cliquez sur le COEURCOEUR situé en haut à droite des fiches sur la page Dadoption</p>
                            <button type="button" class="btn btn-outline-info">Ajoutez un Compagnon dans vos coups de coeur</button>
                        </div>
                    </div>
                </div>                                
            </div>
        ';
    }

}


?>