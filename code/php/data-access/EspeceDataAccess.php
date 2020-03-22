<?php
    class EspeceDataAccess{
        public function connexion(){
            $mysqli = new mysqli('localhost','root','','bddanimaux');
            return $mysqli;    
        }
        public function deconnexion($mysqli){
            $mysqli->close();
        }
        public function afficherType(){
            $mysqli = $this->connexion();
            $stmt = $mysqli -> prepare("SELECT nom_espece FROM espece");
            $stmt -> execute();  
            $rs = $stmt -> get_result();          
            $data= $rs -> fetch_all(MYSQLI_ASSOC);
            $rs -> free();
            $this->deconnexion($mysqli);  
            return $data;
        }
    }
?>