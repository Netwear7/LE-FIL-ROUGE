<?php
    include_once '../Interfaces/InterfaceDao.php';

    class PhotoAnimalDataAccess implements InterfaceDao{
        public function connexion(){
            return new mysqli('localhost', 'root', '', 'bddanimaux');
        }
        public function deconnexion($mysqli){
            $mysqli->close();
        }
        public function daoSelectAll(){
            $mysqli = $this->connexion();
            $rs = $mysqli->query('SELECT * from photo_animal');
            $data = $rs->fetch_array(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $data;
        }
        //Comprendre select all du tableau photoanimal mais que les photos de profil :
        public function daoSelectAllProfil(){
            $mysqli = $this->connexion();
            $stmt = $mysqli->prepare('SELECT * from photo_animal where PHOTO_PROFIL = ?');
            $stmt->bind_param('i', $idPhoto);
            $stmt->execute();
            $rs = $stmt->get_result();
            $data = $rs->fetch_array(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $data;
        }
        public function daoSelect($idAnimal){
            $mysqli = $this->connexion();
            $stmt = $mysqli->prepare('SELECT * from photo_animal where ID_ANIMAL = ?');
            $stmt->bind_param('ii', $id, $idAnimal);
            $stmt->execute();
            $rs = $stmt->get_result();
            $data = $rs->fetch_array(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $data;
        }
        public function daoCount(){}
        public function daoAdd($object){}
        public function daoSearch($search){}
        public function daoUpdate($parametres){}
        public function daoDelete($nom){}
    }
?>