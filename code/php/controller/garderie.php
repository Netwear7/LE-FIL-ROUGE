<?php

    // include_once("../data-access/AdresseDataAccess.php");
    // include_once("../service/AdresseService.php");

    session_start();
?>

<!DOCTYPE html>
<html lang=fr>
    <head>
        <title>Nos Garderies</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        <!-- CSS -->
        <link rel="stylesheet" href="../../css/global.css">
        <!-- <link rel="stylesheet" href="../../css/header-and-color-test.css"> -->

        <!-- Script -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> 
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="../../javascript/navbarScroll.js"></script>

    </head>
    <body>
        <?php
            include_once("header.php");
        ?>

                <!--Partie Principale-->
        <div class="container-fluid">
            <div class="row mt-3 bg-1">
                <div class="col-lg-12 text-center">
                    <h1>Nos garderies pour Animaux</h1>
                </div>
            </div>
            <div class="row mt-3">
                <div class="offset-lg-1 col-lg-10 bg-grey-light shadow-sm mb-5 mt-2">
                    <div class="row mt-3">
                        <div class="col-lg-6 mt-3">
                            <div class="row">
                                <div class="offset-lg-1 col-lg-10 mb-4">
                                    <h4>Pourquoi faire garder son Animal ? </h4>
                                    <span>Vous devez vous absenter pour des vacances ou une toute autre raison ? <strong>Confiez-nous votre animal</strong> de compagnie (chien ou chat) !<br>

Nous mettons toute notre expertise et nos locaux <strong>au service de nos clients</strong> afin d’offrir un <strong>séjour agréable</strong> aux petits compagnons accueillis en pension canine ou féline.<br>

<strong style="text-decoration: underline; font-size:1.2em">Pour les chiens</strong> : nous pouvons héberger votre chien dans un <strong>box individuel</strong> avec <strong>cour privative</strong>. Les animaux sont sortis 2 fois par jour pour se défouler dans un grand espace dédié à cet effet.<br>

<strong style="text-decoration: underline; font-size:1.2em">Pour les chats</strong> : votre chat profitera d’un <strong>box individuel</strong> ou <strong>box double</strong> (pour les couples de chats) dans la chatterie avec une <strong>cour privative</strong>. Par précaution, les chats accueillis en pension sont <strong>séparés</strong> des autres chats du refuge.<br>

Tous les boxes (chiens et chats) sont <strong>chauffés par le sol</strong> et abrités des éléments extérieurs. Nous fournissons aussi le <strong>couchage</strong> (panier, coussin, …), les <strong>jouets</strong> et la <strong>nourriture</strong> le temps du séjour.</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="offset-lg-1 col-lg-10">
                                    <h4>Réservez une place dans un de nos refuge</h4>
                                    <span>Afin de réserver une place pour votre Animal dans une de nos Garderies, Remplissez le formulaire disponible sur le bouton suivant :</span>
                                    <div class="row mt-2 mb-2 justify-content-center">
                                        <!-- <a href="form-garde.php"><button type="button" class="btn btn-outline-info btn-lg btn-block">Réserver</button></a> -->
                                        <a class="btn btn-info" href="form-garde.php" role="button">Réserver</a>
                                    </div>
                                    <small><p>Si des places ne sont plus disponibles, n'hésitez pas à actualiser la liste des horraires, il se peut que des places se libèrent !</p></small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mt-3 mb-3">
                            <div class="row">
                                <img src="doggo.jpg" alt="Pension"/>
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