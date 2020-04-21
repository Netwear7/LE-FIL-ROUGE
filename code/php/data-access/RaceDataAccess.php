<?php

include_once '../data-access/LogBdd.php';
include_once '../Interfaces/InterfaceDao.php';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


    class RaceDataAccess  extends LogBdd   implements InterfaceDao{

        public function selectRace($request,$value,$type){
            $mysqli = $this->connexion();
            $stmt = $mysqli -> prepare("SELECT A.nom_race FROM race as A INNER JOIN appartenir_espece as B on A.id_race=B.id_race INNER JOIN espece as C on B.id_espece=C.id_espece WHERE $request ");
            $stmt->bind_param($type, $value);
            $stmt->execute();    
            $rs = $stmt -> get_result();          
            $data= $rs -> fetch_all(MYSQLI_ASSOC);
            $rs -> free();
            $this->deconnexion($mysqli); 
            return $data;
        }

        public function selectRaceForAdd($request,$value,$type){
            $mysqli = $this->connexion();
            $stmt = $mysqli -> prepare("SELECT A.nom_race, B.id_race FROM race as A INNER JOIN appartenir_espece as B on A.id_race=B.id_race INNER JOIN espece as C on B.id_espece=C.id_espece WHERE $request ");
            $stmt->bind_param($type, $value);
            $stmt->execute();    
            $rs = $stmt -> get_result();          
            $data= $rs -> fetch_all(MYSQLI_ASSOC);
            $rs -> free();
            $this->deconnexion($mysqli); 
            return $data;
        }


        public function selectAllCatRaces(){
            $mysqli = $this->connexion();
            $stmt = $mysqli->prepare('SELECT * from race as A INNER JOIN appartenir_espece as B on A.ID_RACE = B.ID_RACE where ID_ESPECE = 2');
            $stmt->execute();
            $rs = $stmt->get_result();
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $data;
        }

        public function daoSelectAll(){}
        public function daoSelect(int $id){}
        public function daoCount(){}
        public function daoAdd(object $object){}
        public function daoSearch($search){}
        public function daoUpdate(array $parametres){}
        public function daoDelete(string $nom){}
    }
?>