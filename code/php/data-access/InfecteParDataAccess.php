<?php

    include_once("logBdd.php");
    include_once("../Interfaces/InterfaceDao.php");


    
    class InfecteParDataAccess extends LogBdd implements InterfaceDao{
        public function SelectAnimauxMalade(){
            $mysqli = $this->connexion();
            $rs = $mysqli->query("");
            $this->deconnexion($mysqli);
        }

        public function daoSelectAll(){}
        public function daoSelect(int $id){}
        public function daoCount(){}
        public function daoAdd($infectePar){
            $mysqli = $this->connexion();
            $idA = $infectePar->getIdAnimal();
            $idM = $infectePar->getIdMaladie();
            $stmt = $mysqli->prepare("INSERT INTO est_infecte_par(ID_MALADIE, ID_ANIMAL) VALUES(?,?)");
            $stmt->bind_param("ss", $idM, $idA);
            $stmt->execute();
            $this->deconnexion($mysqli);
        }
        public function daoSearch($search){}
        public function daoUpdate(array $parametres){}
        public function daoDelete(string $nom){}
    }
?>