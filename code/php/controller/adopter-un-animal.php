<?php
    include_once('../service/EspeceService.php');
    include_once('../service/RaceService.php');
    include_once('../service/CouleurAnimalService.php');
?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Adopter un animal</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/header-and-color-test.css">
</head>

<body>

    <?php
        include_once("header.php");
    ?> 
    
    <div class="container-fluid">
        <div class="row my-3">
            <h1 class="mx-auto">Adoptez un animal</h1>
        </div>

        <div class="row mt-5">
            <div class="col-lg-2 offset-lg-1 bg-dark">
<!--Menu critères de recherche, affichage avec requetes sql vers la base de données-->
                <h5 class="text-center text-white my-3">Critères de Recherche</h5> 
                <form method="post" action="adopter-un-animal.php"> 
                    <div class="row mt-3">
                        <div class=col-lg-12>
                            <select name="type" class="custom-select custom-select-lg">
                                <option value="" selected>Type</option>
                                <?php
                                $especeService = new EspeceService();
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
                    <div class="row mt-3">
                        <div class=col-lg-12>
                            <select name="race" class="custom-select custom-select-lg">
                                <option value="" selected>Race</option>
                                <?php
                                $raceService = new raceService();
                                $data = $raceService->afficherRace();
                                foreach($data as $key =>$value){
                                    foreach($value as $key2 => $value2){
                                        echo '<option>' . $value2 . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class=col-lg-12>
                            <select name="couleur" class="custom-select custom-select-lg">
                                <option value="" selected>Couleur</option>
                                <?php
                                $couleurAnimalService = new CouleurAnimalService();
                                $data = $couleurAnimalService->afficherCouleur();
                                foreach($data as $key =>$value){
                                    foreach($value as $key2 => $value2){
                                        echo '<option>' . $value2 . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class=col-lg-12>
                            <select name="ville" class="custom-select custom-select-lg">
                                <option value="" selected>Ville</option>
                                <option>Paris</option>
                                <option>Lille</option>
                                <option>Marseille</option>
                                <option>Bordeaux</option>
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-3">
                        <button class="btn btn-primary" name="recherche" type="submit">Valider</button>
                    </div>
                </form>
            </div>

<!--Fiches animaux, générées en php grâce à la base de données-->
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-3 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="../../img/Koala.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio deserunt fuga perferendis ictum sepum.</p>
                            </div>                   
                        </div>
                    </div>
                    <div class="col-lg-3 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="Koala.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio deserunt fuga perferendis ictum sepum.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="Koala.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio deserunt fuga perferendis ictum sepum.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="Koala.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio deserunt fuga perferendis ictum sepum.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="Koala.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio deserunt fuga perferendis ictum sepum.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="Koala.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio deserunt fuga perferendis ictum sepum.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="Koala.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio deserunt fuga perferendis ictum sepum.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="Koala.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio deserunt fuga perferendis ictum sepum.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="Koala.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio deserunt fuga perferendis ictum sepum.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="Koala.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio deserunt fuga perferendis ictum sepum.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="Koala.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio deserunt fuga perferendis ictum sepum.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="Koala.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio deserunt fuga perferendis ictum sepum.</p>
                            </div>
                        </div>
                    </div>
                </div>
<!--navigation vers les pages de recherche, à inclure avec php, les numéros de page doivent se générer avec la création des pages-->
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

    <?php
        include_once("footer.php");
    ?>                             

</body>

</html>