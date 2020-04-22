<!--regex for le nom and prénom

/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u
-->


<?php


session_start();


include_once '../model/Utilisateur.php';
include_once '../service/UtilisateurService.php';
include_once '../data-access/UtilisateurDataAccess.php';
include_once '../model/Adresse.php';
include_once '../service/AdresseService.php';
include_once '../data-access/AdresseDataAccess.php';
include_once '../model/Animaux.php';
include_once '../service/AnimauxService.php';
include_once '../data-access/AnimauxDataAccess.php';
include_once '../service/RaceService.php';
include_once '../data-access/RaceDataAccess.php';
include_once '../model/AvoirCouleur.php';
include_once '../service/AvoirCouleurService.php';
include_once '../data-access/AvoirCouleurDataAccess.php';
include_once '../model/Perte.php';
include_once '../service/PerteService.php';
include_once '../data-access/PerteDataAccess.php';
include_once '../model/AnimauxFavoris.php';
include_once '../service/AnimauxFavorisService.php';
include_once '../data-access/AnimauxFavorisDataAccess.php';
include_once '../controller/displayUserAnimals.php';
include_once '../controller/displayDonationsInMyAccount.php';

function dateFr($date){
    return strftime('%d-%m-%Y',strtotime($date));
}

if(isset($_SESSION["user_id"]))
{

    $daoUtilisateur = new UtilisateurDataAccess();
    $serviceUtilisateur = new UtilisateurService($daoUtilisateur);

    $daoAnimaux = new AnimauxDataAccess();
    $serviceAnimaux = new AnimauxService($daoAnimaux);

    $daoAnimauxFavoris = new AnimauxFavorisDataAccess();
    $serviceAnimauxFavoris = new AnimauxFavorisService($daoAnimauxFavoris);

    $daoPerte = new PerteDataAccess();
    $servicePerte = new PerteService($daoPerte);

    $avoirCouleurDao = new AvoirCouleurDataAccess();
    $avoirCouleurService = new AvoirCouleurService($avoirCouleurDao);

    $raceDao = new RaceDataAccess();
    $raceService = new RaceService($raceDao);

    $dataAnimaux = $serviceAnimaux->serviceSelectAllUserAnimals($_SESSION["user_id"]);

} else {
    header('Location: accueil.php');
    exit;
}



if (isset($_POST["delete"])){

    $serviceUtilisateur->serviceDelete($nom);
    header('Location: accueil.php');
    exit;

}

if (isset($_POST["updatePassword"])){

    $serviceUtilisateur->serviceUpdatePassword($_SESSION["user_id"],$_POST);

}

if (isset($_POST["updateUserInfos"])){
                                            
    $serviceUtilisateur->serviceUpdate($_POST);

} 

if (isset($_POST["addAnimal"])){
    $animal = new Animaux($_POST);
    $serviceAnimaux->serviceAddUserAnimal($animal);
    $avoirCouleur = new AvoirCouleur($animal);
    $avoirCouleurService->serviceAdd($avoirCouleur);
        
}
    


if (isset($_POST["updateAnimalInfos"])){
                                            
    $serviceAnimaux->serviceUpdate($_POST);

}

if (isset($_POST["removeUserAnimal"])){

    $avoirCouleurService->serviceDelete($_POST);
    $serviceAnimaux->serviceDelete($_POST);
}

if (isset($_POST["perte"])){
    $perte = new Perte($_POST);
    $servicePerte->serviceAdd($perte);
}

if(isset($_POST["idAnimalRetrouve"])){
    $servicePerte->serviceDelete($_POST["idAnimalRetrouve"]);
}

if (isset($_POST["confirmRetrait"])) {

    $serviceAnimaux->serviceDelete($_POST["ID_ANIMAL"]);
}  

