<?php 


    include_once("../service/ControlAdminService.php");
    include_once("../data-access/ControlAdminDataAccess.php");

    //data-Access
    include_once("../data-access/AdresseDataAccess.php");
    include_once("../data-access/AnimauxDataAccess.php");
    include_once("../data-access/ContactezNousDataAccess.php");
    include_once("../data-access/CouleurAnimalDataAccess.php");
    include_once("../data-access/EspeceDataAccess.php");
    include_once("../data-access/GarderieDataAccess.php");
    include_once("../data-access/ImgSiteDataAccess.php");
    include_once("../data-access/MaladieDataAccess.php");
    include_once("../data-access/PhotoAnimalDataAccess.php");
    include_once("../data-access/PerteDataAccess.php");
    include_once("../data-access/RaceDataAccess.php");
    include_once("../data-access/RefugeDataAccess.php");
    include_once("../data-access/UtilisateurDataAccess.php");
    include_once("../data-access/DonationDataAccess.php");
 
    //Service
    include_once("../service/AdresseService.php");
    include_once("../service/AnimauxService.php");
    include_once("../service/ContactezNousService.php");
    include_once("../service/CouleurAnimalService.php");
    include_once("../service/EspeceService.php");
    include_once("../service/GarderieService.php");
    include_once("../service/ImgSiteService.php");
    include_once("../service/MaladieService.php");
    include_once("../service/PhotoAnimalService.php");
    include_once("../service/PerteService.php");
    include_once("../service/RaceService.php");
    include_once("../service/RefugeService.php");
    include_once("../service/UtilisateurService.php");
    include_once("../service/DonationService.php");

    session_start();


    function underscoreToCamelCase($string, $capitalizeFirstCharacter = false) {
        $str = str_replace(' ', '', ucwords(str_replace('_', ' ', $string)));
        if (!$capitalizeFirstCharacter) {
            $str[0] = strtoupper($str[0]);
        }
        return $str;
    }
    function ConcatTableDataAccess($table){
        $table = underscoreToCamelCase($table, true);
        $TableDataAccess = $table.'DataAccess';
        $SelectedTableDAO = new $TableDataAccess;
        return $SelectedTableDAO;
    }
    function ConcatTableService($table, $dataAccess){
        $table = underscoreToCamelCase($table, true);
        $TableService = $table.'Service';
        $SelectedTableService = new $TableService($dataAccess);
        return $SelectedTableService;
    }
    function AddNewRowOfSelectedTable($table){
        $SelectedTableDAO = ConcatTableDataAccess($table);
        $SelectedTableService = ConcatTableService($table, $SelectedTableDAO);
        $SelectedTableService->InsertPostToEntityAndAdd($_POST);
    }
    function AddNewRowOfSelectedTableAndAdresse($table, $id){
        $SelectedTableDAO = ConcatTableDataAccess($table);
        $SelectedTableService = ConcatTableService($table, $SelectedTableDAO);
        $SelectedTableService->InsertPostToEntityAndAdd($_POST, $id);
    }

    if(isset($_POST["selectTable"]) && $_POST["selectTable"] != "refuge"  && $_POST["selectTable"] != "utilisateur"){
        AddNewRowOfSelectedTable($_POST["selectTable"]);
    }
    if(isset($_POST["selectTable"]) && $_POST["selectTable"] == "refuge"){
        AddNewRowOfSelectedTable("adresse");
        $adresseDao = new AdresseDataAccess();
        $adresseService = new AdresseService($adresseDao);
        $id = $adresseService->serviceSelectByCodePostal($_POST["CODE_POSTAL"]);
        AddNewRowOfSelectedTableAndAdresse($_POST["selectTable"], $id[0]["ID_ADRESSE"]);
    }
    if(isset($_POST["selectTable"]) && $_POST["selectTable"] == "utilisateur"){
        AddNewRowOfSelectedTable("adresse");
        $adresseDao = new AdresseDataAccess();
        $adresseService = new AdresseService($adresseDao);
        $id = $adresseService->serviceSelectByCodePostal($_POST["CODE_POSTAL"]);
        AddNewRowOfSelectedTableAndAdresse($_POST["selectTable"], $id[0]["ID_ADRESSE"]);
    }

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
        <script src="https://kit.fontawesome.com/ca25c21894.js" crossorigin="anonymous"></script>


    </head>
    <body>
        <nav class="navbar navbar-light bg-1 border-bot-header">
            <a class="navbar-brand" href="#">Navbar</a>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="offset-lg-1 col-lg-10 mt-2 bg-grey-light">
                    <a href="displayModalAddInDatabase.php" id="modalAdd" class="" data-toggle="modal" data-target="#add"><i class="fas fa-plus mb-2 mt-2 ml-2"></i></a>
                    <div id="pload"></div>
                    <select class="form-control" id="tableSelect" name="tableSelect">
                    <?php
                        $controlAdminDAO = new ControlAdminDataAccessDataAccess();
                        $controlAdminService = new ControlAdminService($controlAdminDAO);
                        $data = $controlAdminService->serviceSelectTable();
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
                    <div id='ptable' class="col-lg-12 py-2 table-responsive">

                    </div>
                </div>
            </div>
        </div>
        <script src="../../javascript/jquery-3.4.1.min.js"></script>
        <script src="../../javascript/displayControlAdmin.js"></script>
    </body>
</html>
