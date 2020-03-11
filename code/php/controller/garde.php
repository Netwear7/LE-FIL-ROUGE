<!DOCTYPE html>
<html lang=fr>
    <head>
        <title>Nos Garderies</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
                <!--Include with php in futur-->
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            
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
                        <a class="mr-3" href="#"><img class="mx-auto " src="img/mesAnimaux.png" alt="">
                        <p class="mx-auto d-block navbar-nav text-light">Mes animaux</p></a>
                        <a class="mr-5"href="#"><img class="mx-auto " src="img/account.png" alt="">
                        <p class="mx-auto d-block navbar-nav text-light">Mon compte</p></a>
                    </div>
                </nav>

                <!--Partie Principale-->
        <div class="container mt-4">
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <h3>Nos garderies pour Animaux</h3>
                </div>
            </div>
            <div class="row d-flex justify-content-around">
                <div class="col-6 mt-3">
                    <div class="row p-3">
                        <div class="col-12">
                            <h4>Pourquoi faire garder son Animal ? </h4>
                            <span>Lors de vos déplacements, n'hésitez pas à réserver une place dans un de nos refuges ! Toutes nos Assistants Animaliers se feront un plaisir d'accueuillir votre Animal de compagnie lors de vos déplacements ou vos vacances ! Nous avons des équipes spécialisées réparties dans les différents refuges, ces équipes ont été crées pour permettre une prise en charge de votre Animal lorsque vous n'êtes pas là ! Nos Garderies sont ouvertes toutes l'année!</span>
                        </div>
                    </div>
                    <div class="row p-3">
                        <div class="col-12">
                            <h4>Réservez une place dans un de nos refuge</h4>
                            <span>Afin de réserver une place pour votre Animal dans une de nos Garderies, Remplissez le formulaire disponible sur le bouton suivant :</span>
                            <div class="row mt-2 mb-2 justify-content-center">
                                <a href="formgarde.html"><button type="button" class="btn btn-outline-info btn-lg btn-block">Réserver</button></a>
                            </div>
                            <p>Si des places ne sont plus disponibles, n'hésitez pas à actualiser la liste des horraires, il se peut que des places se libèrent !</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 mt-3">
                    <div class="row pt-2">
                        <img src="doggo.jpg" alt="Pension"/>
                    </div>
                </div>
            </div>
        </div>
        <footer>
        </footer>        
    </body>
</html>