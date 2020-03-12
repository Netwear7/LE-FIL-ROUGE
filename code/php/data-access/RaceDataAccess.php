<?php
    class RaceDataAccess{

        public function connexion(){
            $db = new mysqli('localhost','root','','bddanimaux');
            return $db;    
        }

        public function deconnexion($db){
            $db -> close();
        }

        public function afficherRace(){
            $db=$this->connexion();
            $stmt = $db -> prepare("SELECT nom_race FROM race");
            $stmt -> execute();  
            $rs = $stmt -> get_result();          
            $data= $rs -> fetch_all(MYSQLI_ASSOC);
            $rs -> free();
            $this->deconnexion($db);  
            return $data;
        }

    }
?>