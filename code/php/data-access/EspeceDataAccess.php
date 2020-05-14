<?php

include_once '../data-access/LogBdd.php';
include_once '../Interfaces/InterfaceDao.php';


class EspeceDataAccess extends LogBdd implements InterfaceDao{


        public function afficherType(){
            $mysqli = $this->connexion();
            $stmt = $mysqli -> prepare("SELECT nom_espece FROM espece");
            $stmt -> execute();  
            $rs = $stmt -> get_result();          
            $data= $rs -> fetch_all(MYSQLI_ASSOC);
            $rs -> free();
            $this->deconnexion($mysqli);  
            return $data;
        }
        public function daoSelectAll(){
            $mysqli = $this->connexion();
            $rs = $mysqli->query('SELECT * from espece');
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $data;
        }
        public function daoSelect($id){

        }
        public function daoCount(){

        }
        public function daoAdd($espece){
            $mysqli = $this->connexion();
            $nomEspece = $espece->getNomEspece();
            $stmt = $mysqli->prepare("INSERT INTO espece(nom_espece) VALUES(?)");
            $stmt->bind_param("s", $nomEspece);
            $stmt->execute();
            $this->deconnexion($mysqli);
        }
        public function daoSearch($search){

        }
        public function daoUpdate($parametres){

        }
        public function daoDelete($id){
            $mysqli = $this->connexion(); 
            $stmt = $mysqli->prepare('DELETE FROM espece where ID_ESPECE = ?');
            $stmt->bind_param('s',$id);
            $stmt->execute();
            $this->deconnexion($mysqli);
            return   $result = $stmt ? "La suppression a bien été effectuée " : "La suppression a échouée ";
        }
    }
?>