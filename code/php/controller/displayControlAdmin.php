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
        include_once("../data-access/AvoirCouleurDataAccess.php");
        include_once("../data-access/AppartenirEspeceDataAccess.php");
        include_once("../data-access/EspeceAvoirMaladieDataAccess.php");
        include_once("../data-access/InfecteParDataAccess.php");
        include_once("../data-access/NewsDataAccess.php");
    
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
        include_once("../service/AppartenirEspeceService.php");
        include_once("../service/EspeceAvoirMaladieService.php");
        include_once("../service/InfecteParService.php");
        include_once("../service/NewsService.php");

    session_start();

    function GetDataOfSelectedTable($table){
        if($table == "EstInfectePar"){
            $table = "InfectePar";
        }
        $classnameDAO = $table.'DataAccess';
        $classnameService = $table.'Service';

        $SelectedTableDAO = new $classnameDAO;
        $SelectedTableService = new $classnameService($SelectedTableDAO);
        $data = $SelectedTableService->serviceSelectAll();
        return $data;
    }
    function GetColumnOfSelectedTable($table){
        $controlAdminDAO = new ControlAdminDataAccessDataAccess();
        $controlAdminService = new ControlAdminService($controlAdminDAO);
        $data = $controlAdminService->serviceSelectTableColumn($table);
        return $data;
    }

    function underscoreToCamelCase($string, $capitalizeFirstCharacter = false) {
        $str = str_replace(' ', '', ucwords(str_replace('_', ' ', $string)));
        if (!$capitalizeFirstCharacter) {
            $str[0] = strtoupper($str[0]);
        }
        return $str;
    }
    function DisplayTable(){
        $table = underscoreToCamelCase($_POST["table"]);
        $data = GetDataOfSelectedTable($table);
        // var_dump($data);
        
        foreach($data as $key => $row){
            $values = array_values($row);
            if(
                $_POST["table"] != "espece_avoir_maladie" &&
                $_POST["table"] != "avoir_couleur" &&
                $_POST["table"] != "est_infecte_par" &&
                $_POST["table"] != "garderie" &&
                $_POST["table"] != "photo_animal" &&
                $_POST["table"] != "couleur_animal" &&
                $_POST["table"] != "race" &&
                $_POST["table"] != "contactez_nous"
            ){
                echo "<tr>";
                echo "<td>";
                echo "<a href='#'  class='edit'><i class='far fa-edit mr-2'></i></a>";
            }


            if($_POST["table"] != "espece_avoir_maladie"
                && $_POST["table"] != "maladie"
                && $_POST["table"] != "donation"
                && $_POST["table"] != "avoir_couleur" 
                && $_POST["table"] != "garderie" 
                && $_POST["table"] != "couleur_animal" 
                && $_POST["table"] != "race" 
                && $_POST["table"] != "photo_animal" 
                && $_POST["table"] != "est_infecte_par" 
                && $_POST["table"] != "contactez_nous"
                && $_POST["table"] != "avoir_couleur"){
                echo "<a href='#' data-row='$values[0]' class='delete'><i class='far fa-times-circle text-danger'></i></a>";
            }
            if($_POST["table"] != "espece_avoir_maladie" 
                && $_POST["table"] != "contactez_nous" 
                && $_POST["table"] != "avoir_couleur" 
                && $_POST["table"] != "photo_animal" 
                && $_POST["table"] != "garderie" 
                && $_POST["table"] != "race" 
                && $_POST["table"] != "est_infecte_par" 
                && $_POST["table"] != "couleur_animal")
            {
                echo "</td>";
            }


            foreach($row as $key => $cell){
                if($key == "PHOTO"){
                    echo '<td><img class="img-round d-inline-block w-50 mx-3" src="data:image/png;base64,'.base64_encode($cell).'"/></td>';
                }
                elseif($key == "MDP"){
                    continue;
                }
                else{
                    echo "<td>". $cell. "</td>";
                }
            }
            echo "</tr>";
        }
    }
?>


<table class="table table-bordered table-hover mt-3">
    <?php
        if(isset($_POST["table"]) && !empty($_POST["table"])){
        echo "<caption> List of " .$_POST["table"]."</caption>";
        }
    ?>
    <thead class="thead-light text-center">
        <tr>
            <?php
                if(isset($_POST["table"]) && !empty($_POST["table"])){
                    $tableColumn = GetColumnOfSelectedTable($_POST["table"]);
                    if(
                        $_POST["table"] != "espece_avoir_maladie" &&
                        $_POST["table"] != "avoir_couleur" &&
                        $_POST["table"] != "est_infecte_par" &&
                        $_POST["table"] != "photo_animal" &&
                        $_POST["table"] != "race" &&
                        $_POST["table"] != "garderie" &&
                        $_POST["table"] != "couleur_animal" &&
                        $_POST["table"] != "contactez_nous"
                    ){
                        echo "<th>Actions</th>";
                    }
                    foreach($tableColumn as $colName){
                        if($colName["COLUMN_NAME"] == "MDP"){
                            continue;
                        }
                        else{
                            echo "<th scope='col'>".$colName["COLUMN_NAME"]."</th>";
                        }
                    }

                }
            ?>
            <!-- if($_SESSION["role"] == "admin"){
                echo '<th scope="col">Action</th>';
            } -->
        </tr>
    </thead>
    <tbody class="text-center">
        <?php 
            if(isset($_POST["table"]) && !empty($_POST["table"])){
                DisplayTable();
            }
        ?>
    </tbody>
</table>