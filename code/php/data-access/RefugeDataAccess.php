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
            $mysqli = $this->connexion();
            $stmt = $mysqli->prepare('SELECT * from refuge where ID_REFUGE = ?');
            $stmt->bind_param('s',$id);
            $stmt->execute();
            $rs = $stmt->get_result();
            $data = $rs->fetch_array(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $data;
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
        public function daoDelete($idRefuge){
            $mysqli = new mysqli('localhost','root','','bddanimaux');
            $stmt = $mysqli->prepare('DELETE FROM refuge where ID_REFUGE = ?');
            $stmt->bind_param('s', $idRefuge);
            $stmt->execute();
            $mysqli->close();
            return   $result = $stmt ? "La suppression a bien été effectuée " : "La suppression a échouée ";
        }
    }
?>