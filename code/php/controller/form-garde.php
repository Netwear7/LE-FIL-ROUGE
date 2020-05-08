<?php

    include_once("../data-access/AdresseDataAccess.php");
    include_once("../service/AdresseService.php");
    include_once("../data-access/AnimauxDataAccess.php");
    include_once("../service/AnimauxService.php");
    include_once("../data-access/GarderieDataAccess.php");
    include_once("../service/GarderieService.php");

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
        <script src="https://kit.fontawesome.com/c24fee648d.js" crossorigin="anonymous"></script>
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
            <?php

            $daoGarderie = new GarderieDataAccess();
            $serviceGarderie = new GarderieService($daoGarderie);
            if(isset($_SESSION["user_id"])){

                if(isset($_POST["reservation"])){
    
                    if(!empty($_POST["date_entree"]) && !empty($_POST["date_sortie"]) && !empty($_POST["ville"]) && !empty($_POST["id_animal"])){
    
                        if(count($_POST["id_animal"])<5){
                            $serviceGarderie->serviceReservationGarderie($_POST);
                            echo '<div class="row">
                            <div class="alert alert-primary text-center col-lg-10 offset-lg-1" role="alert">Votre réservation a bien été prise en compte !<br>
                            Un mail de confirmation va vous être adressé.</div>
                            </div>';
                        }
    
                        elseif(count($_POST["id_animal"])>5){
                            echo "<div class='row'>
                            <div class='alert alert-danger text-center col-lg-10 offset-lg-1' role='alert'>Par soucis d'équité entre nos usagers, nos garderies sont limitées à 5 animaux par personne.</br>
                            Merci de votre compréhension.</div>
                            </div>";
                        }
    
                    }
    
                               
                    elseif(empty($_POST["date_entree"]) || empty($_POST["date_sortie"]) || empty($_POST["ville"]) || empty($_POST["id_animal"])){
                        echo '<div class="row">
                        <div class="alert alert-danger text-center col-lg-10 offset-lg-1" role="alert"><i class="fas fa-exclamation-triangle mr-3"></i> 
                        <span>Veuillez remplir tous les champs du formulaire</span> 
                        <i class="fas fa-exclamation-triangle ml-3"> </i></div>
                        </div>';
                    }

                }

                if(isset($_GET["delete"])){
                    $serviceGarderie->serviceDeleteReservation($_SESSION["user_id"]);
                    echo "<div class='row'>
                    <div class='alert alert-primary text-center col-lg-10 offset-lg-1' role='alert'>Votre réservation a bien été annulée.</br>
                    Un mail de confirmation vient de vous être envoyé, consultez votre boîte mail.</div>
                    </div>";
                }

            }

            
            
            ?>
            <form method="post" name="reservation" action="form-garde.php">
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
                                        <input type="date" class="form-control" id="dateEntree" name="date_entree" aria-label="date d'entrée :" aria-describedby="inputGroup-sizing-sm">
                                    </div>
                                    
                                    <div class="offset-lg-1 col-lg-10 mb-3">
                                        <label for="dateSortie">date de sortie :</label>
                                        <input type="date" id="dateSortie" name="date_sortie" class="form-control" aria-label="date de sortie :" aria-describedby="inputGroup-sizing-sm">
                                    </div>
                            
                                    <div class="offset-lg-1 col-lg-10 mb-3">
                                        <select name="ville" class="custom-select custom-select">
                                            <option value="" selected>Selectionner un refuge :</option>
                                            <?php
                                                $daoAdresse = new AdresseDataAccess();
                                                $adresseService = new AdresseService($daoAdresse);
                                                $data = $adresseService->serviceAfficherVille();
                                                foreach($data as $key =>$value){
                                                    foreach($value as $key2 => $value2){
                                                            $idRefuge=$value["id_refuge"];
                                                            if($key2=="ville"){echo '<option value ='.$idRefuge.'>'.$value2.'</option>';};                                                       
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                        
                                    <div class="col-lg-10 offset-lg-1">
                                        <p>Informations tarifs : </p> 
                                        <p><strong>Chien : 10€/jour</strong><i> (nourriture incluse) </i><br> <strong>Chats : 8€/jour</strong><i> (nourriture incluse)</i></p>
                                    </div>
                                    
                                </div>  
                            </div>
                            <div class="col-lg-5 p-3 mb-3">
                                <div class="row">
                                    <div class="col-lg-10 offset-1 mt-5">
                                        <h4>Selectionnez votre animal :</h4>
                                    </div>
                                    <?php
                                    if(isset($_SESSION["user_id"])){
                                        $daoAnimaux = new AnimauxDataAccess();
                                        $animauxService = new AnimauxService($daoAnimaux);
                                        $dataAnimalUser = $animauxService->serviceSelectAllUserAnimals($_SESSION["user_id"]);
                                        $countAnimals = 0;
                                        if(count($dataAnimalUser) > 0){
                                            foreach($dataAnimalUser as $key =>$value){
                                                $countAnimals++;
                                                echo '<div class="col-lg-10 offset-1">
                                                <input class="form-check-input ml-1" name="id_animal[]" type="checkbox" value='.$value["ID_ANIMAL"].' id="defaultCheck1">
                                                <label class="form-check-label ml-4" for="defaultCheck1">
                                                    '.$value["NOM"].'
                                                </label>
                                                </div>';
                                            }
                                        }
                                        else{
                                            echo '<div class="alert alert-primary text-center col-lg-10 offset-lg-1" role="alert">Aucun animal inscrit sur votre compte.</div>';
                                        }
                                    }
                                    else{
                                        echo "<div class='alert alert-primary text-center col-lg-10 offset-lg-1' role='alert'>Il faut être identifié pour pouvoir inscrire des animaux dans notre garderie. Connectez-vous à votre compte ou créez-en un si ce n'est pas déjà fait</div>";
                                    }
                                    ?>

                                    <div class="col-lg-10 offset-1 mt-5 text-center">
                                         
                                        <?php if(!isset($_SESSION["user_id"])){
                                                echo '<button type="submit" href="forme-garde.php" name="reservation" disabled="disabled"
                                                class="btn btn-primary w-100">Confirmer la réservation</button>';
                                            }
                                            elseif(isset($_SESSION["user_id"])){
                                                $data = $serviceGarderie->serviceVerifyIfReservationExists($_SESSION["user_id"]);
                                                if(count($data) > 0){
                                                    echo "<button type='submit' href='forme-garde.php' name='reservation' disabled='disabled'
                                                    class='btn btn-primary w-100'>Confirmer la réservation</button>
                                                    <a type ='button submit' class='btn btn-danger w-100 mt-2' href='form-garde.php?delete'>Annuler la réservation</a>
                                                              <small><i>*Vous ne pouvez pas avoir plus d'une réservation.</br>Si vous souhaiter réserver à nouveau, veuillez annuler votre précédente réservation.</i></small>";
                                                }
                                                else{
                                                    if(count($dataAnimalUser) > 0){
                                                    echo '<button type="submit" href="forme-garde.php" name="reservation"
                                                    class="btn btn-primary w-100">Confirmer la réservation</button>';
                                                    }
                                                    else{
                                                        echo '<button type="submit" href="forme-garde.php" name="reservation"
                                                    class="btn btn-primary w-100" disabled="disabled">Confirmer la réservation</button>';

                                                    }
                                                }
                                            }
                                        ?>       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <?php
            include_once("footer.php");
        ?>
    </body>
</html>