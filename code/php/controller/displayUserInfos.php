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
    <div class="col-8 offset-2 border rounded border-black mt-2 id="infosPanel"">
        <div class="row ">
            <div class="col-lg-6 mt-3">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 pb-2">
                        <div class="row">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item bg-grey-light"><strong>Nom :</strong> '. $data["NOM"].'</li>
                                <li class="list-group-item bg-grey-light"><strong>Prénom :</strong> '.  $data["PRENOM"].'</li>
                                <li class="list-group-item bg-grey-light"><strong>Tel :</strong> '. $data["NUM"] .'</li>
                                <li class="list-group-item bg-grey-light"><strong>Email :</strong> '.$data["ADRESSE_EMAIL"].'</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-3">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 pb-2 ">
                        <div class="row">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item bg-grey-light"><strong>Adresse : </strong> '. $data["NUMERO"]." ".$data["RUE"]. '  </li>
                                <li class="list-group-item bg-grey-light"><strong>Ville :</strong> '. $data["VILLE"].' </li>
                                <li class="list-group-item bg-grey-light"><strong>Code Postal : </strong>'. $data["CODE_POSTAL"].' </li>
                                <li class="list-group-item bg-grey-light"><strong>Pays : </strong> France </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ';




