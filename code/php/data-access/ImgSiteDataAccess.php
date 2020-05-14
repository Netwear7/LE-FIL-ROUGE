<?php

    include_once '../data-access/LogBdd.php';
    include_once '../Interfaces/InterfaceDao.php';

    class ImgSiteDataAccess extends LogBdd implements InterfaceDao{
        public function daoSelectAll(){
            $mysqli = $this->connexion();
            $rs = $mysqli->query('SELECT * from img_site');
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $data;
        }
        public function daoSelect($id){

        }
        public function daoCount(){

        }
        public function daoAdd($img){
            try{
                $blob = $img->getBlob();
                $imgNom = $img->getImgNom();
                $imgTaille = $img->getImgTaille();
                $imgType = $img->getImgType();
                $mysqli = $this->connexion();
                $stmt = $mysqli->prepare('INSERT INTO img_site(IMG_BLOB,IMG_NOM,IMG_TAILLE,IMG_TYPE) VALUES(?,?,?,?)');
                $stmt->bind_param('ssss',$blob, $imgNom, $imgTaille, $imgType);
                $stmt->execute();   
                $id = mysqli_insert_id($mysqli);            
                $this->deconnexion($mysqli);

                return $id;
                } catch (mysqli_sql_exception $mse) {                   
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
                $mysqli = $this->connexion();
                $stmt = $mysqli->prepare('DELETE from img_site where ID_IMG_SITE = ?');
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
        }
    }
?>