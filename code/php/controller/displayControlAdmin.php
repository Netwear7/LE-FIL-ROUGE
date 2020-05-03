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

    function GetDataOfSelectedTable($table){
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
        
        
        foreach($data as $row){
            echo "<tr>";
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


<table class="table table-hover">
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
            if(isset($_POST["table"])){
                DisplayTable();
            }
        ?>
    </tbody>
</table>