if(isset($_POST["retraitFavoris"])){
    $serviceAnimauxFavoris->serviceDelete($_POST);
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


    </head>
    <body>

        <?php
            include_once("header.php");
        ?>

        <!--PARTIE PRINCIPALE-->


        <div class="container-fluid bg-grey-light">
            <div class="row">



                <!--NAVBAR COTE GAUCHE-->
                <div class="col-lg-2 col-sm-12 border border-black">
                    <div class="row">
                        <div class="col">
                            <h3>Mon Compte</h3>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="nav  nav-pills  w-100  " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="list-group-item list-group-item-action bg-grey-light" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Mes Informations Personnelles</a>
                            <a class="list-group-item list-group-item-action bg-grey-light" id="list-myanimals-list" data-toggle="list" href="#list-compagnons" role="tab" aria-controls="myanimals">Mes Compagnons</a>
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
                                <form method="POST" action="">
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
                        <div class="tab-pane fade show active" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                            <div class="row ">
                                <div class="col-8 offset-2 border rounded border-black mt-5">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <h3>Mes Informations Personnelles</h3>
                                        </div>                                                
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">

                                        <?php $serviceUtilisateur->utilisateurServiceDisplayinfos($_SESSION["user_id"]); 
                                        ?>
                            </div>


                            <!--PARTIE OU IL Y A LES BOUTONS SUPP ET MOD MDP-->
                            <div class="row mb-5">
                                <div class="col-8 offset-2 rounded border-black mt-2">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-12 ">
                                            <!--Supprimer mon compte -->
                                            <div class="row justify-content-center">
                                                <button class="btn btn-outline-warning" type="button" data-toggle="collapse" data-target="#collapseSuppression" aria-expanded="false" aria-controls="collapseExample">
                                                    Supprimer mon Compte
                                                </button>
                                            
                                                <div class="collapse mt-2" id="collapseSuppression">
                                                    <div class="card card-body">
                                                        <p>En cliquant sur le bouton ci-dessous vous confirmez accepter la suppression de votre compte ainsi que de toutes vos données personnelles enregistrées dans nos bases de données, une fois la suppression de votre compte effectuée, vous n'aurez plus accès à votre espace personnel. Pour confirmer, cliquez sur le bouton ci-dessous.</p>
                                                        <form method="post" action="compte.php">
                                                            <button class="btn btn-outline-danger btn-lg btn-block" type="submit" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" name="delete">Confirmer la suppression</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-sm-12">
                                            <button  type="button" name="modifier" class="btn btn-outline-info" id="updateInfo-list" data-toggle="list" href="#list-updateInfo" role="tab" aria-controls="updatemyInfos">Modifier mes informations Personnelles</button>
                                        </div>
                                        <!--modifier mon mdp-->
                                        <div class="col-lg-4 col-sm-12 ">
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
                                                            <button type="submit" class="btn btn-outline-info mb-2 mt-2" name="updatePassword">Confirmer la modification</button>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!--PARTIE MODIFIER DU PREMIER SLIDE infos personnelles-->
                        <div class="tab-pane fade mb-5 " id="list-updateInfo" role="tabpanel" aria-labelledby="list-updateInfo-list">
                            <div class="row">
                                <div class="col-8 offset-2 text-center border rounded border-black mt-5">
                                    <h3>Mes Informations Personnelles</h3>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-8 offset-2 border rounded border-black ">
                                    <form method="POST" action="compte.php">
                                        <?php echo $serviceUtilisateur->utilisateurServiceUpdatePanel($_SESSION["user_id"]); ?>                                        
                                    </form>  
                                </div>
                            </div>
                        </div>

                        <!--SECOND PANEL MES COMPAGNONS-->
                        <div class="tab-pane fade mb-5" id="list-compagnons" role="tabpanel" aria-labelledby="list-compagnons-list">
                            <!--titre-->
                            <div class="row">
                                <div class="col-8 offset-2 border rounded border-black mt-5 mb-3 text-center">
                                        <h3>Mes Compagnons</h3>                                        
                                </div>
                            </div>
                            <!--Affichage de la row ajouter un compagnon si pas d'animaux / sinon affichage des animaux dans les cartes -->
                            <?php 
                            $dataAnimaux = $serviceAnimaux->serviceSelectAllUserAnimals($_SESSION["user_id"]);
                            affichageAnimaux($dataAnimaux);
                            displayModals($dataAnimaux);
                            ?>
                       </div>

                        <!--PARTIE POUR MODIFIER un compagnon V2 /)-->
                                               <?php
                            displayUpdatePanel($dataAnimaux);
                        ?>
                    


                        

                        <!--PARTIE POUR ADD un compagnon /)-->
                        <div class="tab-pane fade mb-5" id="list-addAnimal" role="tabpanel" aria-labelledby="list-addAnimal-list">
                            <div class="row">
                                <div class="col-12 ">
                                    <form method="POST" action="compte.php">
                                        <div class="row mt-3">
                                            <!--titre-->
                                            <div class="col-lg-12 text-center">
                                                <h3>Ajoutez votre compagnon</h3>                                                
                                            </div>
                                        </div>
                                         
                                        <div class="row mt-3 ">
                                            <div class="col-12 ">
                                                <div class="row mt-3">
                                                    <div class="col-12  text-center">
                                                        <div class="row">
                                                            <div class="col-12 text-center">
                                                                <h3>Nom :</h3>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-4 col-sm-12 offset-4">
                                                                <input type="text" class="form-control" name="nomAnimal">
                                                            </div>
                                                            <div class="col-lg-2 col-sm-12 offset-5">
                                                                <label for="inputDateNaissance" class="mt-2">Date de naissance : </label>
                                                                <input type="date" class="form-control" name="dateNaissance">
                                                            </div >
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-5 ">
                                                    <div class="col-4 offset-4"><input type="file"  id="photo1" name="photo1" accept="image/png, image/jpeg"></div>
                                                </div>

                                                <div class="row mt-3 ">
                                                    <div class="col-lg-6 col-sm-12">
                                                        <label for="inputEspece" class="mt-2">Espece : </label>
                                                        <select class="form-control" id="nom_espece" name="especeAnimale">
                                                            <option>Selectionnez une race</option>
                                                            <option>Chat</option>
                                                            <option>Chien</option>
                                                        </select>
                                                        <label for="inputRace" class="mt-2">Race :</label>
                                                            <select class="form-control" id="popSelect" name="raceAnimale">
                                                            </select>
                                                        <label for="inputSexe" class="mt-2">Sexe : </label>
                                                            <select class="form-control" id="selectSexe" name="sexeAnimal">
                                                                <option>Mâle</option>
                                                                <option>Femelle</option>
                                                            </select>

                                                        <label for="inputNumeroPuce" class="mt-2" >Numéro d'identification : </label>
                                                            <input type="text" class="form-control" name="numeroPuce" placeholder="Numéro de Puce Electronique">
                                                        <label for="textAreaSpécificités" class="mt-2">Caractère :</label>
                                                            <textarea class="form-control " id="textAreaSpécificités" name="caractere" rows="3"></textarea>                          
                                                    </div>
                                                    <div class="col-lg-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="inputPoils" class="mt-2">Poils :</label>
                                                                <select class="form-control " class="selectPoils" name="robe">
                                                                    <option>Courts</option>
                                                                    <option>Mi-longs</option>
                                                                    <option>Long</option>
                                                                </select>
                                                            <label for="inputCouleur" class="mt-2">Couleur :</label>
                                                                <select class="form-control" class="selectCouleur" name="couleur">
                                                                    <option value="1">Blanc</option>
                                                                    <option value="3">Gris</option>
                                                                    <option value="2">Noir</option>
                                                                    <option value="4">Roux</option>
                                                                    <option value="5">Chatain</option>
                                                                </select>
                                                            <label for="inputTaille" class="mt-2" >Taille <small> (en centimètres)</small> :</label>
                                                                <input class="form-control " type="number" placeholder="100" name="taille">
                                                            <label for="inputPoids" class="mt-2" >Poids <small> (en Kg)</small> :</label>
                                                                <input class="form-control " type="float" placeholder="1.3" name="poids">
                                                            <label for="specTextArea" class="mt-2">Spécificités :</label>
                                                            <textarea class="form-control " id="inputTextAreaSpecificite" name="specificites" rows="3"></textarea>
                                                            <input type="hidden" name="idUtilisateur" value="<?php echo $_SESSION["user_id"];?>"></input>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-3 ">
                                                    <div class="col-lg-3 col-sm-12 offset-3">
                                                        <button type="button submit" name="addAnimal" class="btn btn-block btn-outline-info">Ajouter</button>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-12">
                                                        <button type="button " name="annuler" data-toggle="list" href="#list-compagnons" class="btn btn-block btn-outline-info">Annuler</button>
                                                    </div>                                            
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        
                        
                       

                        <!--PANEL 3 ANIMAUX FAVORIS-->




                        <div class="tab-pane fade mb-5" id="list-favourites" role="tabpanel" aria-labelledby="list-favourites-list">
                            <div class="row">

                            <!--titre-->
                                <div class="col-8 offset-2 text-center border rounded border-black mt-5 mb-3">
                                    <h3>Mes Animaux Favoris</h3>
                                </div>
                            </div>

                            <!--si pas d'animaux en favoris affichage de la div ajouter un animal en favoris sinon affichage des animaux en favoris-->
                            <?php
                            $dataAnimauxFavoris = $serviceAnimauxFavoris->serviceSelectAllUserFavouriteAnimals($_SESSION["user_id"]);
                            empty($dataAnimauxFavoris) ?  $serviceAnimauxFavoris->serviceDisplayNoFavoritesAnimals() : $serviceAnimauxFavoris->serviceDisplayUserFavouriteAnimals($_SESSION["user_id"]);
                            ?>
                        </div>        
                        
                        
                        <!--Mes dons-->
                        <div class="tab-pane fade mb-5" id="list-donations" role="tabpanel" aria-labelledby="list-donations-list">
                            <div class="row">

                            <!--titre-->
                                <div class="col-8 offset-2 text-center border rounded border-black mt-5 mb-3">
                                    <h3>Mes Dons</h3>
                                </div>
                            </div>
                            <?php displayDonations() ?>
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
</html>









