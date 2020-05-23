<?php





session_start();

if(isset($_SESSION["user_role"]) && $_SESSION["user_role"] == "[admin]" )
{

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

    include_once '../model/Donation.php';
    include_once '../service/DonationService.php';
    include_once '../data-access/DonationDataAccess.php';


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

    $donDao = new DonationDataAccess();
    $donService = new DonationService($donDao);



} else {
    header('Location: accueil.php');
    exit;
}

if(isset($_POST["donation"])){
    if(!empty($_POST["montantLibreDonation"])){
        if(!preg_match("/^\d+$/",$_POST["montantLibreDonation"])){
            $response_array['status'] = '01'; 
            $response_array['message'] = 'Le montant de votre donation ne peux contenir que des chiffres !';
            header('Content-type: application/json; charset=UTF-8');
            $error = (json_encode($response_array));
            echo $error;
        }else {
            try{
                $don = new Donation($_POST,$_SESSION["user_id"]);
                $result = $donService->serviceAdd($don);
                if($result === 1){
                    $response_array['status'] = 'success'; 
                    $response_array['message'] = 'La donation à bien été effectuée, elle sera visible sur la partie "Mon Compte" onglet "Mes Dons" !';
                    header('Content-type: application/json; charset=UTF-8');
                    $success = (json_encode($response_array));
                    echo $success;
                } else {
                    $response_array['status'] = '04'; 
                    $response_array['message'] = 'Une erreur à eu lieue, veuillez réessayer ultérieurement';
                    header('Content-type: application/json; charset=UTF-8');
                    $error = (json_encode($response_array));
                    echo $error;
                }
            }catch (MysqliQueryException $mqe) {
                if ($mqe->getCode() == 1049) {
                                                        
                    $error = ' 507 Connexion a la base de donnée impossible !';
                    header($_SERVER['SERVER_PROTOCOL'].$error);
                                                                            
                } else if ($mqe->getCode() == 1146 ){
                    $error = ' 509 Erreur lors de l\'execution de la requête ';
                    header($_SERVER['SERVER_PROTOCOL'].$error);
                                                                            
                } else {
                    $error = ' 510 Une erreur est survenue merci de réessayer plus tard !';
                    header($_SERVER['SERVER_PROTOCOL'].$error);
                }
            }
        }
    } else {
        if(!empty($_POST["radioDonation"])){
            if(!preg_match("/^\d+$/",$_POST["radioDonation"])){
                $response_array['status'] = '05'; 
                $response_array['message'] = 'Le montant de votre donation ne peux contenir que des chiffres !';
                header('Content-type: application/json; charset=UTF-8');
                $error = (json_encode($response_array));
                echo $error;
            } else {
                try{
                    $don = new Donation($_POST,$_SESSION["user_id"]);
                    $result = $donService->serviceAdd($don);
                    if($result === 1){
                        $response_array['status'] = 'success'; 
                        $response_array['message'] = 'La donation à bien été effectuée, elle sera visible sur la partie "Mon Compte" onglet "Mes Donations" !';
                        header('Content-type: application/json; charset=UTF-8');
                        $error = (json_encode($response_array));
                        echo $error;
                    } else {
                        $response_array['status'] = '06'; 
                        $response_array['message'] = 'Une erreur à eu lieue, veuillez réessayer ultérieurement';
                        header('Content-type: application/json; charset=UTF-8');
                        $error = (json_encode($response_array));
                        echo $error;
                    }
                }catch (MysqliQueryException $mqe) {
                    if ($mqe->getCode() == 1049) {
                                                            
                        $error = ' 507 Connexion a la base de donnée impossible !';
                        header($_SERVER['SERVER_PROTOCOL'].$error);
                                                                                
                    } else if ($mqe->getCode() == 1146 ){
                        $error = ' 509 Erreur lors de l\'execution de la requête ';
                        header($_SERVER['SERVER_PROTOCOL'].$error);
                                                                                
                    } else {
                        $error = ' 510 Une erreur est survenue merci de réessayer plus tard !';
                        header($_SERVER['SERVER_PROTOCOL'].$error);
                    }
                }
            }
        }
    }
}

