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
    <title>Adopter un animal</title>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c24fee648d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/global.css">

    <script src="../../javascript/navbarScroll.js"></script>

</head>

    <?php
        include_once("header.php");
    ?> 
<body class="bg-grey-light">
    
    <div class="container-fluid">
        <div class="row my-3">
            <h1 class="mx-auto">Adoptez un animal</h1>
        </div>

        <div class="row mt-5">
            <div class="col-lg-2 offset-lg-1">
                <div class="row">
                    <div class="col-lg-12 bg-dark">
        <!--Menu critères de recherche, affichage dynamique javascript/ajax-->
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
                                    <div class="custom-control custom-checkbox" id="urgenceDiv">
                                        <input type="checkbox" class="custom-control-input" name="urgence" id="urgence" value="">
                                        <label class="custom-control-label text-white" for="urgence">Urgence d'adoption</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <select name="ville" id="ville" class="custom-select custom-select-md">
                                        <option value="" selected>Ville</option>
                                        <?php
                                            $daoAdresse = new AdresseDataAccess();
                                            $adresseService = new AdresseService($daoAdresse);
                                            $data = $adresseService->serviceAfficherVille();
                                            foreach($data as $key =>$value){
                                                foreach($value as $key2 => $value2){
                                                    if($key2=="ville"){echo '<option>'.$value2.'</option>';};;
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-lg-12">
                                    <button id="cancelResearch" class="btn btn-danger btn-sm w-100">Effacer la recherche</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

<!--Fiches animaux, générées en javascript-->
            <div class="col-lg-8">
                <div class="row" id="display"></div>
            </div>
        </div>
        <!--navigation vers les pages de recherche, affichage dynamique en javascript/ajax-->
        <nav aria-label="Search results pages">
            <div class="col-lg-8 offset-lg-3">
            <ul id="pagin" class="pagination justify-content-center mb-0 pb-4"></ul>
            </div>
        </nav>
    </div>

    <?php
        include_once("footer.php");
    ?>                             
</body>

<script src="../../javascript/jquery-3.4.1.min.js"></script>
<script src="../../javascript/scriptDisplaySelection.js"></script>

</html>