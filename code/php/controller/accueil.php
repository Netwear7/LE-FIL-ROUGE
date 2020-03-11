<!doctype html>
<html lang="fr">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS et CSS-->    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="header-and-color-test.css">
        
        <!-- Titre onglet -->
        <title>Page d'accueil</title>

        <!-- script Javascript-->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <!-- Include en javascript-->
        
    </head>
    <body>


        <!--Include with php in futur-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-orange">
            
            <a class="navbar-brand ml-5" href="#"><img src="img/logo.jpg"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
<!-- ACCUEIL-->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Accueil</a>
                    </li>

<!-- DROPDOWN ADOPTER UN ANIMAL-->

                    <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Adopter un animal</a>
                            <div class="dropdown-menu bg-orange border-0" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-white" href="#">Les animaux</a>
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
                
                <a class="d-flex mr-3 mt-1" href="#">
                    <img class="mr-1" src="img/mesAnimaux.png" alt="">
                    <p class="navbar-nav text-light">Mes animaux</p>
                </a>
                <!--<a class="d-flex mr-3" href="#" data-toggle="modal" data-target="#exampleModal">
                    <img class="mr-1" src="img/account.png" alt="">
                    <p class="navbar-nav text-light">Mon compte</p>
                </a>-->

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

                <!-- Large modal -->
                

                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                </div>
                                <div class="col-lg-6">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </nav>




        <!--#################  CODE PRINCIPALE  #################-->
        <div class="container-fluid">
<!------------------------------------------------------------------------------>
            <div class="row">
                <!---------------test carrousel---------------->
                <div id="carouselExampleControls" class="carousel slide col-lg-12 bg-dark py-3" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active text-center">
                            <img class="d-inline-block w-20 mx-3" src="img/Chat/chat1.jpg" alt="Second slide">
                            <img class="d-inline-block w-20 mx-3" src="img/Chat/chat1.jpg" alt="Second slide">
                            <img class="d-inline-block w-20 mx-3" src="img/Chat/chat1.jpg" alt="Second slide">
                            <img class="d-inline-block w-20 mx-3" src="img/Chat/chat1.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item text-center">
                            <img class="d-inline-block w-20 mx-3" src="img/Chat/chat1.jpg" alt="Second slide">
                            <img class="d-inline-block w-20 mx-3" src="img/Chat/chat1.jpg" alt="Second slide">
                            <img class="d-inline-block w-20 mx-3" src="img/Chat/chat1.jpg" alt="Second slide">
                            <img class="d-inline-block w-20 mx-3" src="img/Chat/chat1.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item text-center">
                            <img class="d-inline-block w-20 mx-3" src="img/Chat/chat1.jpg" alt="Second slide">
                            <img class="d-inline-block w-20 mx-3" src="img/Chat/chat1.jpg" alt="Second slide">
                            <img class="d-inline-block w-20 mx-3" src="img/Chat/chat1.jpg" alt="Second slide">
                            <img class="d-inline-block w-20 mx-3" src="img/Chat/chat1.jpg" alt="Second slide">
                        </div>
                    </div>




                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    </div>
                <!---------------test carrousel---------------->
            </div>
<!------------------------------------------------------------------------------>
<!---------------Présentation site--------------->
            <div class="row mt-5 mb-5">
                <div class="col-lg-5 offset-lg-1 ">
                    <div class="row mt-5">
                        <div class="col-lg-10 bg-2 d-flex align-items-center" style="height: 400px;">
                            <h1 class="mx-auto text-white">Photo</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="row">
                        <div class="col-lg-12 text-center mt-2">
                            <h3>Présentation de [le site]</h3>
                        </div>

                        <div class="col-lg-12 mt-2">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vulputate diam volutpat velit cursus, 
                                eget dictum mauris cursus. In hac habitasse platea dictumst. 
                                Phasellus vestibulum vestibulum est blandit malesuada. Duis turpis turpis, 
                                sodales id eleifend vitae, malesuada sit amet nulla. Sed imperdiet pulvinar arcu in lacinia. 
                                Nam dui enim, pretium sit amet gravida nec, pulvinar eu arcu. Aliquam erat volutpat. 
                                Cras ultrices velit tortor, ac maximus est malesuada quis. Quisque eleifend iaculis augue eget imperdiet. 
                                Fusce ac felis ac ligula tincidunt ultrices vitae non felis. Fusce magna felis, luctus eget leo ut, 
                                efficitur porttitor erat.

                                Quisque risus libero, viverra in mi condimentum, imperdiet cursus mauris.
                                Mauris faucibus ullamcorper consectetur. Fusce ac quam augue. Ut laoreet tristique lectus,
                                sed lobortis nisl volutpat venenatis. Integer vitae sapien dictum, mollis odio id, volutpat dolor.
                                Ut imperdiet lorem ut eros finibus, sit amet luctus purus consectetur. 
                                Suspendisse eu mauris quis turpis eleifend vestibulum tristique consequat urna. 
                                Duis eget tristique felis. Vivamus eleifend mattis risus eu porttitor. 
                                Phasellus volutpat, quam in tincidunt posuere, mi est interdum dolor, eget mollis nulla sapien nec dolor.

                            </p>
                        </div>
                        <div class="col-lg-12 my-3 text-center">
                            <a class="btn bg-orange" href="#" role="button">Soutenez les refuges ! ʕ•ᴥ•ʔ </a>
                        </div>
                    </div>
                </div>
            </div>
