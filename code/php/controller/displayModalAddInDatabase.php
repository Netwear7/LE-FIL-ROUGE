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
    
    include_once("../data-access/ControlAdminDataAccess.php");
    include_once("../data-access/EspeceDataAccess.php");
    include_once("../data-access/CouleurAnimalDataAccess.php");
    include_once("../data-access/UtilisateurDataAccess.php");
    include_once("../data-access/AnimauxDataAccess.php");
    include_once("../data-access/AdresseDataAccess.php");
    include_once("../data-access/RefugeDataAccess.php");
    include_once("../data-access/RaceDataAccess.php");
    include_once("../data-access/MaladieDataAccess.php");

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

    function CreateFormbyTable($table){
        switch($table){
            case "adresse" :
                // echo makeInput("text", "Numero", "numero");
                    // echo makeInput("text", "Rue", "rue");
                    // echo makeInput("text", "Ville", "ville");
                    // echo makeInput("number", "Code Postal", "codePostal");
                echo "Insérer un refuge pour inserer une adresse.";
            break;
            case "avoir_couleur":
                echo "Renseigner la couleur dans le formulaire animal.";
            break;
            case "est_infecte_par":
                echo "Renseigner une maladie dans le formulaire animal.";
            break;
            case "appartenir_espece":
                echo makeSelect("race");
                echo makeSelect("espece");
            break;
            case "espece_avoir_maladie":
                echo makeSelect("maladie");
                echo makeSelect("espece");
            break;
            case "animaux": 
                echo '<div class="col-4 offset-4"><input type="file" id="photo" accept="image/png, image/jpeg"></div>';
                echo '<div class="row">';
                    echo '<div class="col-lg-6">';
                    echo makeInput("text", "Nom", "nomAnimal");
                    echo makeInput("date", "Date de naissance", "dateNaissance");
                    echo makeInput("number", "Poids", "poids");
                    echo makeInput("text", "Numéro puce", "numeroPuce");
                    echo makeInput("text", "Caractère", "caractere");
                    echo makeInput("text", "Spécificités", "specificites");
                    echo makeInput("text", "Taille", "taille");
                    echo makeSelect("maladie");
                    
                    echo '</div>';
                    echo '<div class="col-lg-6">';
                    
                    echo makeInput("date", "Date arrivée", "dateArrivee");
                    echo makeInput("date", "Date sortie", "dateSortie");
                    echo makeInput("text", "Sexe", "sexe");     
                    echo makeInput("text", "Robe", "robe");
                    echo makeSelect("race");
                    echo makeSelect("couleur_animal");
                    echo makeSelect("refuge");
                    echo '</div>';
                echo '</div>';
            break;
            case "contactez_nous":
                echo makeInput("text", "Message", "message");
                echo makeInput("text", "Motif", "motif");
                echo makeInput("text", "Nom", "name");
                echo makeInput("text", "Prénom", "fname");
                echo makeSelect("utilisateur"); 
            break;
            case "donation":
                echo "Impossible d'insérer une donation depuis la page administrateur.";
            break;
            case "couleur_animal":
                echo makeInput("text", "Couleur", "couleur");
            break;
            case "espece":
                echo makeInput("text", "Nom espèce", "nomEspece");
            break;
            case "garderie" :
                echo "Seuls les utilisateurs peuvent faire une réservation.";
            break;
            case "maladie" :
                echo makeInput("text", "Maladie", "maladie");
                // echo makeInput("number", "Urgence boléen (1)", "urgence");
                echo '<input type="checkbox" name="urgence" aria-label="urgence maladie animal"> Urgence';
                echo "<hr>";
            break;
            case "perte" :
                echo makeInput("date", "Date perte animal", "datePerte");
                echo makeInput("text", "Description", "precisionPerte");
                echo makeSelect("animaux");
                
            break;
            case "photo_animal" :
                echo '<div class="col-4 offset-4"><input type="file" id="photo" accept="image/png, image/jpeg"></div>';
                echo '<div class="text-center mb-0 mt-1 "><input type="checkbox" class="text-center" name="photoProfil" aria-label="Photo de profil" checked> Photo de profil</div>';
                echo "<br>";
                // echo makeInput("text", "Nom", "name");
                // echo makeInput("text", "Taille", "size");
                // echo makeInput("text", "Type", "type");
                echo makeSelect("animaux");
            break;
            case "race" :
                echo makeInput("text", "Race", "race");
            break;
            case "refuge" :
                echo makeInput("text", "Région", "region");
                echo makeInput("text", "Département", "departement");
                echo makeInput("mail", "Email", "email");
                echo makeInput("text", "Numéro", "num");
                echo "<hr>";
                echo makeInput("text", "Numero", "NUMERO");
                echo makeInput("text", "Rue", "RUE");
                echo makeInput("text", "Ville", "VILLE");
                echo makeInput("number", "Code Postal", "CODE_POSTAL");
            break;
            case "utilisateur" :
                echo "L'inscription se fait via l'accueil du site. Pour insérer un nouvel administrateur veuiller contacter l'administration.";
            break;
        }
    }
?>
<!-- Modal -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="create" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <?php
                    $result = ($_POST["table"] == "animaux")? "animal" : $_POST["table"];
                    echo "<h5 class='modal-title' id='exampleModalLabel'>Ajouter un(e) ". $result ."</h5>";
                ?>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="POST" id="form-add" enctype="multipart/form-data">
                <input type="text" class="form-control" style="display: none;" id="action" name="action" value="add">

                    <?php
                        // $ColumnTable = GetDataOfSelectedTable($_POST["table"]);
                        if(isset($_POST["table"]) && !empty($_POST["table"])){
                            CreateFormbyTable($_POST["table"]);
                        }
                        $result = ($_POST["table"] == "animaux")? "animal" : $_POST["table"];
                        if($_POST["table"] != "adresse" 
                        && $_POST["table"] != "donation"
                        && $_POST["table"] != "garderie"
                        && $_POST["table"] != "utilisateur"
                        && $_POST["table"] != "est_infecte_par"
                        && $_POST["table"] != "avoir_couleur"
                        ){
                            echo "<button type='button' data-dismiss='modal' id='addInDatabase' class='btn btn-primary'>Ajouter un(e) $result</button>";
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>