<?php

    include_once '../data-access/LogBdd.php';
    include_once '../Interfaces/InterfaceDao.php';

    class GarderieDataAccess extends LogBdd implements InterfaceDao{
        public function daoSelectAll(){
            $mysqli = $this->connexion();
            $rs = $mysqli->query('SELECT * from garderie');
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $data;
        }
        public function daoSelect($id){

        }
        public function daoCount(){

        }
        public function daoAdd($object){

        }
        public function daoSearch($search){

        }
        public function daoUpdate($parametres){

        }
        public function daoDelete($nom){

        }

        public function daoReservationGarderie($dateEntree,$dateSortie,$idRefuge,$idAnimal){
            $mysqli = $this->connexion();
            $stmt = $mysqli->prepare('INSERT INTO garderie(date_entree,date_sortie,id_refuge,id_animal) VALUES(?,?,?,?)');
            $stmt->bind_param('ssii', $dateEntree,$dateSortie,$idRefuge,$idAnimal);
            $stmt->execute();                
            $this->deconnexion($mysqli);
        }
    }
?>