if(isset($_POST["updatePassword"])){

    if(empty($_POST["actual"]) || empty($_POST["newPassword"]) || empty($_POST["confirmedNew"])){
        $response_array['status'] = '03'; 
        $response_array['message'] = 'Veuillez remplir tout les champs !';
        header('Content-type: application/json; charset=UTF-8');
        $error = (json_encode($response_array));
        echo $error;
    } else {
        try{
            $mdpActuel = $_POST["actual"];
            if ($_POST["confirmedNew"] == $_POST["newPassword"]) {
                try{
                $result = $serviceUtilisateur->serviceVerifyActualPassword($_SESSION["user_id"],$mdpActuel);
                }catch (MysqliQueryException $mqe) {
                    if ($mqe->getCode() == 1049) {
        
                        $error = ' 507 Connexion a la base de donnée impossible !';
                        header($_SERVER['SERVER_PROTOCOL'].$error);
                        
                    } else if ($mqe->getCode() == 1146 ){
                        $error = ' 509 Erreur lors de l\'execution de la requête ';
                        header($_SERVER['SERVER_PROTOCOL'].$error);
                        
                    } else {
                        $error = ' 510 Une erreur est survenue merci de réessayer plus tard !';
                        header($_SERVER['SERVER_PROTOCOL'].$error);
                    }
                } 
                if ($result == true){
                    if (preg_match("/^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})/", $_POST["confirmedNew"])) {
                        $resultUpdate = $serviceUtilisateur->serviceUpdatePassword($_SESSION["user_id"],$_POST); 
                        if($resultUpdate == true){
                            $response_array['status'] = 'success'; 
                            $response_array['message'] = 'La modification du mot de passe à bien été effectuée ! ';
                            header('Content-type: application/json; charset=UTF-8');
                            $error = (json_encode($response_array));
                            echo $error;
                        }
                    } else {
                        $response_array['status'] = '01'; 
                        $response_array['message'] = 'Votre mot de passe doit faire au moins 6 caractères !';
                        header('Content-type: application/json; charset=UTF-8');
                        $error = (json_encode($response_array));
                        echo $error;
                    }
        
                } else {
                    $response_array['status'] = '02'; 
                    $response_array['message'] = 'Mot de passe incorrect !';
                    header('Content-type: application/json; charset=UTF-8');
                    $error = (json_encode($response_array));
                    echo $error;
                }            
            }else {
                $response_array['status'] = '04'; 
                $response_array['message'] = 'Veuillez vérifier vos nouveaux mots de passes !';
                header('Content-type: application/json; charset=UTF-8');
                $error = (json_encode($response_array));
                echo $error;
            }
        }catch (MysqliQueryException $mqe) {
            if ($mqe->getCode() == 1049) {

                $error = ' 507 Connexion a la base de donnée impossible !';
                header($_SERVER['SERVER_PROTOCOL'].$error);
                
            } else if ($mqe->getCode() == 1146 ){
                $error = ' 509 Erreur lors de l\'execution de la requête ';
                header($_SERVER['SERVER_PROTOCOL'].$error);
                
            } else {
                $error = ' 510 Une erreur est survenue merci de réessayer plus tard !';
                header($_SERVER['SERVER_PROTOCOL'].$error);
            }
        } 
    }
   
}

