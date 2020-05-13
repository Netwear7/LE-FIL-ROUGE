<?php

include_once '../data-access/LogBdd.php';
include_once '../Interfaces/InterfaceDao.php';

    class AppartenirEspeceDataAccess extends LogBdd implements InterfaceDao{

        public function daoSelectAll(){
            $mysqli = $this->connexion();
            $rs = $mysqli->query('SELECT * from appartenir_espece');
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $data;
        }
        public function daoSelect(int $id){}
        public function daoCount(){}
        public function daoAdd($appartenirEspece){
            $mysqli = $this->connexion();
            $race = $appartenirEspece->getIdRace();
            $espece = $appartenirEspece->getIdEspece();
            $stmt = $mysqli->prepare("INSERT INTO appartenir_espece(ID_RACE, ID_ESPECE) VALUES(?,?)");
            $stmt->bind_param("ss", $race, $espece);
            $stmt->execute();
            $this->deconnexion($mysqli);
        }
        public function daoSearch($search){}
        public function daoUpdate(array $parametres){}
        public function daoDelete(string $nom){}
    }
?>