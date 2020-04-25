<?php 
    include_once("../service/ControlAdminService.php");
    include_once("../data-access/ControlAdminDataAccess.php");
    session_start();

    function GetSelectedTable($table){
        $classnameDAO = $table.'DataAccess';
        $classnameService = $table.'Service';

        $SelectedTableDAO = new $classnameDAO;
        $SelectedTableService =new $classnameService($SelectedTableDAO);
        $data = $SelectedTableService->$e;
        return $data;
    }

    function DisplayTable($data){
        $controlAdminDAO = new ControlAdminDataAccessDataAccess();
        $controlAdminService = new ControlAdminService($controlAdminDAO);
        $table = $_POST["table"];
        $tableColumn = $controlAdminService->serviceSelectTableColumn($table);
        foreach($tableColumn as $colName){
            echo $colName;
        }
        switch($table){
            case "adresse":
                $adresseDAO = new AdresseDataAccess();
                $adresseService = new AdresseService($adresseDAO);
            case "animaux":
                $animauxDAO = new AnimauxDataAccess();
                $animauxService = new AnimauxService($animauxDAO);
            case "contactez_nous":
                $contactez_nousDAO = new AnimauxDataAccess();
                $contactez_nousService = new AnimauxService($contactez_nousDAO);
            case "couleur_animal":
                $animauxDAO = new AnimauxDataAccess();
                $animauxService = new AnimauxService($animauxDAO);
            case "espece":
                $animauxDAO = new AnimauxDataAccess();
                $animauxService = new AnimauxService($animauxDAO);
            case "garderie":
                $animauxDAO = new AnimauxDataAccess();
                $animauxService = new AnimauxService($animauxDAO);
            case "img_site":
                $animauxDAO = new AnimauxDataAccess();
                $animauxService = new AnimauxService($animauxDAO);
            case "maladie":
                $animauxDAO = new AnimauxDataAccess();
                $animauxService = new AnimauxService($animauxDAO);
            case "perte":
                $animauxDAO = new AnimauxDataAccess();
                $animauxService = new AnimauxService($animauxDAO);
            case "photo_animal":
                $animauxDAO = new AnimauxDataAccess();
                $animauxService = new AnimauxService($animauxDAO);
            case "race":
                $animauxDAO = new AnimauxDataAccess();
                $animauxService = new AnimauxService($animauxDAO);
            case "refuge":
                $animauxDAO = new AnimauxDataAccess();
                $animauxService = new AnimauxService($animauxDAO);
            case "utilisateur":
                $animauxDAO = new AnimauxDataAccess();
                $animauxService = new AnimauxService($animauxDAO);
            case "default": 
        }
        $data = GetSelectedTable($table);
        



        
        for($i=0; $i < count($data); $i++){
            echo "<tr><td>" . $data[$i]["NOEMP"] . "</td>";
            echo "<td>" . $data[$i]["NOM"] . "</td>";
            echo "<td>" . $data[$i]["PRENOM"] . "</td>";
            echo "<td>" . $data[$i]["EMPLOI"] . "</td>";
            echo "<td>" . $data[$i]["SUP"] . "</td>";
            echo "<td>" . $data[$i]["EMBAUCHE"] . "</td>";
            echo "<td>" . $data[$i]["SAL"] . "</td>";
            echo "<td>" . $data[$i]["COMM"] . "</td>";
            echo "<td>" . $data[$i]["NOSERV"] . "</td>";
            $numEmp = $data[$i]["NOEMP"];
            $noserv = $data[$i]["NOSERV"];
            if($_SESSION["role"] == "admin"){
                echo "<td> 
                <div class='row'>
                    <div class='col-lg-6'>
                        <a class='btn btn-outline-danger w-100 delete' data-noemp='$numEmp' role='button'>X</a>
                    </div> 
                
                    <div class='col-lg-6'>
                        <a class='btn btn-outline-primary w-100' href='add.php?noemp=$numEmp&noserv=$noserv' role='button'>Edit</a>
                    </div>
                </div>
                </td></tr>";
            }
        }
    }
?>


<table class="table table-hover">
    <?php
        if(isset($_POST["table"]) && !empty($_POST["table"])){
        echo "<caption> List of " .$_POST["table"]."</caption>";
        }
    ?>
    <thead class="thead-light">
        <tr>

        <?php
            if(isset($_POST["table"]) && !empty($_POST["table"])){
                $controlAdminDAO = new ControlAdminDataAccessDataAccess();
                $controlAdminService = new ControlAdminService($controlAdminDAO);
                $table = $_POST["table"];
                $tableColumn = $controlAdminService->serviceSelectTableColumn($table);
                foreach($tableColumn as $colName){
                    echo "<th scope='col'>".$colName["COLUMN_NAME"]."</th>";
                }

            }
        ?>
                <!-- if($_SESSION["role"] == "admin"){
                    echo '<th scope="col">Action</th>';
                } -->
            
           
        </tr>
    </thead>
    <tbody>
        <?php 

            // if(!isset($_POST["selection"]) && empty($_POST["selection"])){
            //     $employeService = new EmployeService();
            //     $data = $employeService->selectAllEmploye();
            //     DisplayTable($data);
            // }
            // if(isset($_POST["selection"])){
            //     $employeService = new EmployeService();
            //     $data = $employeService->search_Employe();
            //     DisplayTable($data);
            // }
        ?>
    </tbody>
</table>