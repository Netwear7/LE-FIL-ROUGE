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
            $mysqli = new mysqli('localhost','root','','bddanimaux');
            $stmt = $mysqli->prepare('SELECT * from espece where ID_ESPECE = ?');
            $stmt->bind_param('i',$id);
            $stmt->execute();
            $rs = $stmt->get_result();
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $mysqli->close();
            return $data;
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
            $mysqli = $this->connexion(); 
            $nomEspece = $parametres["NOM_ESPECE"];
            $id = $parametres["id"];
            $stmt = $mysqli->prepare('UPDATE espece SET NOM_ESPECE = ? where ID_ESPECE=?');
            $stmt->bind_param("ss", $nomEspece, $id);
            $stmt->execute();
            $this->deconnexion($mysqli); 
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