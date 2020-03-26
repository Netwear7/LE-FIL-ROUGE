<!--regex for le nom and prénom

/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u
-->


<?php


session_start();


include_once '../model/Utilisateur.php';
include_once '../service/UtilisateurService.php';
include_once '../data-access/UtilisateurDataAccess.php';
include_once '../model/Animaux.php';
include_once '../service/AnimauxService.php';
include_once '../data-access/AnimauxDataAccess.php';
include_once '../model/Adresse.php';
include_once '../service/AdresseService.php';
include_once '../data-access/AdresseDataAccess.php';
include_once '../model/AnimauxFavoris.php';
include_once '../service/AnimauxFavorisService.php';
include_once '../data-access/AnimauxFavorisDataAccess.php';
include_once '../service/PerteService.php';
include_once '../data-access/PerteDataAccess.php';
include_once '../model/AvoirCouleur.php';
include_once '../service/AvoirCouleurService.php';
include_once '../data-access/AvoirCouleurDataAccess.php';


if(isset($_SESSION["user_id"]))
{

    $daoUtilisateur = new UtilisateurDataAccess();
    $serviceUtilisateur = new UtilisateurService($daoUtilisateur);
} else {
    header('Location: accueil.php');
    exit;
}



if (isset($_POST["delete"])){

    $daoUtilisateur = new UtilisateurDataAccess();
    $serviceUtilisateur = new UtilisateurService($daoUtilisateur);
    $serviceUtilisateur->serviceDelete($nom);
    header('Location: accueil.php');
    exit;

}

if (isset($_POST["updatePassword"])){
    $daoUtilisateur = new UtilisateurDataAccess();
    $serviceUtilisateur = new UtilisateurService($daoUtilisateur);
    $serviceUtilisateur->serviceUpdatePassword($_SESSION["user_id"],$_POST);

}

