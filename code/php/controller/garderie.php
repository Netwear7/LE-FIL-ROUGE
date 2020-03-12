<!DOCTYPE html>
<html lang=fr>
    <head>
        <title>Nos Garderies</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="../../css/header-and-color-test.css">
    </head>
    <body>
        <?php
            include_once("header.php");
        ?>

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
        <?php
            include_once("footer.php");
        ?>       
    </body>
</html>