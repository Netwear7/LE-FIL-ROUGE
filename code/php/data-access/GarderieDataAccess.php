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
        
        public function daoVerifyIfReservationExists($idUser){
            $mysqli = $this->connexion();
            $rs = $mysqli->query('SELECT id_garderie FROM garderie as A 
                                  INNER JOIN animaux as B on A.id_animal=B.id_animal 
                                  WHERE B.id_utilisateur = '.$idUser.'');
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $data;
        }

        public function daoDeleteReservation($idUser){
            $mysqli = $this->connexion();
            $stmt = $mysqli->prepare('DELETE A.* FROM garderie as A 
                                      INNER JOIN animaux as B on A.id_animal=B.id_animal 
                                      WHERE B.id_utilisateur = ?');
            $stmt->bind_param('i', $idUser);
            $stmt->execute();                
            $this->deconnexion($mysqli);
        }

        public function daoVerifyIfIsFull($idRefuge,$dateEntree,$dateSortie){
            $mysqli = $this->connexion();
            $rs = $mysqli->query("SELECT * FROM garderie WHERE id_refuge=$idRefuge 
                                                         AND ((date_entree BETWEEN '$dateEntree' AND '$dateSortie') 
                                                               OR (date_sortie BETWEEN '$dateEntree' AND '$dateSortie') 
                                                               OR (date_entree < '$dateEntree' AND date_sortie > '$dateSortie'))");
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $data;
        }
    }
?>