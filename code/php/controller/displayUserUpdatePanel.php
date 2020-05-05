<?php

include_once '../service/UtilisateurService.php';
include_once '../data-access/UtilisateurDataAccess.php';

$daoUtilisateur = new UtilisateurDataAccess();
$serviceUtilisateur = new UtilisateurService($daoUtilisateur);
$data = $serviceUtilisateur->serviceSelect($_SESSION["user_id"]); 
echo 
'

    <!--PARTIE MODIFIER DU PREMIER SLIDE infos personnelles-->
    <div class="tab-pane fade mb-5 " id="updateUserInfosPanel" role="tabpanel" aria-labelledby="list-updateInfo-list">
        <div class="row">
            <div class="col-8 offset-2 text-center border rounded border-black mt-5">
                <h3 class="mt-1">Mes Informations Personnelles</h3>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-8 offset-2 border rounded border-black ">
                <form  id="updateUserInfos">     
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
                                        <button type="button submit" class="btn btn-outline-primary" name="updateUserInfos">Valider les modifications</button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="row justify-content-center">
                                        <button type="button" class="btn btn-outline-secondary">Annuler les modifications</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                                  
                </form>  
            </div>
        </div>
        <div class="row mb-3" id="resultModificationInfos">

        </div>
    </div>

';