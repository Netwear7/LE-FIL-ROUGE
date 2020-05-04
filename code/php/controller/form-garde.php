<?php

    include_once("../data-access/AdresseDataAccess.php");
    include_once("../service/AdresseService.php");
    include_once("../data-access/AnimauxDataAccess.php");
    include_once("../service/AnimauxService.php");

    session_start();
?>
<!DOCTYPE html>
<html lang=fr>
    <head>
        <title>Nos Garderies</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet"> -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- <link rel="stylesheet" href="../../css/header-and-color-test.css"> -->
        <link rel="stylesheet" href="../../css/global.css">


        <!-- script Javascript-->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> 
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="../../javascript/navbarScroll.js"></script>
        <!-- Carrousel pause script-->
        
    
    </head>
    <body>
        <?php
            include_once("header.php");
        ?>
               
        <!--Partie Principale-->
        <div class="container-fluid">
            
            <div class="row mt-3">
                <div class="col-lg-12 text-center">
                    <h1>Réserver une place en Garderie</h1>
                </div>
            </div>

            <div class="row">
                <div class="offset-lg-1 col-lg-10 bg-grey-light shadow-sm mt-2 mb-5">
                    <div class="row mt-5">
                        <div class="col-lg-5 offset-lg-1 p-3 mb-3">
                            <div class="row mt-3">
                                <div class="col-lg-12 text-center">
                                    <h3>Date de réservation :</h3>
                                </div>
                                <div class="offset-lg-1 col-lg-10 mb-3">
                                    <label for="dateEntree">date d'entrée :</label>
                                    <input type="date" class="form-control" id="dateEntree" aria-label="date d'entrée :" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                
                                <div class="offset-lg-1 col-lg-10 mb-3">
                                    <label for="dateSortie">date de sortie :</label>
                                    <input type="date" id="dateSortie" class="form-control" aria-label="date d'entrée :" aria-describedby="inputGroup-sizing-sm">
                                </div>
                        
                                <div class="offset-lg-1 col-lg-10 mb-3">
                                    <select class="custom-select custom-select">
                                        <option selected>Selectionner un refuge :</option>
                                        <?php
                                            $daoAdresse = new AdresseDataAccess();
                                            $adresseService = new AdresseService($daoAdresse);
                                            $data = $adresseService->serviceAfficherVille();
                                            foreach($data as $key =>$value){
                                                foreach($value as $key2 => $value2){
                                                    echo '<option>' . $value2 . '</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                     
                                <div class="col-lg-10 offset-lg-1">
                                    <p>Informations tarif : </p> 
                                    <p>Le tarif est fixé par animal à la journée. 
                                        (à changer, trouver une phrase jolie)</p>
                                </div>
                                
                            </div>  
                        </div>
                        <div class="col-lg-5 p-3 mb-3">
                            <div class="row">
                                <div class="col-lg-10 offset-1 mt-5">
                                    <h4>Selectionnez votre animal :</h4>
                                </div>
                                <?php
                                $daoAnimaux = new AnimauxDataAccess();
                                $animauxService = new AnimauxService($daoAnimaux);
                                $data = $animauxService->serviceSelectAllUserAnimals($_SESSION["user_id"]);
                                foreach($data as $key =>$value){
                                        echo '<div class="col-lg-10 offset-1">
                                        <input class="form-check-input ml-1" type="checkbox" value='.$value["ID_ANIMAL"].' id="defaultCheck1">
                                        <label class="form-check-label ml-4" for="defaultCheck1">
                                            '.$value["NOM"].'
                                        </label>
                                        </div>';
                                    }
                                ?>

                                <div class="col-lg-10 offset-1 mt-5">
                                    <button type="submit" class="btn btn-primary w-100">Confirmer la réservation</button>
                                </div>
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