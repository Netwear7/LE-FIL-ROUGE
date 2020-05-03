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
                                    <span>Lors de vos déplacements, n'hésitez pas à réserver une place dans un de nos refuges ! Toutes nos Assistants Animaliers se feront un plaisir d'accueuillir votre Animal de compagnie lors de vos déplacements ou vos vacances ! Nous avons des équipes spécialisées réparties dans les différents refuges, ces équipes ont été crées pour permettre une prise en charge de votre Animal lorsque vous n'êtes pas là ! Nos Garderies sont ouvertes toutes l'année!</span>
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