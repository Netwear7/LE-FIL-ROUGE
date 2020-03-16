<!--regex for le nom and prénom

/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u
-->


<?php

include_once '../service/UtilisateurService.php';
include_once '../data-access/UtilisateurDataAccess.php';
include_once '../service/AnimauxService.php';
include_once '../data-access/AnimauxDataAccess.php';
include_once '../model/Utilisateur.php';
include_once '../model/Adresse.php';
include_once '../service/AdresseService.php';
include_once '../data-access/AdresseDataAccess.php';

$nom = "STOEV";
$id = '1';


$daoUtilisateur = new UtilisateurDataAccess();
$serviceUtilisateur = new UtilisateurService($daoUtilisateur);

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
    $serviceUtilisateur->serviceUpdatePassword($_POST);

}

if (isset($_POST["inscription"])){
    if (empty($_POST["NOM"]) || empty($_POST["PRENOM"]) || empty($_POST["PSEUDO"]) || empty($_POST["inscriptionPassword"]) || empty($_POST["confirmInscriptionPassword"]) || empty($_POST["ADRESSE_EMAIL"]) || empty($_POST["confirmADRESSE_EMAIL"]) ||  empty($_POST["NUMERO"]) || empty($_POST["RUE"]) || empty($_POST["VILLE"]) || empty($_POST["CODE_POSTAL"])) {
        echo "Tout les champs sont obligatoires !";
    } else {
        if ($_POST["inscriptionPassword"] <> $_POST["confirmInscriptionPassword"]) {
            $error = "Les mots de passes ne sont pas identiques !";
        } else {
            if ($_POST["ADRESSE_EMAIL"] <> $_POST["confirmADRESSE_EMAIL"]) {
                $error =" Les adresses mail ne sont pas identiques ! ";
            } else {
                // dans un premier temps ajout de l'adresse car besoin de l'id adresse pour créer l'utilisateur ou le refuge
                $adresse = new Adresse($_POST);
                $daoAdresse = new AdresseDataAccess();
                $serviceAdresse = new AdresseService($daoAdresse);
                $idAdresse = $serviceAdresse->serviceAdd($adresse);
                $adresse->setIdAdresse($idAdresse[0]["ID_ADRESSE"]);
    
                // dans un second temps création de l'utilisateur 
                $utilisateur = new Utilisateur($_POST);
                // ajout de l'adresse dans l'utilisateur
                $utilisateur->setIdAdresse($adresse->getIdAdresse());
                $daoUtilisateur = new UtilisateurDataAccess();
                $serviceUtilisateur = new UtilisateurService($daoUtilisateur);
                $serviceUtilisateur->serviceAdd($utilisateur);
            }
        }
    }

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
                            <a class="list-group-item list-group-item-action mt-auto" data-toggle="modal" data-target="#modalInscription">S'inscrire</a>
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
                                            <a type="button" class="btn btn-outline-danger" href="accueil.php">Déconnexion</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Modal s'inscrire -->

                            <div class="modal fade bd-example-modal-lg" tabindex="-1" id="modalInscription" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                    <div class="modal-content">
                                    <form method="POST" action="compte.php">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalRetraitCenterTitle">Inscrivez-vous</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-6 col-sm-12">
                                                        <ul class="list-group list-group-flush">
                                                        <li class="list-group-item">
                                                            <label for="userPseudo">Pseudo :</label>
                                                            <input type="text" maxlength="50" class="form-control" name="PSEUDO"  aria-describedby="UserName">
                                                        </li>
                                                        <li class="list-group-item">
                                                            <label for="userName">Nom :</label>
                                                            <input type="text" maxlength="50" class="form-control" name="NOM"  aria-describedby="UserName">
                                                        </li>
                                                        <li class="list-group-item">
                                                            <label for="userNickName">Prénom :</label>
                                                            <input type="text" maxlength="50" class="form-control" name="PRENOM"   aria-describedby="UserNickName">
                                                        </li>
                                                        <li class="list-group-item">
                                                            <label for="userPhone">Tel :</label>
                                                            <input type="text" maxlength="50" class="form-control" name="NUM"   aria-describedby="UserPhone">
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-6 col-sm-12">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item">
                                                            <label for="userAdress">Numero :</label>
                                                            <input type="text" maxlength="50" class="form-control" name="NUMERO"  aria-describedby="UserAdressNumber">
                                                        </li>
                                                        <li class="list-group-item">
                                                            <label for="userAdress">Rue :</label>
                                                            <input type="text" maxlength="50" class="form-control" name="RUE"  aria-describedby="UserRue">
                                                        </li>
                                                        <li class="list-group-item">
                                                            <label for="userTown">Ville : </label>
                                                            <input type="text" maxlength="50" class="form-control" name="VILLE"  aria-describedby="UserName">
                                                        </li>
                                                        <li class="list-group-item">
                                                            <label for="userCP">Code Postal : </label>
                                                            <input type="text" maxlength="50" class="form-control" name="CODE_POSTAL"  aria-describedby="UserName">
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-6 col-sm-12">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item">
                                                            <label for="Mot de passe : ">Mot de Passe :</label>
                                                            <input type="password" class="form-control mt-2" id="inputPassword3" placeholder="Mot de Passe" name="inscriptionPassword">
                                                        </li>
                                                        <li class="list-group-item">
                                                            <label for="Confirmation Mot de Passe" >Confirmation Mot de Passe : </label>
                                                            <input type="password" class="form-control mt-2" id="inputPassword3" placeholder="Mot de Passe" name="confirmInscriptionPassword">
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-6 col-sm-12">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item">
                                                            <label for="userMail">Adresse mail : </label>
                                                            <input type="email" class="form-control"  aria-describedby="emailHelp" name="ADRESSE_EMAIL">
                                                            <small id="emailHelp" class="form-text text-muted">Nous ne partagerons pas votre adresse mail</small>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <label for="userMail">Confirmation Adresse mail : </label>
                                                            <input type="email" class="form-control"  aria-describedby="emailHelp" name="confirmADRESSE_EMAIL">
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                                            <!--PARTIE OU IL Y A LES BOUTONS VALIDER ET ANNULER -->
                                            <div class="row">
                                                <div class="col-6">
                                                    <button type="button submit" class="btn btn-outline-primary" name="inscription">S'inscrire</button>
                                                </div>
                                                <div class="col-6">
                                                    <button type="button submit" class="btn btn-outline-secondary">Annuler</button>
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
                                <div class="col-8 offset-2 border rounded border-black mt-2">
                                        <?php $serviceUtilisateur->utilisateurServiceDisplayinfos(); 
                                        if (isset($_POST["updateUserInfos"])){
                                            
                                            $serviceUtilisateur->serviceUpdate($_POST);
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
                                        <?php echo $serviceUtilisateur->utilisateurServiceUpdatePanel(); ?>

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
                            <!--Affichage de la row ajouter un compagnon si pas d'animaux / sinon affichage des animaux dans les cartes -->
                            <?php
                            $daoAnimaux = new AnimauxDataAccess();
                            $serviceAnimaux = new AnimauxService($daoAnimaux);
                            $data = $serviceAnimaux->serviceSelectAllUserAnimals($id);
                            empty($data) ?  $serviceAnimaux->serviceDisplayNoAnimals() : $serviceAnimaux->serviceDisplayUserAnimals($id);
                            ?>
                       </div>


                        

                        <!--PARTIE POUR ADD un compagnon /)-->
                        <div class="tab-pane fade" id="list-addAnimal" role="tabpanel" aria-labelledby="list-addAnimal-list">
                            <div class="row vh-100">
                                <div class="col-12 border rounded border-black">
                                    <form method="POST" action="compte.php">
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
                    </div>
                </div>                
            </div>
        </div>
        <?php
            include_once 'footer.php';
        ?>
    </body>
</html>
















