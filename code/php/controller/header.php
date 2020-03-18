<?php

include_once '../model/Adresse.php';
include_once '../model/Utilisateur.php';
include_once '../service/AdresseService.php';
include_once '../service/UtilisateurService.php';
include_once '../data-access/AdresseDataAccess.php';
include_once '../data-access/UtilisateurDataAccess.php';

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
                session_start();
                $_SESSION["user_id"]=$utilisateur->getIdUtilisateur();
                header('Location: accueil.php');
                exit;
            }
        }
    }

}

if (isset($_POST["connexion"])){
    if (!empty($_POST["ADRESSE_EMAIL"]) && !empty($_POST["connexionPassword"])) {
        $daoUtilisateur = new UtilisateurDataAccess();
        $serviceUtilisateur = new UtilisateurService($daoUtilisateur);
        $data = $serviceUtilisateur->serviceSearch($_POST);
        if (password_verify($_POST["connexionPassword"], $data[0]["MDP"]) === true) {
            session_start();
            header('Location: accueil.php');
            exit;
        } else {
            return $error="Identifiants incorrects";
        }
    }         
}



if (isset($_POST["logout"])){
    session_destroy();
    header('location: accueil.php');
    exit;
}


?>




<!--Include with php in futur-->
<nav class="navbar navbar-expand-lg navbar-dark bg-grey">
            
    <a class="navbar-brand ml-5" href="#"><img src="http://localhost/LE-FIL-ROUGE/code/img/logo.jpg"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
<!-- ACCUEIL-->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="accueil.php">Accueil</a>
            </li>

<!-- DROPDOWN ADOPTER UN ANIMAL-->

            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Adopter un animal</a>
                    <div class="dropdown-menu bg-grey border-0" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-white" href="adopter-un-animal.php">Les animaux</a>
                        <a class="dropdown-item text-white" href="#">Accompagnement pour l'adoption</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-white" href="#">Conditions d'adoption</a>
                    </div>
            </li>

<!-- DROPDOWN ANIMAUX PERDU-->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Animaux perdus</a>
                <div class="dropdown-menu bg-grey border-0" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item text-white" href="#">Action</a>
                    <a class="dropdown-item text-white" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-white" href="#">Envoyer la fiche animal</a>
                </div>
            </li>
            <li>
            <a class="nav-link" href="form-contact.php" role="button" data-toggle="dropdown1" aria-haspopup="true" aria-expanded="false">
                Contactez-nous</a>
            </li>
        </ul>
<!-- BOUTON MES ANIMAUX ET COMPTES-->
        
        <a class="d-flex mr-3 mt-1" href="compte.php#list-compagnons">
            <img class="mr-1" src="img/mesAnimaux.png" alt="">
            <p class="navbar-nav text-light">Mes animaux</p>
        </a>
        <!--<a class="d-flex mr-3" href="#" data-toggle="modal" data-target="#exampleModal">
            <img class="mr-1" src="img/account.png" alt="">
            <p class="navbar-nav text-light">Mon compte</p>
        </a>-->

        <form action="accueil.php" method="POST">
            <button type="button" class="btn btn-orange" data-toggle="modal" data-target="#staticBackdrop">
                <p class="navbar-nav text-light">Se connecter/S'inscrire</p>
            </button>
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="col-11 modal-title" id="staticBackdropLabel">Connexion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <div class="row mt-5">
                                <div class="col-lg-10 offset-lg-1">
                                    <div class="input-group mb-3">
                                        <input type="email" class="form-control  w-75" placeholder="Adresse email" name="ADRESSE_EMAIL" aria-label="connexionEmail" aria-describedby="basic-addon1">
                                    </div>
                                </div>   
                            </div>

                            <div class="row">
                                <div class="col-lg-10 offset-lg-1">
                                    <div class="input-group mb-3 ">
                                        <input type="password" class="form-control w-75" placeholder="Mot de passe" name="connexionPassword" aria-label="connexionPassword" aria-describedby="basic-addon1">
                                    </div>
                                </div>   
                            </div>
                            <div class="row">
                                <div class="col-lg-10 offset-lg-1 text-center mb-3">
                                    <a href="#">Mot de passe oublié ?</a>
                                </div>   
                            </div>

                            <div class="input-group mt-2 mb-5 d-flex justify-content-center">
                                <button type="button submit" class="btn btn-primary w-75 rounded-valid text-center" name="connexion">Se Connecter</button>
                            </div>

                            <div class="row">
                                <div class="col-lg-10 offset-lg-1 text-center mb-3">
                                    Vous êtes nouveau ?
                                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-dismiss="modal" data-target="#modalInscription">Inscrivez-vous !</button>
                                </div>   
                            </div>

                            <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>-->
                        </div>
                    </div>
                </div>
            </div>
        </form>
                                    <!--Modal s'inscrire -->

        <div class="modal fade bd-example-modal-lg" tabindex="-1" id="modalInscription" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <form method="POST" action="">
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
                                            <input type="password" class="form-control mt-2"  placeholder="Mot de Passe" name="inscriptionPassword">
                                        </li>
                                        <li class="list-group-item">
                                            <label for="Confirmation Mot de Passe" >Confirmation Mot de Passe : </label>
                                            <input type="password" class="form-control mt-2" placeholder="Mot de Passe" name="confirmInscriptionPassword">
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
</nav>