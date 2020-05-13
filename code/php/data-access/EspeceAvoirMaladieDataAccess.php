<?php

    include_once '../data-access/LogBdd.php';
    include_once '../Interfaces/InterfaceDao.php';

    class EspeceAvoirMaladieDataAccess extends LogBdd implements InterfaceDao{

        public function daoSelectAll(){
            $mysqli = $this->connexion();
            $rs = $mysqli->query('SELECT * from espece_avoir_maladie');
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $data;
        }
        public function daoSelect($id){

        }
        public function daoCount(){

        }
        public function daoAdd($especeAvoirMaladie){
            $mysqli = $this->connexion();
            $espece = $especeAvoirMaladie->getIdEspece();
            $maladie = $especeAvoirMaladie->getIdMaladie();
            $stmt = $mysqli->prepare("INSERT INTO espece_avoir_maladie(ID_MALADIE, ID_ESPECE) VALUES(?,?)");
            $stmt->bind_param("ss", $maladie, $espece);
            $stmt->execute();
            $this->deconnexion($mysqli);
        }
        public function daoSearch($search){

        }
        public function daoUpdate($parametres){

        }
        public function daoDelete($nom){

        }
    }
?>