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



        public function daoSelectAll(){}
        public function daoSelect(int $id){}
        public function daoCount(){}
        public function daoAdd(object $object){}
        public function daoSearch($search){}
        public function daoUpdate(array $parametres){}
        public function daoDelete(string $nom){}
    }
?>