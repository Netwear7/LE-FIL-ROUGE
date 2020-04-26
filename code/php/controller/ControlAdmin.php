

<?php 
    include_once("../service/ControlAdminService.php");
    include_once("../data-access/ControlAdminDataAccess.php");
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
        <link rel="stylesheet" href="../../css/global.css">
        <!-- Titre onglet -->
        <title>Donnée du site</title>
        <!-- script Javascript-->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="../../javascript/navbarScroll.js"></script>

    </head>
    <body>
        <nav class="navbar navbar-light bg-1 border-bot-header">
            <a class="navbar-brand" href="#">Navbar</a>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="offset-lg-1 col-lg-10 mt-5 py-5 bg-grey-light">
                    <select class="form-control" id="tableSelect" name="tableSelect">
                    <?php
                        $controlAdminDAO = new ControlAdminDataAccessDataAccess();
                        $controlAdminService = new ControlAdminService($controlAdminDAO);
                        $data = $controlAdminService->serviceSelectTable();
                        var_dump($data);
                        foreach($data as $array){
                            if($array["table_name"] == "appartenir_espece" 
                            || $array["table_name"] == "avoir_couleur" 
                            || $array["table_name"] == "espece_avoir_maladie" 
                            || $array["table_name"] == "est_infecte_par" 
                            || $array["table_name"] == "etre_favoris"){
                            }
                            else{
                                echo '<option class='.$array["table_name"].'>'.$array["table_name"].'</option>';
                            }
                        }
                    ?>
                    </select>
                    <div id='ptable' class="col-lg-12 py-4 table-responsive">

                    </div>

                </div>
            </div>
            
        </div>

        <script src="../../javascript/jquery-3.4.1.min.js"></script>
        <script src="../../javascript/displayControlAdmin.js"></script>
    </body>
</html>
