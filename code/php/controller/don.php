<!DOCTYPE html>
<html lang=fr>
    <head>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <title>Aidez-nous</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script>

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
                            Adopter un animal
                            </a>
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
                            Animaux perdus
                            </a>
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
        </div>
        <div class="container">
            <div class="row mt-5">
                <div class="col text-center">
                    <h3>Vous souhaitez nous Soutenir ?</h3>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-4 col-sm-12 d-flex align-items-center justify-content-center">
                    <h2>Faites un don !</h2>
                </div>
                <article class="col-lg-8 col-sm-12">
                    <p class="mt-3">

                         Le Don blablablablaHoc inmaturo interitu ipse quoque sui pertaesus excessit e vita aetatis nono anno atque vicensimo cum quadriennio imperasset. natus apud Tuscos in Massa Veternensi, patre Constantio Constantini fratre imperatoris, matreque Galla sorore Rufini et Cerealis, quos trabeae consulares nobilitarunt et praefecturae.
                        
                        Procedente igitur mox tempore cum adventicium nihil inveniretur, relicta ora maritima in Lycaoniam adnexam Isauriae se contulerunt ibique densis intersaepientes itinera praetenturis provincialium et viatorum opibus pascebantur.
                        
                        est uttem non indicabant denique etiam idem ad usque discrimen vitae vexatus nihil fateri conpulsus est.
                    </p>
                </article>
            </div>
            <section class="row mt-5 border rounded border-black">
                <div class="col-12">
                    <form method="GET" action="don.html">
                        <div class="row">
                            <div class="col-lg-2 col-sm-12">
                                <div class="row">
                                    <select class="selectpicker">
                                        <optgroup label="Don Unique">
                                            <option>Via Paypal</option>
                                            <option>Par Carte Bancaire</option>
                                        </optgroup>
                                        <optgroup label="Don Mensuel">
                                            <option>Via Paypal</option>
                                            <option>Par Carte Bancaire</option>
                                            <option>Via TWITCH</option>
                                        </optgroup>
                                    </select>
                                      
                                </div>
                            </div>
                            <div class="col-lg-8 col-sm-12">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <h3>Paypal</h3>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <h4>Selectionnez un montant :</h4>
                                </div>
                                <div class="row mt-3 d-flex justify-content-around">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="paypal5" id="inlineRadio1" value="5">
                                        <label class="form-check-label" for="inlineRadio1">5 €</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="paypal10" id="inlineRadio2" value="10">
                                        <label class="form-check-label" for="inlineRadio2">10 €</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="paypal20" id="inlineRadio3" value="20">
                                        <label class="form-check-label" for="inlineRadio3">20 €</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="paypal20" id="inlineRadio3" value="50">
                                        <label class="form-check-label" for="inlineRadio3">50 €</label>
                                    </div>                            
                                </div>
                                <div class="row mt-5">
                                    <div class="col-4">
                                        <h5>Montant Libre : </h5>
                                    </div>
                                    <div class="col-8">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" aria-label="Montant en euros">
                                            <div class="input-group-append">
                                                <select class="form-control">
                                                    <option>€</option>
                                                    <option>$</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2 mb-2">
                                    <div class="col-6">
                                        <button type="button submit" class="btn btn-outline-primary btn-lg btn-block">Annuler</button>
                                    </div>
                                    <div class="col-6">
                                        <button type="button submit" class="btn btn-outline-info btn-lg btn-block">Valider</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>      
            </section>
            <div class="row mt-3">
                <p>Conditions Conditions Conditions Conditions Conditions Conditions Conditions Conditions Conditions Conditions Conditions  Conditions Conditions Conditions </p>
            </div>
        </div>
    </body>
</html>
