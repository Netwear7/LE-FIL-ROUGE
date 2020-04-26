<?php
    
    include_once("../Interfaces/InterfaceDao.php");
    include_once("logBdd.php");

    class CouleurAnimalDataAccess extends LogBdd implements InterfaceDao{
        public function afficherCouleur(){
            $mysqli = $this->connexion();
            $stmt = $mysqli->prepare("SELECT couleur FROM couleur_animal");
            $stmt->execute();  
            $rs=$stmt->get_result();          
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);  
            return $data;
        }
        public function daoSelectAll(){
            $mysqli = $this->connexion();
            $rs = $mysqli->query('SELECT * from couleur_animal');
            //J'ai changer le fetch array en fetch all pour la page admin
            //exactement comme les autres DaoSelectAll
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
        
    }
?>