if (isset($_POST["updateUserInfos"])){
    if(empty($_POST["NOM"])){
        $response_array['status'] = '01'; 
        $response_array['message'] = 'Votre nom ne peut être vide !';
        header('Content-type: application/json; charset=UTF-8');
        $error = (json_encode($response_array));
        echo $error;
    } else {
        if(!preg_match("/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u",$_POST["NOM"])){
            $response_array['status'] = '02'; 
            $response_array['message'] = 'Votre Nom contient des caractères interdits!';
            header('Content-type: application/json; charset=UTF-8');
            $error = (json_encode($response_array));
            echo $error;
        }else{
            if(empty($_POST["PRENOM"])){
                $response_array['status'] = '03'; 
                $response_array['message'] = 'Votre Prénom ne peut être vide !';
                header('Content-type: application/json; charset=UTF-8');
                $error = (json_encode($response_array));
                echo $error;
            }else {
                if(!preg_match("/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u",$_POST["PRENOM"])){
                    $response_array['status'] = '04'; 
                    $response_array['message'] = 'Votre Prénom contient des caractères interdits !';
                    header('Content-type: application/json; charset=UTF-8');
                    $error = (json_encode($response_array));
                    echo $error;
                } else {
                    if(empty($_POST["NUM"])){
                        $response_array['status'] = '05'; 
                        $response_array['message'] = 'Votre Numéro de téléphone ne peut être vide !';
                        header('Content-type: application/json; charset=UTF-8');
                        $error = (json_encode($response_array));
                        echo $error;
                    }else {
                        if(!preg_match("/^[0-9]{10}$/",$_POST["NUM"])){
                            $response_array['status'] = '06'; 
                            $response_array['message'] = 'Votre Numéro de téléphone ne peut contenir que des nombres !';
                            header('Content-type: application/json; charset=UTF-8');
                            $error = (json_encode($response_array));
                            echo $error;
                        } else {
                            if(empty($_POST["ADRESSE_EMAIL"])){
                                $response_array['status'] = '07'; 
                                $response_array['message'] = 'Votre Adresse mail ne peut être vide !';
                                header('Content-type: application/json; charset=UTF-8');
                                $error = (json_encode($response_array));
                                echo $error;
                            } else {
                                if(!preg_match("/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/",$_POST["ADRESSE_EMAIL"])){
                                    $response_array['status'] = '08'; 
                                    $response_array['message'] = 'Adresse e-mail incorrecte !';
                                    header('Content-type: application/json; charset=UTF-8');
                                    $error = (json_encode($response_array));
                                    echo $error;
                                } else {
                                    if(empty($_POST["NUMERO"])){
                                        $response_array['status'] = '09'; 
                                        $response_array['message'] = 'Veuillez renseigner votre numéro de rue !';
                                        header('Content-type: application/json; charset=UTF-8');
                                        $error = (json_encode($response_array));
                                        echo $error;
                                    }else {
                                        if(!preg_match("/^\d+$/",$_POST["NUMERO"])){
                                            $response_array['status'] = '10'; 
                                            $response_array['message'] = 'Votre Numéro(Adresse) contiens des caractères incorrects';
                                            header('Content-type: application/json; charset=UTF-8');
                                            $error = (json_encode($response_array));
                                            echo $error;
                                        } else {
                                            if(empty($_POST["RUE"])){
                                                $response_array['status'] = '11'; 
                                                $response_array['message'] = 'Veuillez renseigner votre Adresse !';
                                                header('Content-type: application/json; charset=UTF-8');
                                                $error = (json_encode($response_array));
                                                echo $error;
                                            }else {
                                                if(!preg_match("/^[a-zA-Z'àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð., ]*$/u",$_POST["RUE"])){
                                                    $response_array['status'] = '12'; 
                                                    $response_array['message'] = 'Votre Adresse contiens des caractères incorrects !';
                                                    header('Content-type: application/json; charset=UTF-8');
                                                    $error = (json_encode($response_array));
                                                    echo $error;
                                                } else {
                                                    if(empty($_POST["CODE_POSTAL"])){
                                                        $response_array['status'] = '13'; 
                                                        $response_array['message'] = 'Votre code postal ne peut être vide !';
                                                        header('Content-type: application/json; charset=UTF-8');
                                                        $error = (json_encode($response_array));
                                                        echo $error;
                                                    } else {
                                                        if(!preg_match("/^\d+$/",$_POST["CODE_POSTAL"])){
                                                            $response_array['status'] = '14'; 
                                                            $response_array['message'] = 'Votre code postal ne peut contenir que des chiffres !';
                                                            header('Content-type: application/json; charset=UTF-8');
                                                            $error = (json_encode($response_array));
                                                            echo $error;
                                                        } else {
                                                            if(empty($_POST["VILLE"])){
                                                                $response_array['status'] = '15'; 
                                                                $response_array['message'] = 'Votre Ville ne peut être vide !';
                                                                header('Content-type: application/json; charset=UTF-8');
                                                                $error = (json_encode($response_array));
                                                                echo $error;
                                                            } else {
                                                                if(!preg_match("/^[[:alpha:]]([-' ]?[[:alpha:]])*$/",$_POST["VILLE"])){
                                                                    $response_array['status'] = '16'; 
                                                                    $response_array['message'] = 'Votre Ville contiens des caractères incorrects !';
                                                                    header('Content-type: application/json; charset=UTF-8');
                                                                    $error = (json_encode($response_array));
                                                                    echo $error;
                                                                } else {
                                                                    try{
                                                                    $serviceUtilisateur->serviceUpdate($_POST);
                                                                    $response_array['status'] = 'success'; 
                                                                    $response_array['message'] = 'Modifications bien effectuées !';
                                                                    header('Content-type: application/json; charset=UTF-8');
                                                                    $error = (json_encode($response_array));
                                                                    echo $error;
                                                                    }catch (MysqliQueryException $mqe) {
                                                                        if ($mqe->getCode() == 1049) {
                                                        
                                                                            $error = ' 507 Connexion a la base de donnée impossible !';
                                                                            header($_SERVER['SERVER_PROTOCOL'].$error);
                                                                            
                                                                        } else if ($mqe->getCode() == 1146 ){
                                                                            $error = ' 509 Erreur lors de l\'execution de la requête ';
                                                                            header($_SERVER['SERVER_PROTOCOL'].$error);
                                                                            
                                                                        } else {
                                                                            $error = ' 510 Une erreur est survenue merci de réessayer plus tard !';
                                                                            header($_SERVER['SERVER_PROTOCOL'].$error);
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }       
} 

if(isset($_POST["retraitFavoris"])){
    if(empty($_POST["retraitFavoris"])){
        $response_array['status'] = '01'; 
        $response_array['message'] = 'Une erreur est survenue, veuillez réessayer plus tard.';
        header('Content-type: application/json; charset=UTF-8');
        $error = (json_encode($response_array));
        echo $error;
    } else {
        if(!preg_match('/^\d+$/',$_POST["retraitFavoris"])){
            $response_array['status'] = '02'; 
            $response_array['message'] = 'Une erreur est survenue, veuillez réessayer plus tard.';
            header('Content-type: application/json; charset=UTF-8');
            $error = (json_encode($response_array));
            echo $error;
        }else {
            if(empty($_POST["id_utilisateur"])){
                $response_array['status'] = '03'; 
                $response_array['message'] = 'Une erreur est survenue, veuillez réessayer plus tard.';
                header('Content-type: application/json; charset=UTF-8');
                $error = (json_encode($response_array));
                echo $error;
            } else {
                if(!preg_match('/^\d+$/',$_POST["id_utilisateur"])){
                    $serviceAnimauxFavoris->serviceDelete($_POST);
                    $response_array['status'] = '04'; 
                    $response_array['message'] = 'Une erreur est survenue, veuillez réessayer plus tard.';
                    header('Content-type: application/json; charset=UTF-8');
                    $error = (json_encode($response_array));
                    echo $error;
                } else {
                    try{
                    $serviceAnimauxFavoris->serviceDelete($_POST);
                    $response_array['status'] = 'success'; 
                    $response_array['message'] = 'L\'animal a bien été retiré de vos favoris !';
                    header('Content-type: application/json; charset=UTF-8');
                    $error = (json_encode($response_array));
                    echo $error;
                    }catch (MysqliQueryException $mqe) {
                        if ($mqe->getCode() == 1049) {
                            $error = ' 507 Connexion a la base de donnée impossible !';
                            header($_SERVER['SERVER_PROTOCOL'].$error);
                            
                        } else if ($mqe->getCode() == 1146 ){
                            $error = ' 509 Erreur lors de l\'execution de la requête ';
                            header($_SERVER['SERVER_PROTOCOL'].$error);
                            
                        } else {
                            $error = ' 510 Une erreur est survenue merci de réessayer plus tard !';
                            header($_SERVER['SERVER_PROTOCOL'].$error);
                        }
                    }
                }
            }
        }
    }

}


if (isset($_POST["delete"])){

    $response_array['status'] = '01'; 
    $response_array['message'] = 'La demande nous à bien été envoyée ! Nous prendrons contact avec vous dés que possible.';
    header('Content-type: application/json; charset=UTF-8');
    $error = (json_encode($response_array));
    echo $error;

}


if (isset($_POST["addAnimal"])){
    if ($_FILES["photo"]["error"] > 0) {
        $response_array['status'] = '01'; 
        $response_array['message'] = 'La photo de votre Animal est manquante !';
        header('Content-type: application/json; charset=UTF-8');
        $error = (json_encode($response_array));
        echo $error;
    } else {
        if(empty($_POST["nomAnimal"])){
            $response_array['status'] = '01'; 
            $response_array['message'] = 'Le nom de votre compagnon ne peut être vide !';
            header('Content-type: application/json; charset=UTF-8');
            $error = (json_encode($response_array));
            echo $error;
        } else {
            if (!preg_match("/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u",$_POST["nomAnimal"])){
                $response_array['status'] = '02'; 
                $response_array['message'] = 'Le nom de votre compagnon ne peux pas contenir de caractères spéciaux ni de chiffres !';
                header('Content-type: application/json; charset=UTF-8');
                $error = (json_encode($response_array));
                echo $error;
            }else {
                if(empty($_POST["dateNaissance"])){
                    $response_array['status'] = '03'; 
                    $response_array['message'] = 'La date de naissance de votre compagnon ne peut être vide !';
                    header('Content-type: application/json; charset=UTF-8');
                    $error = (json_encode($response_array));
                    echo $error;
                } else {
                    if(empty($_POST["nom_espece"])){
                        $response_array['status'] = '04'; 
                        $response_array['message'] = 'L\'espece de votre compagnon ne peux être vide !';
                        header('Content-type: application/json; charset=UTF-8');
                        $error = (json_encode($response_array));
                        echo $error;
                    }else {
                        if(!preg_match("/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u",$_POST["nom_espece"])){
                            $response_array['status'] = '05'; 
                            $response_array['message'] = 'L\'espece de votre compagnon ne peux contenir de caractères spéciaux !';
                            header('Content-type: application/json; charset=UTF-8');
                            $error = (json_encode($response_array));
                            echo $error;
                        } else {
                            if(empty($_POST["race"])){
                                $response_array['status'] = '06'; 
                                $response_array['message'] = 'La race de votre compagnon ne peux ne peux être vide !';
                                header('Content-type: application/json; charset=UTF-8');
                                $error = (json_encode($response_array));
                                echo $error;
                            } else {
                                if(!preg_match("/^\d+$/",$_POST["race"])){
                                    $response_array['status'] = '07'; 
                                    $response_array['message'] = 'La race de votre compagnon ne peux contenir que des chiffres !';
                                    header('Content-type: application/json; charset=UTF-8');
                                    $error = (json_encode($response_array));
                                    echo $error;
                                } else {
                                    if(empty($_POST["sexe"])){
                                        $response_array['status'] = '08'; 
                                        $response_array['message'] = 'Veuillez sélectionner le sexe de votre compagnon!';
                                        header('Content-type: application/json; charset=UTF-8');
                                        $error = (json_encode($response_array));
                                        echo $error;
                                    } else {
                                        if(!preg_match("/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u",$_POST["sexe"])){
                                            $response_array['status'] = '09'; 
                                            $response_array['message'] = 'Le sexe de votre compagnon ne peux contenir de caractères interdits !';
                                            header('Content-type: application/json; charset=UTF-8');
                                            $error = (json_encode($response_array));
                                            echo $error; 
                                        } else {
                                            if(empty($_POST["numeroPuce"])){
                                                $response_array['status'] = '10'; 
                                                $response_array['message'] = 'Veuillez renseigner le numéro d\'identification de votre Animal !';
                                                header('Content-type: application/json; charset=UTF-8');
                                                $error = (json_encode($response_array));
                                                echo $error; 
                                            } else {
                                                if(!preg_match("/^[a-zA-Z0-9_.-]*$/",$_POST["numeroPuce"])){
                                                    $response_array['status'] = '11'; 
                                                    $response_array['message'] = 'Le Numéro d\'identification ne ne peux contenir des caractères spéciaux! ';
                                                    header('Content-type: application/json; charset=UTF-8');
                                                    $error = (json_encode($response_array));
                                                    echo $error;
                                                } else {
                                                    if(empty($_POST["caractere"])){
                                                        $response_array['status'] = '12'; 
                                                        $response_array['message'] = 'Veuillez renseigner des informations sur le caractère de votre compagnon !';
                                                        header('Content-type: application/json; charset=UTF-8');
                                                        $error = (json_encode($response_array));
                                                        echo $error;
                                                    } else {
                                                        if (!preg_match("/[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð0-9!^*()_+\-=\[\]\':\"\\|,.\/?]/",$_POST["caractere"])){
                                                            $response_array['status'] = '13'; 
                                                            $response_array['message'] = 'Les informations concernant le caractère de votre animal ne peuvent contenir des caractères incorrects, seuls sont acceptés les Lettres, les accents et la ponctuation !';
                                                            header('Content-type: application/json; charset=UTF-8');
                                                            $error = (json_encode($response_array));
                                                            echo $error;
                                                        } else {
                                                            if(empty($_POST["robe"])){
                                                                $response_array['status'] = '14'; 
                                                                $response_array['message'] = 'Veuillez renseigner la robe de votre compagnon !';
                                                                header('Content-type: application/json; charset=UTF-8');
                                                                $error = (json_encode($response_array));
                                                                echo $error;
                                                            } else {
                                                                if(!preg_match("/^[a-zA-Z'-àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð., ]*$/",$_POST["robe"])){
                                                                    $response_array['status'] = '15'; 
                                                                    $response_array['message'] = 'La Robe de votre compagnon ne peux contenir de caractères spéciaux !';
                                                                    header('Content-type: application/json; charset=UTF-8');
                                                                    $error = (json_encode($response_array));
                                                                    echo $error;
                                                                } else {
                                                                    if(empty($_POST["couleur"])){
                                                                        $response_array['status'] = '16'; 
                                                                        $response_array['message'] = 'Veuillez renseigner la couleur de votre compagnon !';
                                                                        header('Content-type: application/json; charset=UTF-8');
                                                                        $error = (json_encode($response_array));
                                                                        echo $error;
                                                                    } else {
                                                                        if(!preg_match("/^\d+$/",$_POST["couleur"])){
                                                                            $response_array['status'] = '17'; 
                                                                            $response_array['message'] = 'La couleur de votre animal ne peux contenir que des chiffres !';
                                                                            header('Content-type: application/json; charset=UTF-8');
                                                                            $error = (json_encode($response_array));
                                                                            echo $error;
                                                                        } else {
                                                                            if(empty($_POST["taille"])){
                                                                                $response_array['status'] = '18'; 
                                                                                $response_array['message'] = 'Veuillez renseigner la taille de votre compagnon !';
                                                                                header('Content-type: application/json; charset=UTF-8');
                                                                                $error = (json_encode($response_array));
                                                                                echo $error;
                                                                            } else {
                                                                                if(!preg_match("/^[0-9]*,?.?[0-9]+$/",$_POST["taille"])){
                                                                                    $response_array['status'] = '19'; 
                                                                                    $response_array['message'] = 'La Taille ne peux contenir que des chiffres !';
                                                                                    header('Content-type: application/json; charset=UTF-8');
                                                                                    $error = (json_encode($response_array));
                                                                                    echo $error;
                                                                                } else {
                                                                                    if(empty($_POST["poids"])){
                                                                                        $response_array['status'] = '20'; 
                                                                                        $response_array['message'] = 'Veuillez renseigner le poids de votre compagnon!';
                                                                                        header('Content-type: application/json; charset=UTF-8');
                                                                                        $error = (json_encode($response_array));
                                                                                        echo $error;  
                                                                                    } else {
                                                                                        if(!preg_match("/^[0-9]*,?.?[0-9]+$/",$_POST["poids"])){
                                                                                            $response_array['status'] = '21'; 
                                                                                            $response_array['message'] = 'Le Poids Contient des caractères Incorrects !';
                                                                                            header('Content-type: application/json; charset=UTF-8');
                                                                                            $error = (json_encode($response_array));
                                                                                            echo $error;
                                                                                        } else {
                                                                                            if(empty($_POST["specificites"])){
                                                                                                $response_array['status'] = '22'; 
                                                                                                $response_array['message'] = 'Veuillez renseigner les spécificités de votre compagnon ! (maladies, handicaps .. etc)';
                                                                                                header('Content-type: application/json; charset=UTF-8');
                                                                                                $error = (json_encode($response_array));
                                                                                                echo $error;
                                                                                            } else {
                                                                                                if(!preg_match("/[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð0-9!^*()_+\-=\[\]\':\"\\|,.\/?]/",$_POST["specificites"])){
                                                                                                    $response_array['status'] = '23'; 
                                                                                                    $response_array['message'] = 'Les spécificités contiennent des caractères interdits !';
                                                                                                    header('Content-type: application/json; charset=UTF-8');
                                                                                                    $error = (json_encode($response_array));
                                                                                                    echo $error;
                                                                                                } else {
                                                                                                    try{
                                                                                                    $animal = new Animaux($_POST);           
                                                                                                    $serviceAnimaux->serviceAddUserAnimal($animal);
                                                                                                    $avoirCouleur = new AvoirCouleur($animal);
                                                                                                    $avoirCouleurService->serviceAdd($avoirCouleur);                                         
                                                                                                    $photoAnimal = new PhotoAnimal($_FILES["photo"], $animal->getIdAnimal());
                                                                                                    $photoAnimalService->serviceAdd($photoAnimal);
                                                                                                    $response_array['status'] = 'success'; 
                                                                                                    $response_array['message'] = 'L\'Ajout de votre animal a bien été effectué !';
                                                                                                    header('Content-type: application/json; charset=UTF-8');
                                                                                                    $error = (json_encode($response_array));
                                                                                                    echo $error;
                                                                                                    }catch (MysqliQueryException $mqe) {
                                                                                                        if ($mqe->getCode() == 1049) {
                                                                                        
                                                                                                            $error = ' 507 Connexion a la base de donnée impossible !';
                                                                                                            header($_SERVER['SERVER_PROTOCOL'].$error);
                                                                                                            
                                                                                                        } else if ($mqe->getCode() == 1146 ){
                                                                                                            $error = ' 509 Erreur lors de l\'execution de la requête ';
                                                                                                            header($_SERVER['SERVER_PROTOCOL'].$error);
                                                                                                            
                                                                                                        } else {
                                                                                                            $error = ' 510 Une erreur est survenue merci de réessayer plus tard !';
                                                                                                            header($_SERVER['SERVER_PROTOCOL'].$error);
                                                                                                        }
                                                                                                    }    
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }                                      
        }
    }
}



    

    
    

    


if (isset($_POST["updateAnimalInfos"])){
    if(empty($_POST["nomAnimal"])){
        $response_array['status'] = '01'; 
        $response_array['message'] = 'Le nom de votre compagnon ne peut être vide !';
        header('Content-type: application/json; charset=UTF-8');
        $error = (json_encode($response_array));
        echo $error;
    } else {
        if (!preg_match("/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u",$_POST["nomAnimal"])){
            $response_array['status'] = '02'; 
            $response_array['message'] = 'Le nom de votre compagnon ne peux pas contenir de caractères spéciaux ni de chiffres !';
            header('Content-type: application/json; charset=UTF-8');
            $error = (json_encode($response_array));
            echo $error;
        }else {
            if(empty($_POST["dateNaissance"])){
                $response_array['status'] = '03'; 
                $response_array['message'] = 'La date de naissance de votre compagnon ne peut être vide !';
                header('Content-type: application/json; charset=UTF-8');
                $error = (json_encode($response_array));
                echo $error;
            } else {
                if(empty($_POST["especeAnimale"])){
                    $response_array['status'] = '04'; 
                    $response_array['message'] = 'L\'espece de votre compagnon ne peux être vide !';
                    header('Content-type: application/json; charset=UTF-8');
                    $error = (json_encode($response_array));
                    echo $error;
                }else {
                    if(!preg_match("/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u",$_POST["especeAnimale"])){
                        $response_array['status'] = '05'; 
                        $response_array['message'] = 'L\'espece de votre compagnon ne peux contenir de caractères spéciaux !';
                        header('Content-type: application/json; charset=UTF-8');
                        $error = (json_encode($response_array));
                        echo $error;
                    } else {
                        if(empty($_POST["raceAnimale"])){
                            $response_array['status'] = '06'; 
                            $response_array['message'] = 'La race de votre compagnon ne peux ne peux être vide !';
                            header('Content-type: application/json; charset=UTF-8');
                            $error = (json_encode($response_array));
                            echo $error;
                        } else {
                            if(!preg_match("/^\d+$/",$_POST["raceAnimale"])){
                                $response_array['status'] = '07'; 
                                $response_array['message'] = 'La race de votre compagnon ne peux contenir que des chiffres !';
                                header('Content-type: application/json; charset=UTF-8');
                                $error = (json_encode($response_array));
                                echo $error;
                            } else {
                                if(empty($_POST["sexeAnimal"])){
                                    $response_array['status'] = '08'; 
                                    $response_array['message'] = 'Veuillez sélectionner le sexe de votre compagnon!';
                                    header('Content-type: application/json; charset=UTF-8');
                                    $error = (json_encode($response_array));
                                    echo $error;
                                } else {
                                    if(!preg_match("/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u",$_POST["sexeAnimal"])){
                                        $response_array['status'] = '09'; 
                                        $response_array['message'] = 'Le sexe de votre compagnon ne peux contenir de caractères interdits !';
                                        header('Content-type: application/json; charset=UTF-8');
                                        $error = (json_encode($response_array));
                                        echo $error; 
                                    } else {
                                        if(empty($_POST["numeroPuce"])){
                                            $response_array['status'] = '10'; 
                                            $response_array['message'] = 'Veuillez renseigner le numéro d\'identification de votre Animal !';
                                            header('Content-type: application/json; charset=UTF-8');
                                            $error = (json_encode($response_array));
                                            echo $error; 
                                        } else {
                                            if(!preg_match("/^[a-zA-Z0-9_.-]*$/",$_POST["numeroPuce"])){
                                                $response_array['status'] = '11'; 
                                                $response_array['message'] = 'Le Numéro d\'identification ne ne peux contenir des caractères spéciaux! ';
                                                header('Content-type: application/json; charset=UTF-8');
                                                $error = (json_encode($response_array));
                                                echo $error;
                                            } else {
                                                if(empty($_POST["caractere"])){
                                                    $response_array['status'] = '12'; 
                                                    $response_array['message'] = 'Veuillez renseigner des informations sur le caractère de votre compagnon !';
                                                    header('Content-type: application/json; charset=UTF-8');
                                                    $error = (json_encode($response_array));
                                                    echo $error;
                                                } else {
                                                    if (!preg_match("/[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð0-9!^*()_+\-=\[\]\':\"\\|,.\/?]/",$_POST["caractere"])){
                                                        $response_array['status'] = '13'; 
                                                        $response_array['message'] = 'Les informations concernant le caractère de votre animal ne peuvent contenir des caractères incorrects, seuls sont acceptés les Lettres, les accents et la ponctuation !';
                                                        header('Content-type: application/json; charset=UTF-8');
                                                        $error = (json_encode($response_array));
                                                        echo $error;
                                                    } else {
                                                        if(empty($_POST["robe"])){
                                                            $response_array['status'] = '14'; 
                                                            $response_array['message'] = 'Veuillez renseigner la robe de votre compagnon !';
                                                            header('Content-type: application/json; charset=UTF-8');
                                                            $error = (json_encode($response_array));
                                                            echo $error;
                                                        } else {
                                                            if(!preg_match("/[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð0-9!^*()_+\-=\[\]\':\"\\|,.\/?]/",$_POST["robe"])){
                                                                $response_array['status'] = '15'; 
                                                                $response_array['message'] = 'La robe de votre compagnon ne peux contenir de caractères spéciaux !';
                                                                header('Content-type: application/json; charset=UTF-8');
                                                                $error = (json_encode($response_array));
                                                                echo $error;
                                                            } else {
                                                                if(empty($_POST["couleur"])){
                                                                    $response_array['status'] = '16'; 
                                                                    $response_array['message'] = 'Veuillez renseigner la couleur de votre compagnon !';
                                                                    header('Content-type: application/json; charset=UTF-8');
                                                                    $error = (json_encode($response_array));
                                                                    echo $error;
                                                                } else {
                                                                    if(!preg_match("/^\d+$/",$_POST["couleur"])){
                                                                        $response_array['status'] = '17'; 
                                                                        $response_array['message'] = 'La couleur de votre animal ne peux contenir que des chiffres !';
                                                                        header('Content-type: application/json; charset=UTF-8');
                                                                        $error = (json_encode($response_array));
                                                                        echo $error;
                                                                    } else {
                                                                        if(empty($_POST["taille"])){
                                                                            $response_array['status'] = '18'; 
                                                                            $response_array['message'] = 'Veuillez renseigner la taille de votre compagnon !';
                                                                            header('Content-type: application/json; charset=UTF-8');
                                                                            $error = (json_encode($response_array));
                                                                            echo $error;
                                                                        } else {
                                                                            if(!preg_match("/^[0-9]*,?.?[0-9]+$/",$_POST["taille"])){
                                                                                $response_array['status'] = '19'; 
                                                                                $response_array['message'] = 'La Taille ne peux contenir que des chiffres !';
                                                                                header('Content-type: application/json; charset=UTF-8');
                                                                                $error = (json_encode($response_array));
                                                                                echo $error;
                                                                            } else {
                                                                                if(empty($_POST["poids"])){
                                                                                    $response_array['status'] = '20'; 
                                                                                    $response_array['message'] = 'Veuillez renseigner le poids de votre compagnon!';
                                                                                    header('Content-type: application/json; charset=UTF-8');
                                                                                    $error = (json_encode($response_array));
                                                                                    echo $error;  
                                                                                } else {
                                                                                    if(!preg_match("/^[0-9]*,?.?[0-9]+$/",$_POST["poids"])){
                                                                                        
                                                                                        $response_array['status'] = '21'; 
                                                                                        $response_array['message'] = 'Le Poids Contient des caractères Incorrects !';
                                                                                        header('Content-type: application/json; charset=UTF-8');
                                                                                        $error = (json_encode($response_array));
                                                                                        echo $error;
                                                                                    } else {
                                                                                        if(empty($_POST["specificite"])){
                                                                                            $response_array['status'] = '22'; 
                                                                                            $response_array['message'] = 'Veuillez renseigner les spécificités de votre compagnon ! (maladies, handicaps .. etc)';
                                                                                            header('Content-type: application/json; charset=UTF-8');
                                                                                            $error = (json_encode($response_array));
                                                                                            echo $error;
                                                                                        } else {
                                                                                            if(!preg_match("/[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð0-9!^*()_+\-=\[\]\':\"\\|,.\/?]/",$_POST["specificite"])){
                                                                                                $response_array['status'] = '23'; 
                                                                                                $response_array['message'] = 'Les spécificités contiennent des caractères interdits !';
                                                                                                header('Content-type: application/json; charset=UTF-8');
                                                                                                $error = (json_encode($response_array));
                                                                                                echo $error;
                                                                                            } else {
                                                                                                if(empty($_POST["idAnimal"])){
                                                                                                    $response_array['status'] = '24'; 
                                                                                                    $response_array['message'] = 'L\'une erreur estr survenue merci de réessayer plus tard!';
                                                                                                    header('Content-type: application/json; charset=UTF-8');
                                                                                                    $error = (json_encode($response_array));
                                                                                                    echo $error;
                                                                                                } else {
                                                                                                    if(!preg_match("/^\d+$/",$_POST["idAnimal"])){
                                                                                                        $response_array['status'] = '25'; 
                                                                                                        $response_array['message'] = 'L\'identifiant de votre compagnon ne peux contenir que des chiffres!';
                                                                                                        header('Content-type: application/json; charset=UTF-8');
                                                                                                        $error = (json_encode($response_array));
                                                                                                        echo $error;
                                                                                                    } else {
                                                                                                        try{
                                                                                                        $serviceAnimaux->serviceUpdate($_POST);
                                                                                                        $ret        = is_uploaded_file($_FILES['photo']['tmp_name']);    
                                                                                                        if ($ret) {
                                                                                                            $photoAnimal = new PhotoAnimal($_FILES["photo"], $_POST["idAnimal"]);
                                                                                                            $photoAnimalService->update($photoAnimal);
                                                                                                        }
                                                                                                        $response_array['status'] = 'success'; 
                                                                                                        $response_array['message'] = 'La modification de votre compagnon a bien été effectuée, vous allez être redirigé dans quelques instants !';
                                                                                                        header('Content-type: application/json; charset=UTF-8');
                                                                                                        $error = (json_encode($response_array));
                                                                                                        echo $error;
                                                                                                        }catch (MysqliQueryException $mqe) {
                                                                                                            if ($mqe->getCode() == 1049) {
                                                                                            
                                                                                                                $error = ' 507 Connexion a la base de donnée impossible !';
                                                                                                                header($_SERVER['SERVER_PROTOCOL'].$error);
                                                                                                                
                                                                                                            } else if ($mqe->getCode() == 1146 ){
                                                                                                                $error = ' 509 Erreur lors de l\'execution de la requête ';
                                                                                                                header($_SERVER['SERVER_PROTOCOL'].$error);
                                                                                                                
                                                                                                            } else {
                                                                                                                $error = ' 510 Une erreur est survenue merci de réessayer plus tard !';
                                                                                                                header($_SERVER['SERVER_PROTOCOL'].$error);
                                                                                                            }
                                                                                                        }
                                                                                                    }
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }                                      
    }
}








if (isset($_POST["removeUserAnimal"])){
    if(empty($_POST["couleur"]) || empty($_POST["idAnimal"])){
        $response_array['status'] = '01'; 
        $response_array['message'] = 'Une erreur est survenue, veuillez réessayer plus tard !';
        header('Content-type: application/json; charset=UTF-8');
        $error = (json_encode($response_array));
        echo $error;
    } else {
        if (!preg_match("/^\d+$/",$_POST["couleur"]) || !preg_match("/^\d+$/",$_POST["idAnimal"]) ){
            $response_array['status'] = '01'; 
            $response_array['message'] = 'Ca ne sers à rien d\'essayer c\'est sécurisé!';
            header('Content-type: application/json; charset=UTF-8');
            $error = (json_encode($response_array));
            echo $error;
        } else {
            try{
            $photoAnimalService->serviceDelete($_POST);
            $avoirCouleurService->serviceDelete($_POST);
            $serviceAnimaux->serviceDelete($_POST);
            $response_array['status'] = 'success'; 
            $response_array['message'] = 'Le retrait a été effectué';
            header('Content-type: application/json; charset=UTF-8');
            $error = (json_encode($response_array));
            echo $error;
            }catch (MysqliQueryException $mqe) {
                if ($mqe->getCode() == 1049) {
                    $error = ' 507 Connexion a la base de donnée impossible !';
                    header($_SERVER['SERVER_PROTOCOL'].$error);
                    
                } else if ($mqe->getCode() == 1146 ){
                    $error = ' 509 Erreur lors de l\'execution de la requête ';
                    header($_SERVER['SERVER_PROTOCOL'].$error);
                    
                } else {
                    $error = ' 510 Une erreur est survenue merci de réessayer plus tard !';
                    header($_SERVER['SERVER_PROTOCOL'].$error);
                }
            }
        }
    }
}

if (isset($_POST["perte"])){
    if(empty($_POST["idAnimalPerdu"])){
        $response_array['status'] = '01'; 
        $response_array['message'] = 'L\'identifiant de votre animal ne peut être vide !';
        header('Content-type: application/json; charset=UTF-8');
        $error = (json_encode($response_array));
        echo $error;
    } else{
        if (preg_match('/^"\d"+$/',$_POST["idAnimalPerdu"])){
            $response_array['status'] = '02'; 
            $response_array['message'] = 'L\'identifiant de votre animal ne peux contenir que des chiffres !';
            header('Content-type: application/json; charset=UTF-8');
            $error = (json_encode($response_array));
            echo $error;
        }else {
            if(empty($_POST["datePerte"])){
                $response_array['status'] = '01'; 
                $response_array['message'] = 'La date ne peut être vide !';
                header('Content-type: application/json; charset=UTF-8');
                $error = (json_encode($response_array));
                echo $error;
            } else {
                if(empty($_POST["precisionPerte"])){
                    $response_array['status'] = '03'; 
                    $response_array['message'] = 'Veuillez donner quelques informations sur la perte de votre animal';
                    header('Content-type: application/json; charset=UTF-8');
                    $error = (json_encode($response_array));
                    echo $error;
                }else {
                    if(!preg_match("/[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð0-9!^*()_+\-=\[\]\':\"\\|,.\/?]/",$_POST["precisionPerte"])){
                        $response_array['status'] = '04'; 
                        $response_array['message'] = 'Votre texte contiens des caractères interdis !';
                        header('Content-type: application/json; charset=UTF-8');
                        $error = (json_encode($response_array));
                        echo $error;  
                    } else {
                        try {
                        $perte = new Perte($_POST);
                        $servicePerte->serviceAdd($perte);
                        $response_array['status'] = 'success'; 
                        $response_array['message'] = 'Votre animal a bien été signalé comme étant perdu !';
                        header('Content-type: application/json; charset=UTF-8');
                        $error = (json_encode($response_array));
                        echo $error;  
                        }catch (MysqliQueryException $mqe) {
                            if ($mqe->getCode() == 1049) {
            
                                $error = ' 507 Connexion a la base de donnée impossible !';
                                header($_SERVER['SERVER_PROTOCOL'].$error);
                                
                            } else if ($mqe->getCode() == 1146 ){
                                $error = ' 509 Erreur lors de l\'execution de la requête ';
                                header($_SERVER['SERVER_PROTOCOL'].$error);
                                
                            } else {
                                $error = ' 510 Une erreur est survenue merci de réessayer plus tard !';
                                header($_SERVER['SERVER_PROTOCOL'].$error);
                            }
                        }
                    }
                }
            } 
        }
    }
}



if(isset($_POST["idAnimalRetrouve"])){
    if(empty($_POST["idAnimalRetrouve"])){
        $response_array['status'] = '01'; 
        $response_array['message'] = 'Une erreur est survenue, veuillez réessayer plus tard !';
        header('Content-type: application/json; charset=UTF-8');
        $error = (json_encode($response_array));
        echo $error;
    } else {
        if(!preg_match("/^\d+$/",$_POST["idAnimalRetrouve"])){
            $response_array['status'] = '02'; 
            $response_array['message'] = 'C\'est sécurisé cela ne sers à rien !';
            header('Content-type: application/json; charset=UTF-8');
            $error = (json_encode($response_array));
            echo $error;
        } else {
            try{
                $servicePerte->serviceDelete($_POST["idAnimalRetrouve"]);
                $response_array['status'] = 'success'; 
                $response_array['message'] = 'Votre animal a bien été signalé comme étant retrouvé !';
                header('Content-type: application/json; charset=UTF-8');
                $error = (json_encode($response_array));
                echo $error;
            }catch (MysqliQueryException $mqe) {
                if ($mqe->getCode() == 1049) {

                    $error = ' 507 Connexion a la base de donnée impossible !';
                    header($_SERVER['SERVER_PROTOCOL'].$error);
                    
                } else if ($mqe->getCode() == 1146 ){
                    $error = ' 509 Erreur lors de l\'execution de la requête ';
                    header($_SERVER['SERVER_PROTOCOL'].$error);
                    
                } else {
                    $error = ' 510 Une erreur est survenue merci de réessayer plus tard !';
                    header($_SERVER['SERVER_PROTOCOL'].$error);
                }
            }
        }
    }

}


