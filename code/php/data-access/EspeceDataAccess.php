<?php
    class EspeceDataAccess{
        public function connexion(){
            $db = new mysqli('localhost','root','','bddanimaux');
            return $db;    
        }

        public function deconnexion($db){
            $db -> close();
        }

        public function afficherType(){
            $db=$this->connexion();
            $stmt = $db -> prepare("SELECT nom_espece FROM espece");
            $stmt -> execute();  
            $rs = $stmt -> get_result();          
            $data= $rs -> fetch_all(MYSQLI_ASSOC);
            $rs -> free();
            $this->deconnexion($db);  
            return $data;
        }

    }
?>