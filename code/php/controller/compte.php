<!--regex for le nom and prénom

/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u
-->


<?php

include_once '../service/UtilisateurService.php';
include_once '../data-access/UtilisateurDataAccess.php';

$nom = "STOEV";
$id = '1';


$daoUtilisateur = new UtilisateurDataAccess();
$serviceUtilisateur = new UtilisateurService($daoUtilisateur);

if (isset($_POST["suppression"])){

    $daoUtilisateur = new UtilisateurDataAccess();
    $serviceUtilisateur = new UtilisateurService($daoUtilisateur);
    $serviceUtilisateur->serviceSuppression($nom);


}

if (isset($_POST["modifierMdp"])){
    $daoUtilisateur = new UtilisateurDataAccess();
    $serviceUtilisateur = new UtilisateurService($daoUtilisateur);
    $serviceUtilisateur->serviceModificationMdp($_POST);

}



?>



<!DOCTYPE html>
<html lang=fr>
    <head>
        <!-- script Javascript-->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <title>Mon compte</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="../../css/header-and-color-test.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    </head>
    <body>

        <?php
            include_once("header.php");
        ?>

        <!--PARTIE PRINCIPALE-->
        <div class="container-fluid">
            <div class="row vh-100">
                <!--NAVBAR COTE GAUCHE-->
                <div class="col-lg-2 col-sm-12 border border-black">
                    <div class="row">
                        <h3>Mon Compte</h3>
                    </div>
                    <div class="row">
                        <div class="nav  nav-pills  w-100 " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Mes Informations Personnelles</a>
                            <a class="list-group-item list-group-item-action" id="list-myanimals-list" data-toggle="list" href="#list-compagnons" role="tab" aria-controls="myanimals">Mes Compagnons</a>
                            <a class="list-group-item list-group-item-action" id="list-myfavourites-list" data-toggle="list" href="#list-favourites" role="tab" aria-controls="myfavourites">Mes Animaux Coup de coeur</a>
                            <a class="list-group-item list-group-item-action mt-auto" data-toggle="modal" data-target="#modalLogout">Se Déconnecter</a>
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
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                            <a type="button" class="btn btn-outline-danger" href="accueil.html">Déconnexion</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
                <!--PARTIE CENTRALE-->
                <div class="col-lg-10 col-sm-12">
                    <div class="tab-content" id="nav-tabContent">
                        <!--PREMIER SLIDE DANS MES INFOS PERSONNELLES-->
                        <div class="tab-pane fade show active" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                            <div class="row">
                                <div class="col-8 offset-2 border rounded border-black mt-5">
                                    <div class="row">
                                        <div class="col-10">
                                            <h3>Mes Informations Personnelles</h3>
                                        </div>
                                        <div class="col-2">
                                            <form method="POST">
                                                <div class="row d-flex justify-content-end">
                                                    <button  type="button" name="modifier" class="btn btn-outline-info" id="updateInfo-list" data-toggle="list" href="#list-updateInfo" role="tab" aria-controls="updatemyInfos">Modifier</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8 offset-2 border rounded border-black mt-2">
                                        <?php $serviceUtilisateur->utilisateurServiceAffichageinfos(); 
                                        if (isset($_POST["modification"])){
                                            
                                            echo $serviceUtilisateur->serviceModification($_POST);
                                         }
                                        ?>
                                        
                                </div>
                            </div>
                            <!--PARTIE OU IL Y A LES BOUTONS SUPP ET MOD MDP-->
                            <div class="row">
                                <div class="col-8 offset-2 rounded border-black mt-2">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12 ">
                                            <div class="row justify-content-center">
                                                <button class="btn btn-outline-danger" type="button" data-toggle="collapse" data-target="#collapseSuppression" aria-expanded="false" aria-controls="collapseExample">
                                                    Supprimer mon Compte
                                                </button>
                                            
                                                <div class="collapse mt-2" id="collapseSuppression">
                                                    <div class="card card-body">
                                                        <p>En cliquant sur le bouton ci-dessous vous confirmez accepter la suppression de votre compte ainsi que de toutes vos données personnelles enregistrées dans nos bases de données, une fois la suppression de votre compte effectuée, vous n'aurez plus accès à votre espace personnel. Pour confirmer, cliquez sur le bouton ci-dessous.</p>
                                                        <form method="post" action="test.php">
                                                            <button class="btn btn-outline-danger btn-lg btn-block" type="submit" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" name="Suppression" value="delete" >Confirmer la suppression</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        
                                        <div class="col-lg-6 col-sm-12 ">
                                            <div class="row justify-content-center">
                                                <button class="btn btn-outline-info" type="button" data-toggle="collapse" data-target="#collapseMdp" aria-expanded="false" aria-controls="collapseExample">
                                                    Modifier mon MDP
                                                </button>
                                            
                                                <div class="collapse mt-2" id="collapseMdp">
                                                    <div class="card card-body">
                                                        <form method="post" action="compte.php">
                                                            <label for="inputPassword2" class="sr-only">Mot de Passe Actuel</label>
                                                            <input type="password" class="form-control mt-2" id="inputPassword2" placeholder="MdP Actuel" name="oldMdp">
                                                            <label for="inputPassword2" class="sr-only mt-2">Nouveau Mot de Passe</label>
                                                            <input type="password" class="form-control mt-2" id="inputPassword3" placeholder="Nouveau MdP" name="newMdp">
                                                            <label for="inputPassword2" class="sr-only mt-2">Confirmation MdP</label>
                                                            <input type="password" class="form-control mt-2" id="inputPassword4" placeholder="Confirmation MdP" name="confirmNewMdp">   
                                                            <button type="submit" class="btn btn-outline-info mb-2 mt-2" name="modifierMdp">Confirmer la modification</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--PARTIE MODIFIER DU PREMIER SLIDE-->
                        <div class="tab-pane fade " id="list-updateInfo" role="tabpanel" aria-labelledby="list-updateInfo-list">
                            <div class="row">
                                <div class="col-8 offset-2 text-center border rounded border-black mt-5">
                                    <h3>Mes Informations Personnelles</h3>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-8 offset-2 border rounded border-black ">
                                    <form method="POST" action="compte.php">
                                        <?php echo $serviceUtilisateur->utilisateurServicePanneauModification(); ?>
                <!--PARTIE OU IL Y A LES BOUTONS VALIDER ET ANNULER -->
                                        <div class="row">
                                            <div class="col-8 offset-2 borber rounded border-black mt-2">
                                                <div class="row">
                                                    <div class="col-lg-6 col-sm-12 ">
                                                        <div class="row justify-content-center">
                                                            <button type="button submit" class="btn btn-outline-danger" name="modification">Valider les modifications</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-12">
                                                        <div class="row justify-content-center">
                                                            <button type="button submit" class="btn btn-outline-info">Annuler les modifications</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>    
                                </div>
                            </div>
                        </div>

                        <!--SECOND PANEL MES COMPAGNONS-->
                        <div class="tab-pane fade" id="list-compagnons" role="tabpanel" aria-labelledby="list-compagnons-list">
                            <div class="row">
                                <div class="col-8 offset-2 border rounded border-black mt-5 text-center">
                                        <h3>Mes Compagnons</h3>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-8 offset-2 text-center border rounded border-black text-center">
                                    <div class="row m-3 ">
                                        <div class="col-12 text-center">
                                            <h5>Vous n'avez pas encore ajouté votre Compagnon ?</h5>
                                            <p> Pour ajouter votre compagnon à la liste, cliquez sur le bouton suivant : </p>
                                            <button type="button" class="btn btn-outline-info" id="addAnimal-list" data-toggle="list" href="#list-addAnimal" role="tab" aria-controls="addmyAnimal">Ajoutez votre Compagnon</button>
                                        </div>
                                    </div>
                                </div>                                
                            </div>
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
                                                    <!--informations sur l'animal-->
                                                    <div class="card-block text-center">
                                                        <h4 class="card-title"> Pepito</h4>
                                                        <h5 class="card-title">Main Coon</h5>
                                                        <p class="card-text">Age : 42 ans </p>
                                                        <!--Bouton pour le modal signaler perdu-->
                                                        <a href="#lost" data-toggle="modal" data-target="#modalPerdu">Signaler perdu</a>                                                        
                                                        <!-- Modal -->
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
                                                                        <label for="textAreaperte">Quelques précisions concernant le lieu ? l'heure ?</label>
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
                                                        <!--signaler retrouvé ?-->
                                                        <a href="#lost" data-toggle="modal" data-target="#modalRetrouvé">Signaler Retrouvé</a>                                                        
                                                        <!-- Modal -->
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
                                                                        <small id="emailHelp" class="form-text text-muted">Si c'est bien le cas, nous somme heureux que vous ayez pu le retrouver</small>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                                        <button type="button" class="btn btn-primary">Confirmer</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--bouton modifier-->
                                                        <button type="button" class="btn btn-outline-info" id="modAnimal-list" data-toggle="list" href="#list-modAnimal" role="tab" aria-controls="modAnimal">Modifier</button>
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-outline-info mb-2 " data-toggle="modal" data-target="#modalRetrait">
                                                            retirer la fiche
                                                        </button>
                                                            
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
                                                                        <p>En cliquant sur le bouton ci-dessous vous confirmez le retrait de la fiche animale de vos fiches. Une fois l'action validée, la fiche ne sera plus disponible</p>
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
                                                    </div>
                                                </div>
                                                <!--COL INFORMATIONS-->
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="card-block">
                                                                <p class="card-text">
                                                                    <ul class="list-group list-group-flush">
                                                                        <li >Genre :</li>
                                                                        <li >Race :</li>
                                                                        <li >Robe :</li>
                                                                        <li >Couleur :</li>
                                                                    </ul>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="card-block">
                                                                <p class="card-text">
                                                                    <ul class="list-group list-group-flush">
                                                                        <li >Caractère : </li>
                                                                        <li >Poids :</li>
                                                                        <li >Taille :</li>
                                                                    </ul>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--row spécificités-->
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <p>Spécificités : </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--PANEL 3 ANIMAUX FAVORIS-->




                        <div class="tab-pane fade" id="list-favourites" role="tabpanel" aria-labelledby="list-favourites-list">
                            <div class="row">
                                <div class="col-8 offset-2 text-center border rounded border-black mt-5">
                                    <h3>Mes Animaux Favoris</h3>
                                </div>
                            </div>
                            <!--Si pas d'animaux en favoris-->
                            <div class="row mt-2">
                                <div class="col-8 offset-2 text-center border rounded border-black text-center">
                                    <div class="row m-3 ">
                                        <div class="col-12 text-center">
                                            <h5>Pas encore d'animaux Coup de coeur ?</h5>
                                            <p> Pour en ajouter, cliquez sur le COEURCOEUR situé en haut à droite des fiches sur la page D'adoption</p>
                                            <button type="button" class="btn btn-outline-info">Ajoutez un Compagnon dans vos coups de coeur</button>
                                        </div>
                                    </div>
                                </div>                                
                            </div>
    
                            <!--Si animaux en favoris-->
    
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
                                                <!--informations sur l'animal-->
                                                    <div class="card-block text-center">
                                                        <h4 class="card-title"> Pepito</h4>
                                                        <h5 class="card-title">Main Coon</h5>
                                                        <p class="card-text">Age : 42 ans </p>
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-outline-info mb-2 mt-2" data-toggle="modal" data-target="#modalRetraitfavoris">
                                                            Retirer des favoris
                                                        </button>
                                                                
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="modalRetraitfavoris" tabindex="-1" role="dialog" aria-labelledby="modalRetraitfavorites" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="modalRetraitCenterTitle">Êtes vous sûr de vouloir retirer la fiche de vos favoris?</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>En cliquant sur le bouton ci-dessous vous confirmez le retrait de la fiche animale de vos favoris. Une fois l'action validée, la fiche ne sera plus présente dans vos favoris mais toujours disponible sur le site.</p>
                                                                        <p class="mt-2">Confirmer le retrait ?</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                                        <button type="button" class="btn btn-outline-info">Confirmer le retrait</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--COL INFORMATIONS-->
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="card-block">
                                                                <p class="card-text">
                                                                    <ul class="list-group list-group-flush">
                                                                        <li >Genre :</li>
                                                                        <li >Race :</li>
                                                                        <li >Robe :</li>
                                                                        <li >Couleur :</li>
                                                                    </ul>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="card-block">
                                                                <p class="card-text">
                                                                    <ul class="list-group list-group-flush">
                                                                        <li >Caractère : </li>
                                                                        <li >Poids :</li>
                                                                        <li >Taille :</li>
                                                                    </ul>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--row spécificités-->
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <p>Spécificités : </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                        


                        <!--PARTIE POUR ADD LA FICHE ANIMALE /)-->
                        <div class="tab-pane fade" id="list-addAnimal" role="tabpanel" aria-labelledby="list-addAnimal-list">
                            <div class="row vh-100">
                                <div class="col-12 border rounded border-black">
                                    <form method="POST" action="test.php">
                                        <div class="row mt-3">
                                            <div class="col-lg-12 text-center">
                                                <h3>Ajouter un compagnon</h3>
                                            </div>
                                        </div>
                                
                                        <div class="row mt-5">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="Koala.jpg" class="rounded w-100" alt="img-profil-5">
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <img src="Koala.jpg" class="rounded w-100" alt="img-profil-4">
                                                            </div>
                                                            <div class="col-lg-6 my-2">
                                                                <img src="Koala.jpg" class="rounded w-100" alt="img-profil-3">
                                                            </div>
                                                            <div class="col-lg-6 my-2">
                                                                <img src="Koala.jpg" class="rounded w-100" alt="img-profil-2">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col-lg-12">
                                                                <img src="Koala.jpg" class="rounded w-100" alt="img-profil-1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8 mt-2">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-row text-center">
                                                                    <label for="type"></label><div class="col-lg-12"><h4>Choisir l'espèce :</h4></div></label>                                                                    
                                                                    <div class="col-lg-12 form-group mt-4">
                                                                        <input type="text" name="nom" class="form-control" placeholder="Nom">
                                                                    </div>
                                                                    <div class="col-lg-12 form-group mt-2">
                                                                        <input type="date" name="age" class="form-control" placeholder="Age">
                                                                    </div>
                                                                    <div class="col-lg-12 form-group mt-2">
                                                                        <input type="text" name="poil" class="form-control" placeholder="Poil">
                                                                    </div>
                                                                    <div class="col-lg-12 form-group mt-2">
                                                                        <select id="type" name="race" class="form-control">
                                                                            <option selected>Race</option>
                                                                            <option>...</option>
                                                                            <option>...</option>
                                                                            <option>...</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-12 form-group mt-2">
                                                                        <input type="number" name="taille" class="form-control" placeholder="Taille">
                                                                    </div>
                                                                    <div class="col-lg-12 form-group mt-2">
                                                                        <input type="number" name="poid" class="form-control" placeholder="Poids">
                                                                    </div>
                                                                    <div class="col-lg-12 form-group mt-5">
                                                                        <button type="button" href="#" class="btn btn-secondary btn-lg" style="width:100%">Annuler</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-row text-center">
                                                                    <div class="form-group col-lg-12">
                                                                        <select id="type" class="form-control">
                                                                            <option selected>Animal</option>
                                                                            <option>...</option>
                                                                            <option>...</option>
                                                                            <option>...</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-check col-lg-6 mt-2">
                                                                        <input class="form-check-input" type="radio" name="radio-male" id="radio-male" value="male" checked>
                                                                        <label class="form-check-label" for="radio-male">
                                                                        Mâle
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check col-lg-6 mt-2">
                                                                        <input class="form-check-input" type="radio" name="radio-femelle" id="radio-femelle" value="femelle">
                                                                        <label class="form-check-label" for="radio-femelle">
                                                                        Femelle
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-lg-12 form-group mt-3">
                                                                        <input type="number" id="numero-puce" name="numeropuce" class="form-control" placeholder="N° de la puce">
                                                                    </div>
                                                                    <div class="col-lg-12 form-group mt-2">
                                                                        <textarea rows="4" id="comportement" name="comportement" class="form-control" placeholder="Comportement :"></textarea>
                                                                    </div>
                                                                    <div class="col-lg-12 form-group mt-2">
                                                                        <textarea rows="4" id="Particularités" name="spécificités" class="form-control" placeholder="Particularités : Dîtes nous-en un peu plus ..."></textarea>
                                                                    </div>
                                                                    <div class="col-lg-12 form-group mt-5">
                                                                        <button type="button submit" href="#" class="btn btn-primary btn-lg" style="width:100%">valider</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>                          
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <!--PARTIE POUR MODIFIER LA FICHE ANIMALE /)-->
                        <div class="tab-pane fade" id="list-modAnimal" role="tabpanel" aria-labelledby="list-modAnimal-list">
                            <div class="row vh-100">
                                <div class="col-12 border rounded border-black">
                                    <form>
                                        <div class="row mt-3">
                                            <div class="col-lg-12 text-center">
                                                <h3>Modifier une fiche compagnon</h3>
                                            </div>
                                        </div>
                                
                                        <div class="row mt-5">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="Koala.jpg" class="rounded w-100" alt="img-profil-5">
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <img src="Koala.jpg" class="rounded w-100" alt="img-profil-4">
                                                            </div>
                                                            <div class="col-lg-6 my-2">
                                                                <img src="Koala.jpg" class="rounded w-100" alt="img-profil-3">
                                                            </div>
                                                            <div class="col-lg-6 my-2">
                                                                <img src="Koala.jpg" class="rounded w-100" alt="img-profil-2">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col-lg-12">
                                                                <img src="Koala.jpg" class="rounded w-100" alt="img-profil-1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8 mt-2">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-row text-center">
                                                                    <label for="type"></label><div class="col-lg-12"><h4>Espèce :</h4></div></label>                                                                    
                                                                    <div class="col-lg-12 form-group mt-4">
                                                                        <input type="text" class="form-control" placeholder="Nom">
                                                                    </div>
                                                                    <div class="col-lg-12 form-group mt-2">
                                                                        <input type="text" class="form-control" placeholder="Age">
                                                                    </div>
                                                                    <div class="col-lg-12 form-group mt-2">
                                                                        <input type="text" class="form-control" placeholder="Poil">
                                                                    </div>
                                                                    <div class="col-lg-12 form-group mt-2">
                                                                        <select id="type" class="form-control">
                                                                            <option selected>Race</option>
                                                                            <option>...</option>
                                                                            <option>...</option>
                                                                            <option>...</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-12 form-group mt-2">
                                                                        <input type="text" class="form-control" placeholder="Taille">
                                                                    </div>
                                                                    <div class="col-lg-12 form-group mt-2">
                                                                        <input type="text" class="form-control" placeholder="Poids">
                                                                    </div>
                                                                    <div class="col-lg-12 form-group mt-5">
                                                                        <button type="button" href="#" class="btn btn-secondary btn-lg" style="width:100%">Annuler</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-row text-center">
                                                                    <div class="form-group col-lg-12">
                                                                        <select id="type" class="form-control">
                                                                            <option selected>Animal</option>
                                                                            <option>...</option>
                                                                            <option>...</option>
                                                                            <option>...</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-check col-lg-6 mt-2">
                                                                        <input class="form-check-input" type="radio" name="radio-male" id="radio-male" value="male" checked>
                                                                        <label class="form-check-label" for="radio-male">
                                                                        Mâle
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check col-lg-6 mt-2">
                                                                        <input class="form-check-input" type="radio" name="radio-femelle" id="radio-femelle" value="femelle">
                                                                        <label class="form-check-label" for="radio-femelle">
                                                                        Femelle
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-lg-12 form-group mt-3">
                                                                        <input type="text" id="numero-puce" class="form-control" placeholder="N° de la puce">
                                                                    </div>
                                                                    <div class="col-lg-12 form-group mt-2">
                                                                        <textarea rows="4" id="comportement" class="form-control" placeholder="Comportement :"></textarea>
                                                                    </div>
                                                                    <div class="col-lg-12 form-group mt-2">
                                                                        <textarea rows="4" id="Particularités" class="form-control" placeholder="Particularités : Dîtes nous-en un peu plus ..."></textarea>
                                                                    </div>
                                                                    <div class="col-lg-12 form-group mt-5">
                                                                        <button type="button" href="#" class="btn btn-primary btn-lg" style="width:100%">valider</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>                          
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
        <?php
            include_once("footer.php");
        ?>
    </body>
</html>
















