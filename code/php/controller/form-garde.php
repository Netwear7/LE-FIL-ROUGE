<!DOCTYPE html>
<html lang=fr>
    <head>
        <title>Nos Garderies</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
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
                    <h3>Réserver une place en Garderie</h3>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-5 offset-lg-1 bg-dark">
                    <div class="row mt-3">
                        <div class="col-lg-12 text-center text-white">
                            <h3>Date de réservation :</h3>
                        </div>
                    </div>
                    <div class="row mt-3"> 
                        <div class="col-lg-10 offset-lg-1 mb-3">
                            <div class="input-group input-group-lg">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroup-sizing-lg" style="width: 160px;">date d'entrée : </span>
                                </div>
                                <input type="date" class="form-control" aria-label="date d'entrée :" aria-describedby="inputGroup-sizing-sm">
                            </div>
                        </div>
                        <div class="col-lg-10 offset-lg-1 mb-3">
                            <div class="input-group input-group-lg">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroup-sizing-lg" style="width: 160px;">date de sortie :</span>
                                </div>
                                <input type="date" class="form-control" aria-label="date d'entrée :" aria-describedby="inputGroup-sizing-sm">
                            </div>
                        </div>
                        <div class="col-lg-10 offset-lg-1 mb-3">
                            <select class="custom-select custom-select-sm">
                                <option selected>Selectionner un refuge :</option>
                                <option value="1">Refuge 1</option>
                                <option value="2">Refuge 2</option>
                                <option value="3">Refuge 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-10 offset-lg-1 text-white">
                            <p>Informations tarif : ........................................................................
                                ................................................................................
                                ................................................................................
                            </p>
                        </div>
                        
                    </div> 

                </div>



                <div class="col-lg-5 bg-grey-light">
                    <div class="row ">
                        <div class="col-lg-10 offset-1">
                            <div class="row mt-3">
                                <h4>Selectionnez votre animal :</h4>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-check p-1">
                                        <input class="form-check-input ml-1" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label ml-4" for="defaultCheck1">
                                            Guizmo, 8ans
                                        </label>
                                    </div>
                                    <div class="form-check p-1">
                                        <input class="form-check-input ml-1" type="checkbox" value="" id="defaultCheck2">
                                        <label class="form-check-label ml-4" for="defaultCheck2">
                                            Mowgli, 4ans
                                        </label>
                                    </div>
                                    <div class="form-check p-1">
                                        <input class="form-check-input ml-1" type="checkbox" value="" id="defaultCheck3">
                                        <label class="form-check-label ml-4" for="defaultCheck3">
                                            Symba, 2ans
                                        </label>
                                    </div>
                                    <div class="form-check p-1">
                                        <input class="form-check-input ml-1" type="checkbox" value="" id="defaultCheck4">
                                        <label class="form-check-label ml-4" for="defaultCheck4">
                                            Volovitz, 3ans
                                        </label>
                                    </div>
                                    <div class="form-check p-1">
                                        <input class="form-check-input ml-1" type="checkbox" value="" id="defaultCheck5">
                                        <label class="form-check-label ml-4" for="defaultCheck5">
                                            Guizmo, 1an
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5 mb-5">
                
                <div class="col-lg-5 offset-lg-1"></div>
                <div class="col-lg-5">
                    <div class="row">
                        <div class="offset-lg-6 col-lg-6">
                            <button type="button submit" class="btn btn-primary w-100">Confirmer la réservation</button>
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