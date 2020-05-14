<?php

include_once '../../Interfaces/InterfaceDao.php';
include_once '../../data-access/LogBdd.php';
include_once '../../model/MysqliQueryException.php';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    class NewsDataAccess  extends LogBdd implements InterfaceDao{
        public function daoSelectAll(){
        }
        public function daoSelect($id){

        }
        public function daoCount(){

        }
        public function daoAdd($news){
            try{
                $title = $news->getTitle();
                $content = $news->getContent();
                $createdAt = $news->getCreatedAt();
                $photo = $news->getPhoto();
                $mysqli = $this->connexion();
                if(!empty($photo)){
                    $stmt = $mysqli->prepare('INSERT INTO news(TITRE,CONTENU,CREATED_AT,ID_IMG_SITE) VALUES(?,?,?,?)');
                    $stmt->bind_param('sss',$title,$content,$createdAt,$photo);
                }else {
                    $stmt = $mysqli->prepare('INSERT INTO news(TITRE,CONTENU,CREATED_AT,ID_IMG_SITE) VALUES(?,?,?,NULL)');
                    $stmt->bind_param('sss',$title,$content,$createdAt); 
                }
                $stmt->execute();                
                $this->deconnexion($mysqli);
            }catch (mysqli_sql_exception $mse) {                   
                throw new MysqliQueryException("Erreur SQL", $mse->getCode());                
            }catch (Exception $e) {
                throw $e;
            } 
        }
        public function daoSearch($search){

        }
        public function daoUpdate($parametres){

        }
        public function daoDelete($nom){

        }
    }
?>