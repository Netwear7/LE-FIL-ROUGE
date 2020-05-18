<?php
    include_once("../service/ControlAdminService.php");
    include_once("../service/CouleurAnimalService.php");
    include_once("../service/UtilisateurService.php");
    include_once("../service/AnimauxService.php");
    include_once("../service/AdresseService.php");
    include_once("../service/RefugeService.php");
    include_once("../service/RaceService.php");
    include_once("../service/MaladieService.php");
    include_once("../service/EspeceService.php");
    include_once("../service/PerteService.php");
    
    include_once("../data-access/ControlAdminDataAccess.php");
    include_once("../data-access/EspeceDataAccess.php");
    include_once("../data-access/CouleurAnimalDataAccess.php");
    include_once("../data-access/UtilisateurDataAccess.php");
    include_once("../data-access/AnimauxDataAccess.php");
    include_once("../data-access/AdresseDataAccess.php");
    include_once("../data-access/RefugeDataAccess.php");
    include_once("../data-access/RaceDataAccess.php");
    include_once("../data-access/MaladieDataAccess.php");
    include_once("../data-access/PerteDataAccess.php");

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
    function makeInput($type, $label, $id){
        if($type != "file"){
            $input = "<div class='form-group'>
                        <label for='$id'>$label</label>
                        <input type='$type' class='form-control' id='$id' name='$id' placeholder='$label'>
                      </div>";
        }
        else{
            $input = "<div class='form-group'>
                        <label for='$id'>$label</label>
                        <input type='$type' accept='image/*' class='form-control' name='$id' id='$id' placeholder='$label'>
                    </div>";

        }
        return $input;
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
    function getRowOfSelectedTable($table, $id){
        $SelectedTableDAO = ConcatTableDataAccess($table);
        $SelectedTableService = ConcatTableService($table, $SelectedTableDAO);
        if($table == "animaux"){
            return $SelectedTableService->serviceSelectId($id);
        }elseif($table == "perte"){
            return $SelectedTableService->serviceSelectIdPerte($id);
        }
        else{
            return $SelectedTableService->serviceSelect($id);
        }
    }

    function makeOption($table, $data, $select){
        switch($table){
            case "race":
                foreach($data as $array){
                    $select .= " <option value=' " . $array["ID_RACE"] . "'>" . $array["NOM_RACE"] . "</option>";
                }
                return $select;
            break;
            case "espece":
                foreach($data as $array){
                    $select .= " <option value=' " . $array["ID_ESPECE"] . "'>" . $array["NOM_ESPECE"] . "</option>";
                }
                return $select;
            break;
            case "maladie":
                if($table != "espece_avoir_maladie"){
                    $select .= " <option value='none'>Aucune Maladie</option>";
                }
                foreach($data as $array){
                    $select .= " <option value=' " . $array["ID_MALADIE"] . "'>" . $array["MALADIE"] . "</option>";
                }
                return $select;
            break;
            case "OnlyMaladie":
                foreach($data as $array){
                    $select .= " <option value=' " . $array["ID_MALADIE"] . "'>" . $array["MALADIE"] . "</option>";
                }
                return $select;
            break;

            case "couleur_animal":
                foreach($data as $array){
                    $select .= '<option value='.$array["ID_COULEUR"].'>'. $array["COULEUR"] .'</option>';
                }
                return $select;
            break;
            case "utilisateur":
                foreach($data as $array){
                    $select .= '<option value='.$array["ID_UTILISATEUR"].'>(ID:'.$array["ID_UTILISATEUR"] .") ". $array["NOM"]." ". $array["NOM"].'</option>';
                }
                return $select;
            break;
            case "refuge":
                foreach($data as $array){
                    $select .= '<option value='.$array["ID_REFUGE"].'>(ID: '.$array["ID_REFUGE"].") ".$array["REGION"] ." ". $array["DEPARTEMENT"].'</option>';
                }
                return $select;
            break;
            case "animaux":
                foreach($data as $array){
                    $select .= '<option value='.$array["ID_ANIMAL"].'>(ID: '.$array["ID_ANIMAL"] .") ". $array["NOM"].'</option>';
                }
                return $select;
            break;
            case "adresse":
                foreach($data as $array){
                    $select .= '<option value='.$array["ID_ADRESSE"].'>(ID: '.$array["ID_ADRESSE"].") ".$array["NUMERO"] ." ". $array["RUE"]." ". $array["VILLE"].'</option>';
                }
                return $select;
            break;
        }
    }

    function makeSelect($table){
        if($table == "couleur_animal"){
            $table = "couleur";
        }
        $select = "<label for='$table-select'>$table :</label>";

        $select .= "<select class='form-control mb-3' id='$table-select' name='$table'>";
        if($table == "couleur"){
            $table = "couleur_animal";
        }
        $selectedTableDao = ConcatTableDataAccess($table);
        $selectedTableService = ConcatTableService($table, $selectedTableDao);
        $data = $selectedTableService->serviceSelectAll();
        $select = makeOption($table, $data, $select);
        $select .= "</select>";
        return $select;
    }

    function CreateFormbyTable($table, $data){
        switch($table){
            //DONE
            case "adresse" :
                echo '<input type="text" class="form-control" style="display: none;" id="id" name="id" value="'.$data[0]["ID_ADRESSE"].'">

                        <div class="form-group">
                            <label for="numero">Numéro :</label>
                            <input type="number" class="form-control" id="numero" name="NUMERO" placeholder="Nom" value="'.$data[0]["NUMERO"].'">

                        </div><div class="form-group">
                            <label for="rue">Rue :</label>
                            <input type="text" class="form-control" id="rue" name="RUE" placeholder="Date de naissance" value="'.$data[0]["RUE"].'">
                        
                            </div>
                            
                            <div class="form-group">
                            <label for="ville">Ville :</label>
                            <input type="text" class="form-control" id="ville" name="VILLE" placeholder="Ex : Paris" value="'.$data[0]["VILLE"].'">
                        </div>
                        
                        <div class="form-group">
                            <label for="codePostal">Code postal :</label>
                            <input type="text" class="form-control" id="codePostal" name="CODE_POSTAL" placeholder="Ex : 78411" value="'.$data[0]["CODE_POSTAL"].'">
                        </div>';
            break;
            //DONE
            case "animaux":     

                // echo '<div class="col-4 offset-4"><input type="file" id="photo" accept="image/png, image/jpeg"></div>';
                echo'<div class="row">';
                echo '<input type="text" class="form-control" style="display: none;" id="id" name="id" value="'.$data["ID_ANIMAL"].'">
                <div class="col-lg-6">';
                    echo '<div class="form-group">
                            <label for="nomAnimal">Nom</label>
                            <input type="text" class="form-control" id="nomAnimal" name="nomAnimal" placeholder="Nom" value="'.$data["NOM"].'">

                        </div><div class="form-group">
                            <label for="dateNaissance">Date de naissance</label>
                            <input type="date" class="form-control" id="dateNaissance" name="dateNaissance" placeholder="Date de naissance" value="'.$data["DATE_NAISSANCE"].'">
                        
                            </div>
                            
                            <div class="form-group">
                            <label for="poids">Poids</label>
                            <input type="number" class="form-control" id="poids" name="POIDS" placeholder="Poids" value="'.$data["POIDS"].'">
                        </div>
                        
                        <div class="form-group">
                            <label for="numeroPuce">Numéro puce</label>
                            <input type="text" class="form-control" id="numeroPuce" name="NO_PUCE" placeholder="Numéro puce" value="'.$data["NO_PUCE"].'">
                        </div>';
                    
                    echo '</div>';
                    echo '<div class="col-lg-6">';
                            echo '<div class="form-group">
                            <label for="caractere">Caractère</label>
                            <input type="text" class="form-control" id="caractere" name="CARACTERE" placeholder="Caractère" value="'.$data["CARACTERE"].'">
                        </div>
                        
                        <div class="form-group">
                            <label for="specificites">Spécificités</label>
                            <input type="text" class="form-control" id="specificites" name="SPECIFICITE" placeholder="Spécificités" value="'.$data["SPECIFICITE"].'">
                        </div>
                        
                        <div class="form-group">
                        <label for="taille">Taille</label>
                        <input type="number" class="form-control" id="taille" name="TAILLE" placeholder="Taille" value="'.$data["TAILLE"].'">
                        </div>';
                    echo '</div>';
                echo '</div>';
            break;
            //DONE
            case "espece":
                // echo makeInput("text", "Nom espèce", "nomEspece");
                echo '<input type="text" class="form-control" style="display: none;" id="id" name="id" value="'.$data[0]["ID_ESPECE"].'">

                        <div class="form-group">
                            <label for="nomEspece">Nom de l\'espece :</label>
                            <input type="text" class="form-control" id="nomEspece" name="NOM_ESPECE" placeholder="Nom" value="'.$data[0]["NOM_ESPECE"].'">
                        </div>';
            break;
            //DONE
            case "maladie" :
                echo '<input type="text" class="form-control" style="display: none;" id="id" name="id" value="'.$data[0]["ID_MALADIE"].'">

                        <div class="form-group">
                            <label for="maladie">Nom de l\'espece :</label>
                            <input type="text" class="form-control" id="maladie" name="MALADIE" placeholder="Maladie" value="'.$data[0]["MALADIE"].'">
                        </div>';
                if($data[0]["URGENCE"] == "1"){
                    echo '<input type="checkbox" id="checkbox" name="URGENCE" aria-label="urgence maladie animal" checked> Urgence';
                }
                else{
                    echo '<input type="checkbox" id="checkbox" name="URGENCE" aria-label="urgence maladie animal"> Urgence';
                }
                echo "<hr>";
            break; 
            //DONE 
            case "perte" :
                echo '<input type="text" class="form-control" style="display: none;" id="id" name="id" value="'.$data["ID_PERTE"].'">

                <div class="form-group">
                    <label for="datePerte">Région :</label>
                    <input type="date" class="form-control" id="datePerte" name="DATE_PERTE" value="'.$data["DATE_PERTE"].'">
                </div>

                <div class="form-group">
                    <label for="descPerte">Région :</label>
                    <input type="text" class="form-control" id="descPerte" name="DESC_PERTE" placeholder="Description de la perte" value="'.$data["DESC_PERTE"].'">
                </div>
                ';
                
            break;
            //DONE
            case "refuge" :
                echo '<input type="text" class="form-control" style="display: none;" id="id" name="id" value="'.$data["ID_REFUGE"].'">

                <div class="form-group">
                    <label for="region">Région :</label>
                    <input type="text" class="form-control" id="region" name="REGION" placeholder="Région" value="'.$data["REGION"].'">
                </div>

                <div class="form-group">
                    <label for="departement">Département :</label>
                    <input type="text" class="form-control" id="departement" name="DEPARTEMENT" placeholder="Maladie" value="'.$data["DEPARTEMENT"].'">
                </div>

                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" class="form-control" id="email" name="EMAIL" placeholder="Email" value="'.$data["EMAIL"].'">
                </div>

                <div class="form-group">
                    <label for="num">Téléphone :</label>
                    <input type="text" class="form-control" id="num" name="TELEPHONE" placeholder="Ex : 03 00 00 00 00" value="'.$data["TELEPHONE"].'">
                </div>';
            break;
        }
    }
?>
<!-- Modal -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="update" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <?php
                    $result = ($_POST["table"] == "animaux")? "animal" : $_POST["table"];
                    echo "<h5 class='modal-title' id='exampleModalLabel'>Modifier un(e) ". $result ."</h5>";
                ?>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="POST" id="form-update" enctype="multipart/form-data">
                <input type="text" class="form-control" style="display: none;" id="action" name="action" value="update">
                    <?php
                        // $ColumnTable = GetDataOfSelectedTable($_POST["table"]);
                        if(isset($_POST["id"]) && isset($_POST["table"])){
                            $data = getRowOfSelectedTable($_POST["table"], $_POST["id"]);
                            CreateFormbyTable($_POST["table"], $data);
                        }
                        // if(isset($_POST["table"]) && !empty($_POST["table"])){
                        // }
                        
                        $result = ($_POST["table"] == "animaux")? "animal" : $_POST["table"];
                        if($_POST["table"] != "donation"
                        && $_POST["table"] != "garderie"
                        && $_POST["table"] != "utilisateur"
                        && $_POST["table"] != "est_infecte_par"
                        && $_POST["table"] != "avoir_couleur"
                        ){
                            echo "<button type='button' data-dismiss='modal' id='updateInDatabase' class='btn btn-primary'>Modifier un(e) $result</button>";
                        }

                    ?>
                </form>
            </div>
        </div>
    </div>
</div>