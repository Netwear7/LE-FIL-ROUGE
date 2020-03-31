<?php
    include_once '../Interfaces/InterfaceDao.php';
    include_once 'LogBdd.php';

    class PhotoAnimalDataAccess extends LogBdd implements InterfaceDao{
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
            $rs = $mysqli->query('SELECT DISTINCT * from photo_animal where PHOTO_PROFIL = true');
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $data;
        }
        public function daoSelectAllLostProfil(){
            $mysqli = $this->connexion();
            $rs = $mysqli->query('SELECT a.* from photo_animal as a
            INNER JOIN perte as b
            ON a.ID_ANIMAL = b.ID_ANIMAL
            where PHOTO_PROFIL = true');
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $data;
        }
        public function daoSelectAllProfilMalade(){
            $mysqli = $this->connexion();
            $rs = $mysqli->query('SELECT * FROM `est_infecte_par` as a 
            INNER JOIN photo_animal as b ON a.ID_ANIMAL = b.ID_ANIMAL');
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $data;
        }
        public function daoSelect($idAnimal){
            $mysqli = $this->connexion();
            $stmt = $mysqli->prepare('SELECT * from photo_animal where ID_PHOTO_ANIMAL = 3 and ID_ANIMAL = ?');
            $stmt->bind_param('i', $idAnimal);
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