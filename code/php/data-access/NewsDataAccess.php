<?php

include_once '../Interfaces/InterfaceDao.php';
include_once '../data-access/LogBdd.php';
include_once '../model/MysqliQueryException.php';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    class NewsDataAccess  extends LogBdd implements InterfaceDao{
        public function daoSelectAll(){
            try{
                $mysqli = $this->connexion();
                $stmt = $mysqli->prepare('SELECT * from news as A INNER JOIN img_site as B on a.ID_IMG_SITE = B.ID_IMG_SITE ORDER BY CREATED_AT DESC');
                $stmt->execute();
                $rs = $stmt->get_result();
                $data = $rs->fetch_all(MYSQLI_ASSOC);
                $rs->free();
                $this->deconnexion($mysqli);
                return $data;
            }catch (mysqli_sql_exception $mse) {                   
                throw new MysqliQueryException("Erreur SQL", $mse->getCode());                
            }catch (Exception $e) {
                throw $e;
            } 
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
                    $stmt->bind_param('ssss',$title,$content,$createdAt,$photo);
                }else {
                    $stmt = $mysqli->prepare('INSERT INTO news(TITRE,CONTENU,CREATED_AT,ID_IMG_SITE) VALUES(?,?,?,NULL)');
                    $stmt->bind_param('sss',$title,$content,$createdAt); 
                }
                $stmt->execute();                
                $this->deconnexion($mysqli);
                return true;
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
        public function daoDelete($id){
            try{
                try{
                    $mysqli = $this->connexion();
                    $stmt = $mysqli->prepare('DELETE from news where ID_NEWS = ?');
                    $stmt->bind_param('s',$id);
                    $stmt->execute(); 
                    $data = mysqli_affected_rows($mysqli);
                    $this->deconnexion($mysqli);
                    return $data;
                } catch (mysqli_sql_exception $mse) {                   
                    throw new MysqliQueryException("Erreur SQL", $mse->getCode());                
                }catch (Exception $e) {
                    throw $e;
                } 
            }catch (mysqli_sql_exception $mse) {                   
                throw new MysqliQueryException("Erreur SQL", $mse->getCode());                
            }catch (Exception $e) {
                throw $e;
            } 
        }
    }
?>