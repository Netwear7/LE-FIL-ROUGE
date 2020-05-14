<?php


    include_once '../model/News.php';
    include_once '../service/NewsService.php';
    include_once '../data-access/NewsDataAccess.php';

    include_once '../model/ImgSite.php';
    include_once '../service/ImgSiteService.php';
    include_once '../data-access/ImgSiteDataAccess.php';

session_start();


if(isset($_SESSION) && $_SESSION["user_role"] == "[admin]"){
    



    $newsDao = new NewsDataAccess();
    $newsService = new NewsService($newsDao);

    $imgSiteDao = new ImgSiteDataAccess();
    $imgSiteService = new ImgSiteService($imgSiteDao);







    
    if(isset($_POST) && isset($_POST["titleNews"])){
        if(empty($_POST["titleNews"])){
            $response_array['status'] = '01'; 
            $response_array['message'] = 'Veuillez renseigner un titre !';
            header('Content-type: application/json; charset=UTF-8');
            $error = (json_encode($response_array));
            echo $error;
        }else {
            if(empty($_POST["contentNews"])){
                $response_array['status'] = '02'; 
                $response_array['message'] = 'Veuillez renseigner un contenu !';
                header('Content-type: application/json; charset=UTF-8');
                $error = (json_encode($response_array));
                echo $error;
            } else {
                try{
                    
                    $ret        = is_uploaded_file($_FILES['photo']['tmp_name']);    
                    if ($ret) {
                        try{
                        $imgSite = new ImgSite($_FILES["photo"]);
                        $idPhoto = $imgSiteService->serviceAdd($imgSite);
                        $imgSite->setIdImgSite($idPhoto);
                        }catch (MysqliQueryException $mqe) {
                            if ($mqe->getCode() == 1049) {
            
                                $error = ' 507 Connexion a la base de donnée impossible !';
                                header($_SERVER['SERVER_PROTOCOL'].$error);
                                
                            } else if ($mqe->getCode() == 1062 ){
                                $error = ' 509 Erreur lors de l\'execution de la requête ';
                                header($_SERVER['SERVER_PROTOCOL'].$error);
                                
                            } else {
                                $error = ' 510 Une erreur est survenue merci de réessayer plus tard !';
                                header($_SERVER['SERVER_PROTOCOL'].$error);
                            }
                        }
                    }

                    $news = new News($_POST);
                    if($imgSite){
                        $news->setPhoto($imgSite->getIdImgSite());
                    }
                    $result =$newsService->serviceAdd($news);
                    if($result === true){
                        $response_array['status'] = 'success'; 
                        $response_array['message'] = 'L\'ajout de la news a bien été effectué!';
                        header('Content-type: application/json; charset=UTF-8');
                        $success = (json_encode($response_array));
                        echo $success;
                    }
                }catch (MysqliQueryException $mqe) {
                    if ($mqe->getCode() == 1049) {
    
                        $error = ' 507 Connexion a la base de donnée impossible !';
                        header($_SERVER['SERVER_PROTOCOL'].$error);
                        
                    } else if ($mqe->getCode() == 1062 ){
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