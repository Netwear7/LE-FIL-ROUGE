<!--Include with php in futur-->
<nav class="navbar navbar-expand-lg navbar-dark bg-orange">
            
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
                    <div class="dropdown-menu bg-orange border-0" aria-labelledby="navbarDropdown">
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
                <div class="dropdown-menu bg-orange border-0" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item text-white" href="#">Action</a>
                    <a class="dropdown-item text-white" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-white" href="#">Envoyer la fiche animal</a>
                </div>
            </li>
        </ul>
<!-- BOUTON MES ANIMAUX ET COMPTES-->
        
        <a class="d-flex mr-3 mt-1" href="compte.php">
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
                                        <input type="email" class="form-control  w-75" placeholder="Adresse email" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                </div>   
                            </div>

                            <div class="row">
                                <div class="col-lg-10 offset-lg-1">
                                    <div class="input-group mb-3 ">
                                        <input type="password" class="form-control w-75" placeholder="Mot de passe" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                </div>   
                            </div>
                            <div class="row">
                                <div class="col-lg-10 offset-lg-1 text-center mb-3">
                                    <a href="#">Mot de passe oublié ?</a>
                                </div>   
                            </div>

                            <div class="input-group mt-2 mb-5 d-flex justify-content-center">
                                <button type="button" class="btn btn-primary w-75 rounded-valid text-center">Valider</button>
                            </div>

                            <div class="row">
                                <div class="col-lg-10 offset-lg-1 text-center mb-3">
                                    Vous êtes nouveau ?
                                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target=".bd-example-modal-lg">Inscrivez-vous !</button>
                                </div>   
                            </div>

                            <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>-->
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <form action="accueil.php" method="POST">
            <div class="modal fade bd-example-modal-lg" tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="row text-center">
                            <h2 class="col-12 modal-title" id="staticBackdropLabel">Formulaire d'inscription</h2>
                        </div>
                        <form action="">
                            <div class="row mt-5">
                                
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-10 offset-lg-1">
                                            <div class="input-group mb-3 ">
                                                <input type="text" class="form-control w-75" name="name" placeholder="Nom" aria-label="name input" aria-describedby="basic-addon1">
                                            </div>
                                        </div>   
                                    </div>  
                                    <div class="row">
                                        <div class="col-lg-10 offset-lg-1">
                                            <div class="input-group mb-3 ">
                                                <input type="text" class="form-control w-75" name="ville" placeholder="Ville" aria-label="ville input" aria-describedby="basic-addon1">
                                            </div>
                                        </div>   
                                    </div> 
                                    <div class="row">
                                        <div class="col-lg-10 offset-lg-1">
                                            <div class="input-group mb-3 ">
                                                <input type="email" class="form-control w-75" name="mail" placeholder="Email" aria-label="input email" aria-describedby="basic-addon1">
                                            </div>
                                        </div>   
                                    </div> 
                                    <div class="row">
                                        <div class="col-lg-10 offset-lg-1">
                                            <div class="input-group mb-3 ">
                                                <input type="password" class="form-control w-75" name="password" placeholder="Mot de passe" aria-label="password" aria-describedby="basic-addon1">
                                            </div>
                                        </div>   
                                    </div> 

                                    <div class="input-group mt-5 mb-5 d-flex justify-content-center">
                                        <button type="button" class="btn btn-secondary w-75 rounded-valid text-center" data-dismiss="modal">Annuler</button>
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-10 offset-lg-1">
                                            <div class="input-group mb-3 ">
                                                <input type="text" class="form-control w-75" name="fname" placeholder="Prénom" aria-label="Username" aria-describedby="basic-addon1">
                                            </div>
                                        </div>   
                                    </div> 
                                    <div class="row">
                                        <div class="col-lg-10 offset-lg-1">
                                            <div class="input-group mb-3 ">
                                                <input type="text" class="form-control w-75" name="copostal" placeholder="Code postal" aria-label="Code postal" aria-describedby="basic-addon1">
                                            </div>
                                        </div>   
                                    </div> 
                                    <div class="row">
                                        <div class="col-lg-10 offset-lg-1">
                                            <div class="input-group mb-3 ">
                                                <input type="Email" class="form-control w-75" name="confirmail" placeholder="Confirmation adresse email" aria-label="confirmation email" aria-describedby="basic-addon1">
                                            </div>
                                        </div>   
                                    </div> 
                                    <div class="row">
                                        <div class="col-lg-10 offset-lg-1">
                                            <div class="input-group mb-3 ">
                                                <input type="password" class="form-control w-75" placeholder="Confirmation mot de passe" aria-label="confirmation password" aria-describedby="basic-addon1">
                                            </div>
                                        </div>   
                                    </div> 

                                    <div class="input-group mt-5 mb-5 d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary w-75 rounded-valid text-center">S'inscrire</button>
                                    </div>
                                </div>
                            
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-lg-10 offset-lg-1 text-center">
                                <p class="d-inline-block">En vous inscrivant, vous acceptez les Conditions d'utilisation </p>
                                <a href="#" class="">disponible ici</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
       
        <!-- Large modal -->



    </div>
</nav>