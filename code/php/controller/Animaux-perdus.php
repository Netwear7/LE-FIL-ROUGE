<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Animaux perdus</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="header-and-color-test.css">
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
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Les animaux</a>
                            <a class="dropdown-item" href="#">Accompagnement pour l'adoption</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Conditions d'adoption</a>
                        </div>
                </li>

<!-- DROPDOWN ANIMAUX PERDU-->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Animaux perdus</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Envoyer la fiche animal</a>
                    </div>
                </li>
            </ul>
<!-- BOUTON MES ANIMAUX ET COMPTES-->
            
            <a class="d-flex mr-3" href="#">
                <img class="mr-1" src="img/mesAnimaux.png" alt="">
                <p class="navbar-nav text-light">Mes animaux</p>
            </a>
            <a class="d-flex mr-3" href="#">
                <img class="mr-1" src="img/account.png" alt="">
                <p class="navbar-nav text-light">Mon compte</p>
            </a>
        </div>
    </nav>
    
    <div class="container-fluid">
        <div class="row my-3">
            <h1 class="mx-auto">Avez-vous aperçu cet animal ?</h1>
        </div>

        <div class="row mt-5">
            <div class="col-lg-2 offset-lg-1 bg-dark">
                                   
                <h5 class="text-center text-white my-3">Critères de Recherche</h5> 

                <div class="row text-center">                    
                    <div class="dropdown w-100">                           
                        <button class="btn btn-secondary dropdown-toggle" style="width:75%" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Type
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Chien</a>
                            <a class="dropdown-item" href="#">Chat</a>
                            <a class="dropdown-item" href="#">Lapin</a>
                        </div>
                    </div>                       
                </div>
                <div class="row text-center mt-3">                    
                    <div class="dropdown w-100">                           
                        <button class="btn btn-secondary dropdown-toggle" style="width:75%" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Race
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Chien</a>
                            <a class="dropdown-item" href="#">Chat</a>
                            <a class="dropdown-item" href="#">Lapin</a>
                        </div>
                    </div>                       
                </div>
                <div class="row text-center mt-3">                   
                    <div class="dropdown w-100">                           
                        <button class="btn btn-secondary dropdown-toggle" style="width:75%" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Age
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Chien</a>
                            <a class="dropdown-item" href="#">Chat</a>
                            <a class="dropdown-item" href="#">Lapin</a>
                        </div>
                    </div>                       
                </div>
                <div class="row text-center mt-3">                    
                    <div class="dropdown w-100">                           
                        <button class="btn btn-secondary dropdown-toggle" style="width:75%" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Poil
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Chien</a>
                            <a class="dropdown-item" href="#">Chat</a>
                            <a class="dropdown-item" href="#">Lapin</a>
                        </div>
                    </div>                       
                </div>               
            </div>

            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="Koala.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="Koala.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="Koala.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="Koala.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="Koala.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="Koala.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="Koala.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="Koala.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="Koala.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="Koala.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="Koala.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="Koala.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                      <li class="page-item"><a class="page-link" href="#">Précédent</a></li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">4</a></li>
                      <li class="page-item"><a class="page-link" href="#">5</a></li>
                      <li class="page-item"><a class="page-link" href="#">6</a></li>
                      <li class="page-item"><a class="page-link" href="#">7</a></li>
                      <li class="page-item"><a class="page-link" href="#">8</a></li>
                      <li class="page-item"><a class="page-link" href="#">9</a></li>
                      <li class="page-item"><a class="page-link" href="#">10</a></li>
                      <li class="page-item"><a class="page-link" href="#">suivant</a></li>
                    </ul>
                </nav>

            </div>
        </div>
    </div>

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