<?php
    include_once('../service/EspeceService.php');
    include_once('../service/RaceService.php');
    include_once('../service/CouleurAnimalService.php');
    include_once('../service/AnimauxService.php');
    include_once('../data-access/AnimauxDataAccess.php');
    include_once('../data-access/EspeceDataAccess.php');
    session_start();

?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Animaux perdus</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/global.css">

    <script src="../../javascript/navbarScroll.js"></script>
</head>

<body>

    <?php
        include_once("header.php");
    ?> 
    
    <div class="container-fluid">
        <div class="row my-3">
            <h1 class="mx-auto">Animaux perdus</h1>
        </div>

        <div class="row mt-5">
            <div class="col-lg-2 offset-lg-1">
                <div class="row">
                    <div class="col-lg-12 bg-dark">
        <!--Menu critères de recherche, affichage avec requetes sql vers la base de données-->
                        <h5 class="text-center text-white my-3">Critères de Recherche</h5> 
                        <hr>
                        <form method="post" action="adopter-un-animal.php"> 
                            <div class="row mt-3">
                                <div class=col-lg-12>
                                    <select name="nom_espece" id="nom_espece" class="custom-select custom-select-md">
                                        <option value="" selected>Type</option>
                                        <?php
                                        $especeDataAccess = new EspeceDataAccess();
                                        $especeService = new EspeceService($especeDataAccess);
                                        $data = $especeService->afficherType();
                                        foreach($data as $key =>$value){
                                            foreach($value as $key2 => $value2){
                                                echo '<option>' . $value2 . '</option>';
                                            }
                                        } 
                                        ?>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12" id="popSelect"></div>
                            </div>                            
                            <hr style="border-color:white;">
                            <div class="row my-3">
                                <div class=col-lg-12>
                                    <select name="ville" id="ville" class="custom-select custom-select-md">
                                        <option value="" selected>Ville</option>
                                        <?php
                                            $daoAdresse = new AdresseDataAccess();
                                            $adresseService = new AdresseService($daoAdresse);
                                            $data = $adresseService->serviceSelectLostAnimalCities();
                                            foreach($data as $key =>$value){
                                                foreach($value as $key2 => $value2){
                                                    echo '<option>' . $value2 . '</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

<!--Fiches animaux, générées en php grâce à la base de données-->
            <div class="col-lg-8">
                <div class="row" id="display"></div>
            </div>
        </div>
        <!--navigation vers les pages de recherche, à inclure avec php, les numéros de page doivent se générer avec la création des pages-->
        <nav aria-label="Search results pages">
            <div class="col-lg-8 offset-lg-3">
                <ul id="pagin" class="pagination justify-content-center">
                </ul>
            </div>
         </nav>
    </div>

    <?php
        include_once("footer.php");
    ?>                             

</body>

<script src="../../javascript/jquery-3.4.1.min.js"></script>
<script src="../../javascript/scriptDisplayLostAnimals.js"></script>

</html>