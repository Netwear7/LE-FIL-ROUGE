<?php 
    include_once("../service/PhotoAnimalService.php");
    include_once("../data-access/PhotoAnimalDataAccess.php");
    session_start();

  
?>

<!doctype html>
<html lang="fr">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS et CSS-->    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- <link rel="stylesheet" href="../../css/header-and-color-test.css"> -->
        <link rel="stylesheet" href="../../css/global.css">
        
        <!-- Titre onglet -->
        <title>Page d'accueil</title>
        <!-- script Javascript-->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <script src="../../javascript/navbarScroll.js"></script>
        <!-- Include en javascript-->
    </head>
    <body>

        <?php
            include_once("header.php");
        ?>

<!--#################  CODE PRINCIPALE  #################-->
        <div class="container-fluid">
            <div class="row">
                <!---------------test carrousel---------------->
                <div id="carouselExampleControls" class="carousel slide col-lg-12 bg-2 py-3 border-crl" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                            $photoAnimalDataAccess =  new PhotoAnimalDataAccess();
                            $photoAnimalService =  new PhotoAnimalService($photoAnimalDataAccess);
                            $data = $photoAnimalService->serviceSelectAllLostProfil();
                            $photoAnimalService->carrousselDisplayLostAnimal($data);
                        ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    </div>
                <!---------------test carrousel---------------->
                <div class="offset-lg-1 col-lg-10">
                    <!---------------Présentation site--------------->
                    <div class="row bg-grey-light shadow-sm mt-5 p-3 mb-2">
                        <div class="col-lg-10 offset-lg-1 mb-4 text-center">
                            <h1 class="font-weight-bold">ANITOPIA</h1>
                        </div>
                        <div class="col-lg-6">
                            <img class="img-fluid" src="http://localhost/LE-FIL-ROUGE/code/img/le-refuge.jpg" alt="photo refuge">
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-12" style ="font-size:1.2em">
                                    <p>Créée en 2012, Anitopia est une structure associative :</p>

                                    <p>Elle accueille les animaux abandonnés (<strong>chiens</strong> et <strong>chats</strong>), les soigne si nécessaire (autant psychologiquement que physiquement), les propose à l'adoption en s'assurant de leur bon placement.</br>

                                    Salariés et bénévoles tentent d'apporter à leurs pensionnaires à quatre pattes autant d'amour et de câlins que faire se peut.</br>

                                    Les promenades sont également très importantes : resocialisation, refamiliarisation avec les sorties en laisse et, bien entendu, détente...</br>

                                    Situés à <strong>Lille</strong> et <strong>Marseille</strong>, nos refuges comptent en moyenne 150 animaux chacun, toutes races confondues, avec une hausse assez importante au moment des vacances d'été ...</br>

                                    De grands boxes collectifs, des cages individuelles et une chatterie chauffée composent son environnement, une maison de retraite chauffée située sur une parcelle de 1 hectare permet à tous les doyens à quatre pattes, qui n'ont pas eu la chance de connaître un nouveau maître, de couler paisiblement leurs vieux jours.</p>

                                    <p>Ce refuge ne pourrait exister sans le dévouement de ses salariés, de ses bénévoles et sans vos dons. Un grand "Merci" à tous pour votre aide !</p>
                                    
                                </div>
                                <div class="col-lg-12 my-3 text-center">
                                    <a class="btn btn-warning btn-lg" href="don.php" role="button">Soutenez les refuges ! ʕ•ᴥ•ʔ </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        if(isset($_SESSION["user_role"]) && $_SESSION["user_role"] == '[admin]'){
                            echo'<button type="btn" id="addNews" class="btn btn-link">Ajouter une news</button>';
                            echo '
                            <div class="row" id="rowAddNews" style="display: none">
                            </div>
                            ';
                        }
                    ?>


                    <hr class="row bg-grey-light" style="border-color: white;">
                    <hr class="row bg-grey-light" style="border-color: white;">
                    <div class="row bg-grey-light shadow-sm mt-2 mb-5 p-3">
                        <div class="col-lg-10 offset-lg-1 mb-4 text-center">
                            <h3 class="font-weight-bold">Animaux en urgence d'adoption</h3>
                        </div>
                        <?php
                            $photoAnimalDataAccess =  new PhotoAnimalDataAccess();
                            $photoAnimalService =  new PhotoAnimalService($photoAnimalDataAccess);
                            $data = $photoAnimalService->serviceSelectAllProfilMalade();
                            $photoAnimalService->displayAnimalsMalade($data);
                        ?>
                    </div>
                </div>
            </div>
        </div>


        
        <!--###############  FIN CODE PRINCIPALE  ##############-->
        <?php
            include_once("footer.php");
        ?>
        <script src="../../javascript/jquery-3.4.1.min.js"></script>
        <script src="../../javascript/displayCardAccueil.js"></script>
        <script src="../../javascript/accueil/showFormAddNews.js"></script>

    </body>
</html>






    <!-- <div class="row">
            <div class="col-lg-12">
                <h3 class="text-uppercase font-weight-bold text-center mt-4">Name</h3>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <p>
                    Description :  dolor sit amet, consectetur adipiscing elit. Nullam vulputate diam volutpat velit cursus, 
                    eget dictum mauris cursus. In hac habitasse platea dictumst. 
                    Phasellus vestibulum vestibulum est blandit malesuada. Duis turpis turpis, 
                    sodales id eleifend vitae, malesuada sit amet nulla. Sed imperdiet pulvinar arcu in lacinia. 
                    Nam dui enim, pretium sit amet gravida nec, pulvinar eu arcu. Aliquam erat volutpat.
                </p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <p>Spécificité : </p>
            </div>
        </div> -->