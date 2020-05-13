<?php

include_once '../service/UtilisateurService.php';
include_once '../data-access/UtilisateurDataAccess.php';

include_once '../model/Utilisateur.php';
include_once '../model/Adresse.php';
include_once '../service/AdresseService.php';
include_once '../data-access/AdresseDataAccess.php';

session_start();

$daoUtilisateur = new UtilisateurDataAccess();
$serviceUtilisateur = new UtilisateurService($daoUtilisateur);
$data = $serviceUtilisateur->serviceSelect($_SESSION["user_id"]); 
echo 
'



    <div class="row mt-2">
        <div class="col-8 offset-2">
                     
                <div class="row" >
                    <div class="col-lg-6 col-sm-12">
                        <ul class="list-group list-group-flush bg-grey-light">
                            <li class="list-group-item bg-grey-light ">
                                <label for="userName">Nom :</label>
                                <input type="text" maxlength="50" class="form-control" id="NOM"  value="'. $data["NOM"].'" aria-describedby="UserName">
                            </li>
                            <li class="list-group-item bg-grey-light">
                                <label for="userNickName">Prénom :</label>
                                <input type="text" maxlength="50" class="form-control" id="PRENOM"  value="'. $data["PRENOM"].'" aria-describedby="UserNickName">
                            </li>
                            <li class="list-group-item bg-grey-light">
                                <label for="userPhone">Tel :</label>
                                <input type="text" maxlength="50" class="form-control" id="NUM"  value="'. $data["NUM"].'" aria-describedby="UserPhone">
                            </li>
                            <li class="list-group-item bg-grey-light">
                                <label for="userMail">Adresse mail : </label>
                                <input type="email" class="form-control"  aria-describedby="emailHelp" id="ADRESSE_EMAIL" value="'. $data["ADRESSE_EMAIL"].'">
                                <small id="emailHelp" class="form-text text-muted">Nous ne partagerons pas votre adresse mail</small>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-grey-light">
                                <label for="userAdress">Numero :</label>
                                <input type="text" maxlength="50" class="form-control" id="NUMERO" value="'. $data["NUMERO"].'" aria-describedby="UserAdressNumber">
                            </li>
                            <li class="list-group-item bg-grey-light">
                                <label for="userAdress">Rue :</label>
                                <input type="text" maxlength="50" class="form-control" id="RUE" value="'. $data["RUE"].'" aria-describedby="UserRue">
                            </li>
                            <li class="list-group-item bg-grey-light">
                                <label for="userCP">Code Postal : </label>
                                <input type="text" maxlength="50" class="form-control" id="CODE_POSTAL" value="'. $data["CODE_POSTAL"].'" aria-describedby="UserC">
                            </li>
                            <li class="list-group-item bg-grey-light">
                                <label for="userTown">Ville : </label>
                                <input type="text" maxlength="50" class="form-control" id="VILLE" value="'. $data["VILLE"].'" aria-describedby="UserVille">                                
                            </li>
                        </ul>
                    </div>
                </div>
                <!--PARTIE OU IL Y A LES BOUTONS VALIDER ET ANNULER -->
                <div class="row">
                    <div class="col-8 offset-2 borber rounded border-black mt-2">
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 ">
                                <div class="row justify-content-center">
                                    <input type="hidden" id="idUtilisateur" value="'.$data["ID_UTILISATEUR"].'"/>
                                    <input type="hidden" id="idAdresse" value="'.$data["ID_ADRESSE"].'"/>
                                    <button type="button submit" class="btn btn-outline-primary" id="updateUserInfosBtn" name="updateUserInfos">Valider les modifications</button>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="row justify-content-center">
                                    <button type="button" id="abortUpdateUserInfos" class="btn btn-outline-secondary" data-toggle="list" >Annuler les modifications</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                                  
                 
            </div>
            
        </div>


';

?>

<script src="../../javascript/abortUpdateUserInfos.js"></script>