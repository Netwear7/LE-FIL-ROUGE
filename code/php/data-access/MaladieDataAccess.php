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

        }
        public function daoDelete($nom){

        }
    }
?>