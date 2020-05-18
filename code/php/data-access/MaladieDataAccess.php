<?php

    include_once '../data-access/LogBdd.php';
    include_once '../Interfaces/InterfaceDao.php';

    class MaladieDataAccess  extends LogBdd implements InterfaceDao{
        public function daoSelectAll(){
            $mysqli = $this->connexion();
            $rs = $mysqli->query('SELECT * from maladie');
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $data;
        }
        public function daoSelect($id){
            $mysqli = new mysqli('localhost','root','','bddanimaux');
            $stmt = $mysqli->prepare('SELECT * from maladie where ID_MALADIE = ?');
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
        public function daoAdd($object){
            $maladie = $object->getMaladie();
            $urgence = $object->getUrgence();
            $mysqli = new mysqli('localhost','root','','bddanimaux');
            $stmt = $mysqli->prepare('INSERT INTO maladie (MALADIE,URGENCE) VALUES (?,?) ');
            $stmt->bind_param('si',$maladie, $urgence);
            $stmt->execute();
            $mysqli->close();
        }
        public function daoSearch($search){

        }
        public function daoUpdate($parametres){
            $mysqli = $this->connexion(); 
            $maladie = $parametres["MALADIE"];
            $urgence = $parametres["URGENCE"];
            $id = $parametres["id"];
            $stmt = $mysqli->prepare('UPDATE maladie SET MALADIE = ?, URGENCE=? where ID_MALADIE=?');
            $stmt->bind_param("sis", $maladie, $urgence, $id);
            $stmt->execute();
            $this->deconnexion($mysqli); 
        }
        public function daoDelete($nom){

        }

        public function daoVerifyEmergency($idAnimal){
            $mysqli = $this->connexion();
            $stmt = $mysqli->prepare('SELECT * from maladie as A
                                      INNER JOIN est_infecte_par as B on A.id_maladie=B.id_maladie
                                      INNER JOIN animaux as C on B.id_animal=C.id_animal
                                      WHERE ? IN (B.id_animal) AND A.urgence=1');
            $stmt->bind_param('i', $idAnimal);
            $stmt->execute();
            $rs = $stmt->get_result(); 
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $data;
        }
    }
?>