if (isset($_POST["confirmRetrait"])) {
    $daoAnimaux = new AnimauxDataAccess();
    $serviceAnimaux = new AnimauxService($daoAnimaux);
    $serviceAnimaux->serviceDelete($_POST["ID_ANIMAL"]);
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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="../../css/header-and-color-test.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    </head>
    <body>

        <?php
            include_once("header.php");
        ?>

        <!--PARTIE PRINCIPALE-->


        <div class="container-fluid ">
            <div class="row   ">



                <!--NAVBAR COTE GAUCHE-->
                <div class="col-lg-2 col-sm-12 border border-black ">
                    <div class="row">
                        <h3>Mon Compte</h3>
                    </div>
                    <div class="row">
                        <div class="nav  nav-pills  w-100 " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Mes Informations Personnelles</a>
                            <a class="list-group-item list-group-item-action" id="list-myanimals-list" data-toggle="list" href="#list-compagnons" role="tab" aria-controls="myanimals">Mes Compagnons</a>
                            <a class="list-group-item list-group-item-action" id="list-myfavourites-list" data-toggle="list" href="#list-favourites" role="tab" aria-controls="myfavourites">Mes Animaux Coup de coeur</a>
                            <a class="list-group-item list-group-item-action mt-auto" data-toggle="modal" data-target="#modalLogout">Se Déconnecter</a>
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
                                            
                                            <div class="row d-flex justify-content-end">
                                                <button  type="button" name="modifier" class="btn btn-outline-info" id="updateInfo-list" data-toggle="list" href="#list-updateInfo" role="tab" aria-controls="updatemyInfos">Modifier</button>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                        <?php $serviceUtilisateur->utilisateurServiceDisplayinfos($_SESSION["user_id"]); 
                                        if (isset($_POST["updateUserInfos"])){
                                            
                                            $serviceUtilisateur->serviceUpdate($_POST);
                                         }
                                        ?>
                            </div>


                            <!--PARTIE OU IL Y A LES BOUTONS SUPP ET MOD MDP-->
                            <div class="row">
                                <div class="col-8 offset-2 rounded border-black mt-2">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12 ">
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
                                        <!--modifier mon mdp-->
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
                        <div class="tab-pane fade " id="list-updateInfo" role="tabpanel" aria-labelledby="list-updateInfo-list">
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
                        <div class="tab-pane fade" id="list-compagnons" role="tabpanel" aria-labelledby="list-compagnons-list">

                        <!--titre-->
                            <div class="row">
                                <div class="col-8 offset-2 border rounded border-black mt-5 text-center">
                                        <h3>Mes Compagnons</h3>                                        
                                </div>
                            </div>


                            <!--Affichage de la row ajouter un compagnon si pas d'animaux / sinon affichage des animaux dans les cartes -->
                            <?php
                            if (isset($_POST["ajoutAnimal"])){
                                $daoAnimaux = new AnimauxDataAccess();
                                $serviceAnimaux = new AnimauxService($daoAnimaux);
                                $animal = new Animaux($_POST);
                                $serviceAnimaux->serviceAddUserAnimal($animal);
                                $avoirCouleurDao = new AvoirCouleurDataAccess();
                                $avoirCouleurService = new AvoirCouleurService($avoirCouleurDao);
                                $avoirCouleur = new AvoirCouleur($animal);
                                $avoirCouleurService->serviceAdd($avoirCouleur);
                                $dataAnimaux = $serviceAnimaux->serviceSelectAllUserAnimals($_SESSION["user_id"]);
                                empty($dataAnimaux) ?  $serviceAnimaux->serviceDisplayNoAnimals() : $serviceAnimaux->serviceDisplayUserAnimals($dataAnimaux);
                            } else {
                                
                                $daoAnimaux = new AnimauxDataAccess();
                                $serviceAnimaux = new AnimauxService($daoAnimaux);
                                $dataAnimaux = $serviceAnimaux->serviceSelectAllUserAnimals($_SESSION["user_id"]);
                                empty($dataAnimaux) ?  $serviceAnimaux->serviceDisplayNoAnimals() : $serviceAnimaux->serviceDisplayUserAnimals($dataAnimaux);
                                
                            } 
                            
                            

                            ?>


                       </div>


                        

                        <!--PARTIE POUR ADD un compagnon /)-->
                        <div class="tab-pane fade" id="list-addAnimal" role="tabpanel" aria-labelledby="list-addAnimal-list">
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
                                                <h3>Nom :</h3>
                                                <div class="row">
                                                    <div class="col-4 offset-4">
                                                        <input type="text" class="form-control" name="nomAnimal">
                                                    </div>
                                                    <div class="col-2 offset-5">
                                                    <label for="inputDateNaissance" class="mt-2">Date de naissance : </label>
                                                <input type="date" class="form-control" name="dateNaissance">
                                                    </div >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-5 ">
                                            <div class="col-3"><input type="file"  id="photo1" name="photo1" accept="image/png, image/jpeg"></div>
                                            <div class="col-3"><input type="file" id="photo2" name="photo1" accept="image/png, image/jpeg"></div>
                                            <div class="col-3"><input type="file" id="photo3" name="photo1" accept="image/png, image/jpeg"></div>
                                            <div class="col-3"><input type="file" id="photo4" name="photo1" accept="image/png, image/jpeg"></div>
                                        </div>

                                        <div class="row mt-3 ">
                                            <div class="col-6">
                                                <label for="inputEspece" class="mt-2">Espece : </label>
                                                    <select class="form-control" id="selectEspece" name="especeAnimale">
                                                        <option>Chat</option>
                                                        <option>Chien</option>
                                                    </select>
                                                <label for="inputRace" class="mt-2">Race :</label>
                                                    <select class="form-control" id="selectRace" name="raceAnimale">
                                                        <option>Main coon</option>
                                                        <option>Angora</option>
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
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="inputRobe" class="mt-2">Robe :</label>
                                                    <select class="form-control " id="selectRobe" name="robe">
                                                        <option>Brown Tabby</option>
                                                        <option>Gris</option>
                                                        <option>Noir</option>
                                                        <option>Blanc</option>
                                                        <option>Marron</option>
                                                    </select>
                                                    <label for="inputCouleur" class="mt-2">Couleur :</label>
                                                    <select class="form-control" id="selectCouleur" name="couleur">
                                                        <option>Roux</option>
                                                        <option>Gris</option>
                                                        <option>Noir</option>
                                                        <option>Blanc</option>
                                                        <option>Marron</option>
                                                    </select>
                                                    <label for="inputTaille" class="mt-2" >Taille <small> (en centimètres)</small> :</label>
                                                    <input class="form-control " type="number" placeholder="100" name="taille">
                                                    <label for="inputPoids" class="mt-2" >Poids <small> (en Kg)</small> :</label>
                                                    <input class="form-control " type="float" placeholder="1.3" name="poids">
                                                    <label for="textAreaSpécificités" class="mt-2">Spécificités :</label>
                                                    <textarea class="form-control " id="textAreaSpécificités" name="specificites" rows="3"></textarea>
                                                    <input type="hidden" name="idUtilisateur" value="<?php echo $_SESSION["user_id"];?>"></input>
                                                </div>
                                            </div>
                                        </div>

                                        

                                        <div class="row mt-3 ">
                                            <div class="col-3 offset-3">
                                                <button type="button submit" name="ajoutAnimal" class="btn btn-block btn-outline-info">Ajouter</button>
                                            </div>
                                            <div class="col-3">
                                                <button type="button submit" name="valider" class="btn btn-block btn-outline-info">Annuler</button>
                                            </div>                                            
                                        </div>
                                            </div>
                                        </div>



                                    </form>
                                </div>
                            </div>
                        </div>

                        <!--PARTIE POUR MODIFIER un compagnon V2 /)-->
                        <?php
                            $serviceAnimaux->serviceUpdatePanelAnimals($dataAnimaux);
                        ?>
                        
                       

                        <!--PANEL 3 ANIMAUX FAVORIS-->




                        <div class="tab-pane fade" id="list-favourites" role="tabpanel" aria-labelledby="list-favourites-list">
                            <div class="row">

                            <!--titre-->
                                <div class="col-8 offset-2 text-center border rounded border-black mt-5">
                                    <h3>Mes Animaux Favoris</h3>
                                </div>
                            </div>

                            <!--si pas d'animaux en favoris affichage de la div ajouter un animal en favoris sinon affichage des animaux en favoris-->
                            <?php
                            $daoAnimauxFavoris = new AnimauxFavorisDataAccess();
                            $serviceAnimauxFavoris = new AnimauxFavorisService($daoAnimauxFavoris);
                            $data = $serviceAnimauxFavoris->serviceSelectAllUserFavouriteAnimals($_SESSION["user_id"]);
                            empty($data) ?  $serviceAnimauxFavoris->serviceDisplayNoFavoritesAnimals() : $serviceAnimauxFavoris->serviceDisplayUserFavouriteAnimals($_SESSION["user_id"]);
                            ?>
                        </div>                        
                    </div>
                </div>                
            </div>
        </div>
        <?php
            include_once 'footer.php';
        ?>
    </body>
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="script.js"></script>
</html>
















