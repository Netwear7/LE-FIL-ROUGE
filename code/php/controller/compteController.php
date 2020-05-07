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

    if(empty($_POST["actual"]) || empty($_POST["newPassword"]) || empty($_POST["confirmedNew"])){
        $response_array['status'] = '03'; 
        $response_array['message'] = 'Veuillez remplir tout les champs !';
        header('Content-type: application/json; charset=UTF-8');
        $error = (json_encode($response_array));
        echo $error;
    } else {
        $mdpActuel = $_POST["actual"];
        if ($_POST["confirmedNew"] == $_POST["newPassword"]) {
            $result = $serviceUtilisateur->serviceVerifyActualPassword($_SESSION["user_id"],$mdpActuel);
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
                    $response_array['message'] = 'Votre mot de passe doit contenir entre blablabla et blablabla !';
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
                                                if(!preg_match("/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð0-9 ,.'-]+$/u",$_POST["RUE"])){
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
                                                                    $serviceUtilisateur->serviceUpdate($_POST);
                                                                    $response_array['status'] = 'success'; 
                                                                    $response_array['message'] = 'Modifications bien effectuées !';
                                                                    header('Content-type: application/json; charset=UTF-8');
                                                                    $error = (json_encode($response_array));
                                                                    echo $error;
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
    $serviceAnimauxFavoris->serviceDelete($_POST);
}


if (isset($_POST["delete"])){

    $serviceUtilisateur->serviceDelete($nom);
    header('Location: accueil.php');
    exit;

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
            $response_array['status'] = '02'; 
            $response_array['message'] = 'Le nom ne peux être vide !';
            header('Content-type: application/json; charset=UTF-8');
            $error = (json_encode($response_array));
            echo $error;
        } else {
            if (!preg_match("/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u",$_POST["nomAnimal"])){
                $response_array['status'] = '03'; 
                $response_array['message'] = 'Le nom ne peux pas contenir de caractères spéciaux ni de chiffres !';
                header('Content-type: application/json; charset=UTF-8');
                $error = (json_encode($response_array));
                echo $error;
            } else {
                if(empty($_POST["dateNaissance"])){
                    $response_array['status'] = '04'; 
                    $response_array['message'] = 'La date de naissance ne peut être vide !';
                    header('Content-type: application/json; charset=UTF-8');
                    $error = (json_encode($response_array));
                    echo $error;
                }else {
                    if($_POST["nom_espece"] == "Selectionnez une race") {
                        $response_array['status'] = '05'; 
                        $response_array['message'] = 'Vous n\'avez pas sélectionné l\'espèce de votre Animal';
                        header('Content-type: application/json; charset=UTF-8');
                        $error = (json_encode($response_array));
                        echo $error;
                    } else{
                        if(empty($_POST["race"])){
                            $response_array['status'] = '06'; 
                            $response_array['message'] = 'Veuillez sélectionner la race de votre Animal  !';
                            header('Content-type: application/json; charset=UTF-8');
                            $error = (json_encode($response_array));
                            echo $error;
                        } else {
                            if(empty($_POST["numeroPuce"])){
                                $response_array['status'] = '07'; 
                                $response_array['message'] = 'Le numéro d\'identification ne peux être vide !';
                                header('Content-type: application/json; charset=UTF-8');
                                $error = (json_encode($response_array));
                                echo $error;
                            }else {
                                if (!preg_match("/^[a-zA-Z0-9_.-]*$/",$_POST["numeroPuce"])){
                                    $response_array['status'] = '08'; 
                                    $response_array['message'] = 'Le Numéro d\'identification contiens des caractères spéciaux ! ';
                                    header('Content-type: application/json; charset=UTF-8');
                                    $error = (json_encode($response_array));
                                    echo $error;
                                } else {
                                    if(empty($_POST["caractere"])) {
                                        $response_array['status'] = '09'; 
                                        $response_array['message'] = 'Le caractère de votre animal ne peux pas être vide !';
                                        header('Content-type: application/json; charset=UTF-8');
                                        $error = (json_encode($response_array));
                                        echo $error;
                                    } else {
                                        if (!preg_match("/^[a-zA-Z'àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð., ]*$/",$_POST["caractere"])){
                                            $response_array['status'] = '10'; 
                                            $response_array['message'] = 'Les informations concernant le caractère de votre animal ne peuvent contenir des caractères incorrects, seuls sont acceptés les Lettres, les accents et la ponctuation !';
                                            header('Content-type: application/json; charset=UTF-8');
                                            $error = (json_encode($response_array));
                                            echo $error;
                                        } else {
                                            if(empty($_POST["taille"])){
                                                $response_array['status'] = '11'; 
                                                $response_array['message'] = 'La taille de votre Animal n\'est pas présente !';
                                                header('Content-type: application/json; charset=UTF-8');
                                                $error = (json_encode($response_array));
                                                echo $error;
                                            }else {
                                                if(!preg_match("/^(?:0|[1-9]\d{0,2})$/",$_POST["taille"])){
                                                    $response_array['status'] = '12'; 
                                                    $response_array['message'] = 'La Taille ne peux contenir que des chiffres !';
                                                    header('Content-type: application/json; charset=UTF-8');
                                                    $error = (json_encode($response_array));
                                                    echo $error;
                                                } else {
                                                    if(empty($_POST["poids"])){
                                                        $response_array['status'] = '13'; 
                                                        $response_array['message'] = 'Le Poids de votre Animal n\'est pas présent !';
                                                        header('Content-type: application/json; charset=UTF-8');
                                                        $error = (json_encode($response_array));
                                                        echo $error;
                                                    } else {
                                                        if(!preg_match("/^(?:0|[1-9]\d{0,2})$/",$_POST["poids"])){
                                                            $response_array['status'] = '14'; 
                                                            $response_array['message'] = 'Le Poids Contient des caractères Incorrects !';
                                                            header('Content-type: application/json; charset=UTF-8');
                                                            $error = (json_encode($response_array));
                                                            echo $error;
                                                        }else {
                                                            if(empty($_POST["specificites"])){
                                                                $response_array['status'] = '15'; 
                                                                $response_array['message'] = 'Les spécificités ne peuvent être vides ! ';
                                                                header('Content-type: application/json; charset=UTF-8');
                                                                $error = (json_encode($response_array));
                                                                echo $error;
                                                            } else{
                                                                if(!preg_match("/^[a-zA-Z'àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð., ]*$/",$_POST["specificites"])){
                                                                    $response_array['status'] = '16'; 
                                                                    $response_array['message'] = 'Les spécificités contiennent des caractères interdits !';
                                                                    header('Content-type: application/json; charset=UTF-8');
                                                                    $error = (json_encode($response_array));
                                                                    echo $error;
                                                                } else {
    
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
                                            
    $serviceAnimaux->serviceUpdate($_POST);
    $ret        = is_uploaded_file($_FILES['photo']['tmp_name']);    
    if ($ret) {
        $photoAnimal = new PhotoAnimal($_FILES, $_POST["idAnimal"]);
        $photoAnimalService->Update($photoAnimal);
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
            $photoAnimalService->serviceDelete($_POST);
            $avoirCouleurService->serviceDelete($_POST);
            $serviceAnimaux->serviceDelete($_POST);
            $response_array['status'] = 'success'; 
            $response_array['message'] = 'Le retrait a été effectué';
            header('Content-type: application/json; charset=UTF-8');
            $error = (json_encode($response_array));
            echo $error;
        }
    }

}

if (isset($_POST["perte"])){
    $perte = new Perte($_POST);
    $servicePerte->serviceAdd($perte);
}

if(isset($_POST["idAnimalRetrouve"])){
    $servicePerte->serviceDelete($_POST["idAnimalRetrouve"]);
}


