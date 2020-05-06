<?php


include_once '../model/Utilisateur.php';
include_once '../service/UtilisateurService.php';
include_once '../data-access/UtilisateurDataAccess.php';
include_once '../model/Adresse.php';
include_once '../service/AdresseService.php';
include_once '../data-access/AdresseDataAccess.php';
include_once '../model/Animaux.php';
include_once '../service/AnimauxService.php';
include_once '../data-access/AnimauxDataAccess.php';
include_once '../model/PhotoAnimal.php';
include_once '../service/PhotoAnimalService.php';
include_once '../data-access/PhotoAnimalDataAccess.php';
include_once '../service/RaceService.php';
include_once '../data-access/RaceDataAccess.php';
include_once '../model/AvoirCouleur.php';
include_once '../service/AvoirCouleurService.php';
include_once '../data-access/AvoirCouleurDataAccess.php';
include_once '../model/Perte.php';
include_once '../service/PerteService.php';
include_once '../data-access/PerteDataAccess.php';
include_once '../model/AnimauxFavoris.php';
include_once '../service/AnimauxFavorisService.php';
include_once '../data-access/AnimauxFavorisDataAccess.php';
include_once '../controller/displayUserAnimals.php';
include_once '../controller/displayDonationsInMyAccount.php';


session_start();

if(isset($_SESSION["user_id"]))
{

    $daoUtilisateur = new UtilisateurDataAccess();
    $serviceUtilisateur = new UtilisateurService($daoUtilisateur);

    $daoAnimaux = new AnimauxDataAccess();
    $serviceAnimaux = new AnimauxService($daoAnimaux);

    $daoAnimauxFavoris = new AnimauxFavorisDataAccess();
    $serviceAnimauxFavoris = new AnimauxFavorisService($daoAnimauxFavoris);

    $daoPerte = new PerteDataAccess();
    $servicePerte = new PerteService($daoPerte);

    $avoirCouleurDao = new AvoirCouleurDataAccess();
    $avoirCouleurService = new AvoirCouleurService($avoirCouleurDao);

    $raceDao = new RaceDataAccess();
    $raceService = new RaceService($raceDao);

    $photoAnimalDao = New PhotoAnimalDataAccess();
    $photoAnimalService = New PhotoAnimalService($photoAnimalDao);



} else {
    header('Location: accueil.php');
    exit;
}

if(isset($_POST["updatePassword"])){


    $mdpActuel = $_POST["actual"];
    if ($_POST["confirmedNew"] == $_POST["newPassword"]) {
        $result = $serviceUtilisateur->serviceVerifyActualPassword($_SESSION["user_id"],$mdpActuel);
        if ($result == true){
            if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{6,}$#', $_POST["confirmedNew"])) {
                $resultUpdate = $serviceUtilisateur->serviceUpdatePassword($_SESSION["user_id"],$_POST); 
                if($resultUpdate == true){
                    $result = '<div class="alert alert-success col-12 mt-2 text-center" role="alert">La modification du mot de passe a bien été effectuée  !</div>';
                    $return_arr[] = array("success" => $result,"code" => "111");
                    echo json_encode($result);
                }
            } else {
                $result = '<div class="alert alert-warning col-12 mt-2 text-center" role="alert">Le mot de passe doit contenir entre 0 et 9 caractères et contenir au moins un caractère spécial !</div>';
                $return_arr[] = array("error" => $result,"code" => "888");
                echo json_encode($result);
            }

        } else {
            $result ='<div class="alert alert-warning col-12 mt-2 text-center" role="alert">
            Les mots de passes ne correspondent pas !
            </div>';
            $return_arr[] = array("error" => $result,"code" => "999");
            return json_encode($return_arr);
        }

        
    }    
}

if (isset($_POST["updateUserInfos"])){
                                            
    $serviceUtilisateur->serviceUpdate($_POST);


} 

if(isset($_POST["retraitFavoris"])){
    $serviceAnimauxFavoris->serviceDelete($_POST);
}


if (isset($_POST["delete"])){

    $serviceUtilisateur->serviceDelete($nom);
    header('Location: accueil.php');
    exit;

}

if (isset($_POST["updateUserInfos"])){
                                            
    if($serviceUtilisateur->serviceUpdate($_POST)){
        return json_encode('success');
    }


} 

if (isset($_POST["addAnimal"])){

    if(empty($_POST["nomAnimal"])){
        $response_array['status'] = 'error';  
        $response_array['message'] = 'Le nom ne peux être vide !';
        header('Content-type: application/json; charset=UTF-8');
        $error = (json_encode($response_array));
        return $error;
    }else {
    
        $animal = new Animaux($_POST);
        $serviceAnimaux->serviceAddUserAnimal($animal);
        $avoirCouleur = new AvoirCouleur($animal);
        $avoirCouleurService->serviceAdd($avoirCouleur);
        if (!$_FILES["photo"]) {
            echo "Problème de transfert";
            return json_encode("error");
        } else {

            $photoAnimal = new PhotoAnimal($_FILES["photo"], $animal->getIdAnimal());
            $photoAnimalService->serviceAdd($photoAnimal);
            return json_encode("success");
        }
    }
    
}
    


if (isset($_POST["updateAnimalInfos"])){
                                            
    $serviceAnimaux->serviceUpdate($_POST);
    $ret        = is_uploaded_file($_FILES['photo']['tmp_name']);    
    if ($ret) {
        $photoAnimal = new PhotoAnimal($_FILES, $_POST["idAnimal"]);
        $photoAnimalService->Update($photoAnimal);
    }

}

if (isset($_POST["removeUserAnimal"])){

    $photoAnimalService->serviceDelete($_POST);
    $avoirCouleurService->serviceDelete($_POST);
    $serviceAnimaux->serviceDelete($_POST);
}

if (isset($_POST["perte"])){
    $perte = new Perte($_POST);
    $servicePerte->serviceAdd($perte);
}

if(isset($_POST["idAnimalRetrouve"])){
    $servicePerte->serviceDelete($_POST["idAnimalRetrouve"]);
}


