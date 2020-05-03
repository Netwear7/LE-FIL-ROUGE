<?php

include_once '../service/UtilisateurService.php';
include_once '../data-access/UtilisateurDataAccess.php';

$daoUtilisateur = new UtilisateurDataAccess();
$serviceUtilisateur = new UtilisateurService($daoUtilisateur);

if (isset($_POST["mail"])){
    if($_POST["mail"] == ""){
        echo '
            <div class="alert alert-warning col-12 mt-2 text-center" role="alert">
            Veuillez renseigner une adresse mail !
            </div>';
    } else {
        $data = $serviceUtilisateur->serviceResetPassword($_POST["mail"]);
        if($data){
            echo '
                <div class="col-12 mt-2 alert alert-success text-center" role="alert">
                Un e-mail de réinitialisation de mot de passe vous à été envoyé !
                </div>';
        }else {
            echo '<div class="alert alert-warning col-12 mt-2 text-center" role="alert">
                Pas d\'Adresse mail correspondante !
                </div>';
        }
    }

}

?>