<?php

session_start();

include_once '../service/NewsService.php';
include_once '../data-access/NewsDataAccess.php';

if(!isset($_SESSION) || $_SESSION["user_role"] != "[admin]"){
    header("Location: accueil.php");
    exit;
} else {

    $newsDao = new NewsDataAccess();
    $newsService = new NewsService($newsDao);

    if(isset($_POST)){
        if(empty($_POST["id"])){
            $response_array['status'] = '01'; 
            $response_array['message'] = 'Une erreur est survenue, veuillez réessayer plus tard.';
            header('Content-type: application/json; charset=UTF-8');
            $error = (json_encode($response_array));
            echo $error;
        }else{
            if(!preg_match("/^\d+$/",$_POST["id"])){
                $response_array['status'] = '02'; 
                $response_array['message'] = 'Une erreur est survenue, veuillez réessayer plus tard.';
                header('Content-type: application/json; charset=UTF-8');
                $error = (json_encode($response_array));
                echo $error;
            } else{

                try{
                    $data = $newsService->serviceSelect($_POST["id"]);
                    if($data){
                        echo
                        '
                        <div class="row">
                            <h4>Modifier une News</h4>
                        </div>
                        <form id="formUpdateNews" enctype="multipart/form-data">
                        <div class="row">

                                    <label for="titleNews">Titre :</label>
                                    <input class="form-control" name="titleNewsUpdated" value="'.$data["TITRE"].'" id="titleNews" type="text">
                                    <label for="contentNews">Contenu :</label>
                                    <textarea class="form-control mb-2" name="contentNewsUpdated" '.$data["CONTENU"].' id="contentNews" rows="3">'.$data["CONTENU"].'</textarea>
                                    <label for="photoNews">Photo :</label>
                                    <div class="custom-file">
                                        <input type="file" name="photo" accept="image/png, image/jpeg">
                                    </div>
                                    <input type="hidden" name="idNews" value="'.$data["ID_NEWS"].'"/>
                                    <button type="submit" id="updateNewsBtn" class="btn btn-primary">Modifier</button>

                            <div class="col-12">
                                <div class="row" id="resultUpdateNews">
                                    
                                </div>
                            </div>
                        </div>
                        </form>
                        <script src="../../javascript/accueil/editNews.js"></script>
                        ';
                    }else {
                        $response_array['status'] = '03'; 
                        $response_array['message'] = 'Une erreur est survenue, veuillez réessayer plus tard.';
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




?>