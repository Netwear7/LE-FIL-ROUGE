<?php

    include_once '../data-access/LogBdd.php';
    include_once '../Interfaces/InterfaceDao.php';

    class RefugeDataAccess extends LogBdd implements InterfaceDao{
        public function daoSelectAll(){
            $mysqli = $this->connexion();
            $rs = $mysqli->query('SELECT * from refuge');
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $data;
        }
        public function daoSelect($id){

        }
        public function daoCount(){

        }
        public function daoAdd($refuge){
            $region = $refuge->getRegion();
            $departement = $refuge->getDepartement();
            $idAdresse = $refuge->getIdAdresse();
            $email = $refuge->getEmail();
            $num = $refuge->getNum();
            $mysqli = $this->connexion();
            $stmt = $mysqli->prepare('INSERT INTO refuge (REGION, DEPARTEMENT, ID_ADRESSE, EMAIL, TELEPHONE) VALUES (?,?,?,?,?)');
            $stmt-> bind_param('ssiss', $region, $departement, $idAdresse, $email, $num);
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