<!------------------------------------------------------------------------------>
            <div class="row mt-2">
                <div class="col-lg-10 offset-lg-1">
                    <h3 class="text-uppercase font-weight-bold">Animaux en urgence d'adoption</h3>
                </div>

            </div>
<!------------------------------------->
            <div class="row mt-1 mb-5">
                <div class="col-lg-3 offset-lg-1 bg-1">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="text-uppercase font-weight-bold text-center mt-4">Name</h3>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12">
                            <p>
                                Description :  dolor sit amet, consectetur adipiscing elit. Nullam vulputate diam volutpat velit cursus, 
                                eget dictum mauris cursus. In hac habitasse platea dictumst. 
                                Phasellus vestibulum vestibulum est blandit malesuada. Duis turpis turpis, 
                                sodales id eleifend vitae, malesuada sit amet nulla. Sed imperdiet pulvinar arcu in lacinia. 
                                Nam dui enim, pretium sit amet gravida nec, pulvinar eu arcu. Aliquam erat volutpat.
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12">
                            <p>Spécificité : </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row"> 
                        <div class="col-5 offset-1 col-lg-5 offset-lg-1">
                            <img class="img-fluid" src="img/Chat/chat1.jpg" alt="">
                        </div>
                        <div class="col-5 col-lg-5 offset-lg-1">
                            <img class="img-fluid" src="img/Chat/chat1.jpg" alt="">
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-5 offset-1 col-lg-5 offset-lg-1">
                            <img class="img-fluid" src="img/Chat/chat1.jpg" alt="">
                        </div>
                        <div class="col-5 col-lg-5 offset-lg-1">
                            <img class="img-fluid" src="img/Chat/chat1.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
<!------------------------------------------------------------------------------>
        </div>
        <!--###############  FIN CODE PRINCIPALE  ##############-->




        <!--Include with php in futur-->
        <footer class="page-footer mt-5 pt-4 text-white bg-orange">
            <!-- Footer Text -->
            <div class="container-fluid text-center text-md-left mb-3">
                <!-- Grid row -->
                <div class="row">
                    <!-- Grid column -->


                    <div class="col-md-5 offset-md-1 mt-md-0 mt-3">
                        <div class="row">
                            <div class="col-lg-12">
                            <h5 class="text-uppercase font-weight-bold">Contact :</h5>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12">
                                Numéro :  03.00.00.00.00</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                Adresse mail :  test@test.com</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                Horaires : 8h-12h / 14h-18h du Lundi au Samedi </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                Fermés les jours fériés</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                ATTENTION : Les visites et les adoptions ont lieu l’après-midi uniquement.</div>
                        </div>
                        
                        
                    </div>


                    <hr class="clearfix w-100 d-md-none pb-3">
            
                    <div class="col-md-5 mb-md-0 mb-3">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h5 class="text-uppercase font-weight-bold">Mentions légales :</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio deserunt fuga perferendis modi earum
                                        commodi aperiam temporibus quod nulla nesciunt aliquid debitis ullam omnis quos ipsam, aspernatur id
                                        excepturi hic.
                                </div>
                            </div> 
                    </div>
                </div>
            </div>
            <!-- Copyright -->
            
            <div class="footer-copyright text-center py-3 bg-orangelg">© 2020 Copyright:
                <a href="https://mdbootstrap.com/education/bootstrap/"> Monsite.com</a>
            </div>
        </footer>

    </body>
</html>