<?php

include_once '../service/UtilisateurService.php';
include_once '../data-access/UtilisateurDataAccess.php';

$daoUtilisateur = new UtilisateurDataAccess();
$serviceUtilisateur = new UtilisateurService($daoUtilisateur);

if (isset($_POST)){
    $data = $serviceUtilisateur->serviceResetPassword($_POST["mail"]);
    if($data){
        echo '
            <div class="col-12 mt-2 alert alert-success" role="alert">
            Un e-mail de réinitialisation de mot de passe vous à été envoyé !
            </div>';
    }else {
        echo '<div class="alert alert-warning col-12 mt-2" role="alert">
            Pas d\'Adresse mail correspondante !
            </div>';
    }
}

?>