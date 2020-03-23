<?php 
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
    <link rel="stylesheet" href="../../css/header-and-color-test.css">
</head>

<body>

    <?php
        include_once("header.php");
    ?>
    
    <div class="container-fluid">
        <div class="row my-3">
            <h1 class="mx-auto">Avez-vous aperçu cet animal ?</h1>
        </div>

        <div class="row mt-5">
            <div class="col-lg-2 offset-lg-1 bg-dark">
                                   
                <h5 class="text-center text-white my-3">Critères de Recherche</h5> 

                <div class="row text-center">                    
                    <div class="dropdown w-100">                           
                        <button class="btn btn-secondary dropdown-toggle" style="width:75%" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Type
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Chien</a>
                            <a class="dropdown-item" href="#">Chat</a>
                            <a class="dropdown-item" href="#">Lapin</a>
                        </div>
                    </div>                       
                </div>
                <div class="row text-center mt-3">                    
                    <div class="dropdown w-100">                           
                        <button class="btn btn-secondary dropdown-toggle" style="width:75%" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Race
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Chien</a>
                            <a class="dropdown-item" href="#">Chat</a>
                            <a class="dropdown-item" href="#">Lapin</a>
                        </div>
                    </div>                       
                </div>
                <div class="row text-center mt-3">                   
                    <div class="dropdown w-100">                           
                        <button class="btn btn-secondary dropdown-toggle" style="width:75%" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Age
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Chien</a>
                            <a class="dropdown-item" href="#">Chat</a>
                            <a class="dropdown-item" href="#">Lapin</a>
                        </div>
                    </div>                       
                </div>
                <div class="row text-center mt-3">                    
                    <div class="dropdown w-100">                           
                        <button class="btn btn-secondary dropdown-toggle" style="width:75%" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Poil
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Chien</a>
                            <a class="dropdown-item" href="#">Chat</a>
                            <a class="dropdown-item" href="#">Lapin</a>
                        </div>
                    </div>                       
                </div>               
            </div>

            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="Koala.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="Koala.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="Koala.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="Koala.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="Koala.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="Koala.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="Koala.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="Koala.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="Koala.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="Koala.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="Koala.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="Koala.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                </div>

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