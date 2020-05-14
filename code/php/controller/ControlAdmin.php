<?php 
    session_start();
    if(isset($_SESSION["user_role"]) && $_SESSION["user_role"] != '[admin]'){
        header("Location: accueil.php");
    }


    include_once("../service/ControlAdminService.php");
    include_once("../data-access/ControlAdminDataAccess.php");
    include_once("../model/AvoirCouleur.php");
    include_once("../model/InfectePar.php");


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
    include_once("../data-access/AvoirCouleurDataAccess.php");
    include_once("../data-access/InfecteParDataAccess.php");
    include_once("../data-access/AppartenirEspeceDataAccess.php");
    include_once("../data-access/EspeceAvoirMaladieDataAccess.php");

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
    include_once("../service/AvoirCouleurService.php");
    include_once("../service/InfecteParService.php");
    include_once("../service/AppartenirEspeceService.php");
    include_once("../service/EspeceAvoirMaladieService.php");


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
    function RemoveRowOfSelectedTable($table){
        $SelectedTableDAO = ConcatTableDataAccess($table);
        $SelectedTableService = ConcatTableService($table, $SelectedTableDAO);
        if($table == "animaux"){
            $data["idAnimal"] = $_GET['id'];
            $SelectedTableService->ServiceDelete($data);
        }else{
            $SelectedTableService->ServiceDelete($_GET['id']);
        }
    }
    
    function AddNewRowOfSelectedTableAndAdresse($table, $id){
        $SelectedTableDAO = ConcatTableDataAccess($table);
        $SelectedTableService = ConcatTableService($table, $SelectedTableDAO);
        $SelectedTableService->InsertPostToEntityAndAdd($_POST, $id);
    }

    if(isset($_POST["tableSelect"]) && 
        $_POST["tableSelect"] != "refuge"  && 
        $_POST["tableSelect"] != "utilisateur" && 
        $_POST["tableSelect"] != "animaux" && 
        $_POST["tableSelect"] != "photo_animal" &&
        $_POST["tableSelect"] != "animaux" 
        ){
            AddNewRowOfSelectedTable($_POST["tableSelect"]);
    }
    if(isset($_POST["tableSelect"]) && $_POST["tableSelect"] == "refuge"){
        AddNewRowOfSelectedTable("adresse");
        $adresseDao = new AdresseDataAccess();
        $adresseService = new AdresseService($adresseDao);
        $id = $adresseService->serviceSelectByCodePostal($_POST["CODE_POSTAL"]);
        AddNewRowOfSelectedTableAndAdresse($_POST["tableSelect"], $id[0]["ID_ADRESSE"]);
    }
    if(isset($_POST["tableSelect"]) && $_POST["tableSelect"] == "photo_animal" && !empty($_FILES['photo'])){
        $photoAnimalDao = new PhotoAnimalDataAccess();
        $photoAnimalService = new PhotoAnimalService($photoAnimalDao);
        $photoAnimal = new PhotoAnimal($_FILES["photo"], $_POST["animaux"]);
        $photoAnimal->setPhotoProfil(1);
        $photoAnimalService->serviceAdd($photoAnimal);
    }
    if(isset($_POST["tableSelect"]) && $_POST["tableSelect"] == "animaux" && !empty($_FILES['photo'])){
        $animauxDao = new AnimauxDataAccess();
        $animauxService = new AnimauxService($animauxDao);
        $animal = new Animaux($_POST);
        $animauxService->serviceAddRefugeAnimal($animal);
        $avoirCouleur = new AvoirCouleur($animal);
        $avoirCouleurDao = new AvoirCouleurDataAccess();
        $avoirCouleurService = new AvoirCouleurService($avoirCouleurDao);
        $avoirCouleurService->serviceAdd($avoirCouleur);


        if($_POST["maladie"] != "none"){
            $infectePar = new InfectePar($animal->getIdAnimal(), $_POST["maladie"]);
            $infecteParDao = new InfecteParDataAccess();
            $infecteParService = new InfecteParService($infecteParDao);
            $infecteParService->serviceAdd($infectePar);
        }

        
        $photoAnimalDao = new PhotoAnimalDataAccess();
        $photoAnimalService = new PhotoAnimalService($photoAnimalDao);
        $photoAnimal = new PhotoAnimal($_FILES["photo"], $animal->getIdAnimal());
        $photoAnimal->setPhotoProfil(1);
        $photoAnimalService->serviceAdd($photoAnimal);
    }
    if(isset($_GET["action"]) && $_GET["action"] == "delete" && $_GET["table"] != "refuge"){
        RemoveRowOfSelectedTable($_GET["table"]);
    }
    if(isset($_GET["action"]) && $_GET["action"] == "delete" && $_GET["table"] == "refuge"){
        $refugeDao = new RefugeDataAccess();
        $refugeService = new RefugeService($refugeDao);
        $data = $refugeService->serviceSelect($_GET["id"]);
        $idAdresse = $data["ID_ADRESSE"];
        $adresseDao = new AdresseDataAccess();
        $adresseService = new AdresseService($adresseDao);
        $adresseService->serviceDelete($idAdresse);
    }
    if(isset($_GET["action"]) && $_GET["action"] == "delete" && $_GET["table"] == "utilisateur"){
        $utilisateurDao = new UtilisateurDataAccess();
        $utilisateurService = new UtilisateurService($utilisateurDao);
        $data = $utilisateurService->serviceSelectId($_GET["id"]);
        $idAdresse = $data["ID_ADRESSE"];
        $adresseDao = new AdresseDataAccess();
        $adresseService = new AdresseService($adresseDao);
        $adresseService->serviceDelete($idAdresse);
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
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="../../javascript/navbarScroll.js"></script>
        <script src="https://kit.fontawesome.com/ca25c21894.js" crossorigin="anonymous"></script>


    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light border-bot-header bg-1">
        <a class="navbar-brand d-flex align-items-center" href="accueil.php"><i class="fas fa-arrow-left"></i><h5 class="ml-2 align-items-center my-0">Retour à l'accueil.</h5></a>
            <!-- <div class="collapse navbar-collapse" id="navbarText">
                <span class="navbar-text text-dark"> -->
                <!-- </span>
            </div> -->
        </nav>
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="offset-lg-1 col-lg-10 mt-2 bg-grey-light">
                    <a href="displayModalAddInDatabase.php" id="modalAdd" class="" data-toggle="modal" data-target="#add"><i class="fas fa-plus mb-2 mt-2 ml-2"></i></a>
                    <div id="pload"></div>
                    <select class="form-control mt-2" id="tableSelect" name="tableSelect">
                    <?php
                        $controlAdminDAO = new ControlAdminDataAccessDataAccess();
                        $controlAdminService = new ControlAdminService($controlAdminDAO);
                        $data = $controlAdminService->serviceSelectTable();
                        foreach($data as $array){
                            if($array["table_name"] == "etre_favoris"){
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
