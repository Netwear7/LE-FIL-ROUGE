<?php
    class RaceDataAccess{
        public function connexion(){
            $mysqli = new mysqli('localhost','root','','bddanimaux');
            return $mysqli;    
        }
        public function deconnexion($mysqli){
            $mysqli->close();
        }
        public function afficherRace(){
            $mysqli = $this->connexion();
            $stmt = $mysqli -> prepare("SELECT nom_race FROM race");
            $stmt -> execute();  
            $rs = $stmt -> get_result();          
            $data= $rs -> fetch_all(MYSQLI_ASSOC);
            $rs -> free();
            $this->deconnexion($mysqli); 
            return $data;
        }
    }
?>