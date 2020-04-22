<?php

include_once '../data-access/LogBdd.php';
include_once '../Interfaces/InterfaceDao.php';

class DonationDataAccess extends LogBdd implements InterfaceDao{

    public function daoSelectAll(){
        $mysqli = $this->connexion();
        // Sans info en entrée, on peut utiliser 
        //$mysqli->query directement, et donc pas besoin de stmt->execute()

        /*
        $rs = $mysqli->query("SELECT A.nom, B.nom_race FROM animaux as A INNER JOIN race as B on A.id_race = B.id_race");  
        $data = $rs->fetch_all(MYSQLI_ASSOC);
        $rs -> free();
        ...
        */
        $stmt = $mysqli->prepare("SELECT * from donations");
        $stmt -> execute();  
        $rs = $stmt->get_result();          
        $data= $rs->fetch_all(MYSQLI_ASSOC);
        $rs -> free();
        $this->deconnexion($mysqli);
        return $data;
    }

    public function daoSelectAllUserDonations($id){
        $mysqli = $this->connexion();
        $stmt = $mysqli->prepare("SELECT * from donations where ID_UTILISATEUR = ?");
        $stmt->bind_param('s',$id);
        $stmt -> execute();  
        $rs = $stmt->get_result();          
        $data= $rs->fetch_all(MYSQLI_ASSOC);
        $rs -> free();
        $this->deconnexion($mysqli);
        return $data;
    }
    public function daoSelect(int $id){

    }
    public function daoCount(){

    }
    public function daoAdd(object $object){

    }
    public function daoSearch($search){

    }
    public function daoUpdate(array $parametres){

    }
    public function daoDelete(string $nom){

    }

}