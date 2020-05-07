<?php


session_start();

if(!isset($_SESSION["user_id"]))
{

    header('Location: accueil.php');
    exit;
}


?>



<!DOCTYPE html>
<html lang=fr>
    <head>

    
        <!-- script Javascript-->

        <title>Mon compte</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet"> 
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="../../css/header-and-color-test.css">
        <link rel="stylesheet" href="../../css/global.css">
        <link rel="stylesheet" href="../../css/monCompte.css">



    </head>
    <body>

        <?php
            include_once("header.php");
        ?>

        <!--PARTIE PRINCIPALE-->


        <div class="container-fluid bg-grey-light">
            <div class="row">



                <!--NAVBAR COTE GAUCHE-->
                <div class="col-lg-2 col-sm-12 border rounded-sm border-black">
                    <div class="row">
                        <div class="col">
                            <h3 >Mon Compte</h3>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="nav  nav-pills  w-100  " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="list-group-item list-group-item-action bg-grey-light" id="list-profile-list" data-toggle="list" href="#profilePanel" role="tab" aria-controls="profile">Mes Informations Personnelles</a>
                            <a class="list-group-item list-group-item-action bg-grey-light" id="list-myanimals-list" data-toggle="list" href="#animalTab" role="tab" aria-controls="myanimals">Mes Compagnons</a>
                            <a class="list-group-item list-group-item-action bg-grey-light" id="list-myfavourites-list" data-toggle="list" href="#list-favourites" role="tab" aria-controls="myfavourites">Mes Animaux Coup de coeur</a>
                            <a class="list-group-item list-group-item-action bg-grey-light" id="list-myDonations-list" data-toggle="list" href="#list-donations" role="tab" aria-controls="myDonations">Mes Donations</a>
                            <a class="list-group-item list-group-item-action mt-auto bg-grey-light" data-toggle="modal" data-target="#modalLogout">Se Déconnecter</a>
                        </div> 
                    </div>
                </div>



                <!-- Modal se déconnecter -->
                <div class="modal fade" id="modalLogout" tabindex="-1" role="dialog" aria-labelledby="modalLogoutTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalRetraitCenterTitle">Êtes vous sûr de vouloir vous déconnecter?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-footer">
                                <form method="POST" action="compteController.php">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="button submit" class="btn btn-outline-info" name="logout">Déconnexion</a>
                                </form>                                            
                            </div>
                        </div>
                    </div>
                </div>


                <!--PARTIE CENTRALE-->


                <div class="col-lg-10 col-sm-12 ">
                    <div class="tab-content" id="nav-tabContent">



                        <!--PREMIER SLIDE DANS MES INFOS PERSONNELLES-->
                        <div class="tab-pane fade show active" id="profilePanel" role="tabpanel" aria-labelledby="list-profile-list">
                            <div class="row ">
                                <div class="col-8 offset-2 mt-5 border rounded border-black shadow-sm">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <h3 class="mt-2">Mes Informations Personnelles</h3>
                                        </div>                                                
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3" id="rowUserInfos" >


                            </div>




                            <!--PARTIE OU IL Y A LES BOUTONS SUPP ET MOD MDP-->
                            <div class="row mb-5">
                                <div class="col-8 offset-2 rounded border-black mt-2">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-12 ">
                                            <!--Supprimer mon compte -->
                                            <div class="row justify-content-center">
                                                <button class="btn btn-outline-warning" type="button" data-toggle="collapse" data-target="#collapseSuppression" aria-expanded="false" aria-controls="collapseExample">
                                                    Demander à supprimer mes informations
                                                </button>
                                            
                                                <div class="collapse mt-2" id="collapseSuppression">
                                                    <div class="card card-body">
                                                        <p>En cliquant sur le bouton ci-dessous, vous nous soummetez une demande pour supprimer votre compte ainsi que toutes vos informations personnelles, nous reviendrons vers vous dans les plus brefs délais</p>
                                                        <form >
                                                            <button class="btn btn-outline-danger btn-lg btn-block" type="submit" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" name="delete">Confirmer</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-sm-12">
                                            <button  type="button" id="modifierInfos" class="btn btn-outline-info" id="updateInfo-list" data-toggle="list" href="#updateUserInfosPanel" role="tab" aria-controls="updatemyInfos">Modifier mes informations Personnelles</button>
                                        </div>
                                        <!--modifier mon mdp-->
                                        <div class="col-lg-4 col-sm-12 ">
                                            <div class="row justify-content-center">

                                                <button class="btn btn-outline-info" type="button" data-toggle="collapse" data-target="#collapseMdp" aria-expanded="false" aria-controls="collapseExample">
                                                    Modifier mon MDP
                                                </button>
                                            
                                                <div class="collapse mt-2" id="collapseMdp">
                                                    <div class="card card-body">
                                                        <form id="updatePassword">
                                                            <label for="inputPassword2" class="sr-only">Mot de Passe Actuel</label>
                                                            <input type="password" class="form-control mt-2" id="inputPassword2" placeholder="MdP Actuel" name="oldMdp">
                                                            <label for="inputPassword2" class="sr-only mt-2">Nouveau Mot de Passe</label>
                                                            <input type="password" class="form-control mt-2" id="inputPassword3" placeholder="Nouveau MdP" name="newMdp">
                                                            <label for="inputPassword2" class="sr-only mt-2">Confirmation MdP</label>
                                                            <input type="password" class="form-control mt-2" id="inputPassword4" placeholder="Confirmation MdP" name="confirmNewMdp">   
                                                            <button type="submit" class="btn btn-outline-info mb-2 mt-2" name="updatePassword">Confirmer la modification</button>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="resultUpdatePassword">

                            </div>

                        </div>

                        <!--PARTIE MODIFIER DU PREMIER SLIDE infos personnelles-->
                        <div class="tab-pane fade mb-5 " id="updateUserInfosPanel" role="tabpanel" aria-labelledby="list-updateInfo-list">
                            <div class="row">
                                <div class="col-8 offset-2 text-center border rounded border-black mt-5">
                                    <h3 class="mt-1">Mes Informations Personnelles</h3>
                                </div>
                            </div>
                            <form  id="updateUserInfos">
                            </form> 
                            <div class="row mb-3" id="resultModificationInfos">

                            </div>
                        </div>

                        <!--SECOND PANEL MES COMPAGNONS-->
                        <div class="tab-pane fade mb-5" id="animalTab" role="tabpanel" aria-labelledby="list-compagnons-list">
                            <div class="row " id="errorAnimal">
                            
                            </div>
                            <!--titre-->
                            <div class="row">
                                <div class="col-8 offset-2 border rounded border-black mt-5 mb-3 text-center">
                                        <h3 class="mt-2">Mes Compagnons</h3>                                        
                                </div>
                            </div>
                            <!--Affichage de la row ajouter un compagnon si pas d'animaux / sinon affichage des animaux dans les cartes -->
                            <div class="row mt-3" id="rowAnimals" >


                            </div>
                            
                            <!-- Modal signaler perdu -->
                            <div class="modal fade" id="modalPerdu" tabindex="-1" role="dialog" aria-labelledby="modalPerduTitle" aria-hidden="true">
                            </div>

                            <!-- Modal signaler retrouvé -->
                            <div class="modal fade" id="modalRetrouve" tabindex="-1" role="dialog" aria-labelledby="modalRetrouvéTitle" aria-hidden="true">    
                            </div>

                            <!-- Modal retrait animal -->
                            <div class="modal fade" id="modalRetrait" tabindex="-1" role="dialog" aria-labelledby="modalRetraitTitle" aria-hidden="true">
                            </div>


                        </div>

                        <!--PARTIE POUR MODIFIER un compagnon V2 /)-->
                        <div class="tab-pane fade" id="panelModifyAnimal" role="tabpanel" aria-labelledby="list-modAnimal-list">

                        </div>
                    


                        

                        <!--PARTIE POUR ADD un compagnon /)-->
                        <div class="tab-pane fade mb-5" id="list-addAnimal" role="tabpanel" aria-labelledby="list-addAnimal-list">


                        </div>


                        
                        
                       

                        <!--PANEL 3 ANIMAUX FAVORIS-->




                        <div class="tab-pane fade mb-5" id="list-favourites" role="tabpanel" aria-labelledby="list-favourites-list">
                            <div class="row">

                            <!--titre-->
                                <div class="col-8 offset-2 text-center border rounded border-black mt-5 mb-3">
                                    <h3 class="mt-2">Mes Animaux Favoris</h3>
                                </div>
                            </div>

                            <!--si pas d'animaux en favoris affichage de la div ajouter un animal en favoris sinon affichage des animaux en favoris-->
                            <div class="row">
                                <div class="col-12" id="rowFavouriteAnimals"></div>
                            </div>

                            <div class="row" id="resultRemoveFavourite">

                            </div>
                        </div>        

                        <!-- Modal retrait animal -->
                            <div class="modal fade" id="modalRetraitFavoris" tabindex="-1" role="dialog" aria-labelledby="modalRetraitTitle" aria-hidden="true">
                            </div>
                        
                        
                        <!--Mes dons-->
                        <div class="tab-pane fade mb-5" id="list-donations" role="tabpanel" aria-labelledby="list-donations-list">
                            <div class="row">

                            <!--titre-->
                                <div class="col-8 offset-2 text-center border rounded border-black mt-5 mb-3">
                                    <h3 class="mt-2">Mes Dons</h3>
                                </div>
                            </div>
                            <div class="row " >
                                <div class="col-12" id="rowDonations">
                                    
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>                
            </div>
        </div>
        <?php
            include_once 'footer.php';
        ?>
    </body>    
    <script src="../../javascript/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="script.js"></script>
    <script src="../../javascript/scriptDisplayRaceInAddAnimals.js"></script>
    <script src="../../javascript/updateUserInfos.js"></script>
    <script src="../../javascript/updatePassword.js"></script>
    <script src="../../javascript/removeFavouriteAnimal.js"></script>
    <script src="../../javascript/removeUserAnimal.js"></script>
    <script src="../../javascript/affichageMonCompte.js"></script>
    <script src="../../javascript/lostAnimal.js"></script>
    <script src="../../javascript/fontAwesome.js"></script>

    
</html>
