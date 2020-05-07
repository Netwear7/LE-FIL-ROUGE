<?php
    include_once("../service/ControlAdminService.php");
    include_once("../data-access/ControlAdminDataAccess.php");

    function GetColumnOfSelectedTable($table){
            $controlAdminDAO = new ControlAdminDataAccessDataAccess();
            $controlAdminService = new ControlAdminService($controlAdminDAO);
            $data = $controlAdminService->serviceSelectTableColumn($table);
            return $data;
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

    function CreateFormbyTable($table){
        switch($table){
            case "adresse" :
                // echo makeInput("text", "Numero", "numero");
                // echo makeInput("text", "Rue", "rue");
                // echo makeInput("text", "Ville", "ville");
                // echo makeInput("number", "Code Postal", "codePostal");
                echo "Insérer un utilisateur ou un refuge pour inserer une adresse.";
            break;
            case "animaux": 
                echo makeInput("text", "Nom", "nom");
                echo makeInput("date", "Date de naissance", "dateNaissance");
                echo makeInput("number", "Poids", "poids");
                echo makeInput("text", "Numéro puce", "puce");
                echo makeInput("text", "Caractère", "caractere");
                echo makeInput("text", "Spécificité", "specificite");
                echo makeInput("text", "Taille", "taille");
                echo makeInput("text", "Robe", "robe");
                echo makeInput("date", "Date arrivée", "dateArrivee");
                echo makeInput("date", "Date sortie", "datesortie");
                echo makeInput("text", "Sexe", "sexe");
                echo "select ID Race";
                echo "select ID User ou refuge pas les deux";
                echo "select Garderie";
            break;
            case "contactez_nous":
                echo makeInput("text", "Message", "message");
                echo makeInput("text", "Motif", "motif");
                echo makeInput("text", "Nom", "name");
                echo makeInput("text", "Prénom", "fname");
                echo makeInput("text", "Id utilisateur", "id");
            break;
            case "couleur_animal":
                echo makeInput("text", "Couleur", "couleur");
            break;
            case "espece":
                echo makeInput("text", "Nom espèce", "nomEspece");
            break;
            case "garderie" :
                echo makeInput("number", "Nombre de place", "nbrPlace");
                echo makeInput("date", "Date entrée", "dateEntree");
                echo makeInput("date", "Date sortie", "dateSortie");
                echo "select ID Refuge";
            break;
            case "maladie" :
                echo makeInput("text", "Maladie", "maladie");
                echo makeInput("number", "Urgence boléen (1)", "urgence");
            break;
            case "perte" :
                echo makeInput("date", "Date perte animal", "datePerte");
                echo makeInput("text", "Description", "description");
                echo "select ID Animal";
            break;
            case "photo_animal" :
                echo makeInput("file", "Photo", "photo");
                echo makeInput("number", "Boléen photo actuelle (1)", "photoBoleen");
                echo makeInput("text", "Nom", "nom");
                echo makeInput("text", "Taille", "taille");
                echo makeInput("text", "Type", "type");
                echo "select ID Animal";
            break;
            case "race" :
                echo makeInput("text", "Race", "race");
            break;
            case "refuge" :
                echo makeInput("text", "Région", "region");
                echo makeInput("text", "Département", "departement");
                echo "<hr>";
                echo makeInput("text", "Numero", "numero");
                echo makeInput("text", "Rue", "rue");
                echo makeInput("text", "Ville", "ville");
                echo makeInput("number", "Code Postal", "codePostal");
            break;
            case "utilisateur" :
                echo makeInput("text", "Nom", "nom");
                echo makeInput("text", "Prenom", "prenom");
                echo makeInput("text", "Pseudo", "pseudo");
                echo "<hr>";
                echo makeInput("text", "Numero", "numero");
                echo makeInput("text", "Rue", "rue");
                echo makeInput("text", "Ville", "ville");
                echo makeInput("number", "Code Postal", "codePostal");
            break;
        }
    }
?>
<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
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
                <form action="POST" id="form-admin">
                    <?php
                        // $ColumnTable = GetDataOfSelectedTable($_POST["table"]);
                        if(isset($_POST["table"]) && !empty($_POST["table"])){
                            CreateFormbyTable($_POST["table"]);
                        }
                        $result = ($_POST["table"] == "animaux")? "animal" : $_POST["table"];
                        if($_POST["table"] != "adresse"){
                            echo "<button type='button' id='addInDatabase' class='btn btn-primary'>Ajouter un(e) $result</button>";
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>