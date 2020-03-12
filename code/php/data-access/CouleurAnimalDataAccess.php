<?php
    class CouleurAnimalDataAccess{

        public function connexion(){
            $db = new mysqli('localhost','root','','bddanimaux');
            return $db;    
        }

        public function deconnexion($db){
            $db -> close();
        }

        public function afficherCouleur(){
            $db=$this->connexion();
            $stmt = $db -> prepare("SELECT couleur FROM couleur_animal");
            $stmt -> execute();  
            $rs = $stmt -> get_result();          
            $data= $rs -> fetch_all(MYSQLI_ASSOC);
            $rs -> free();
            $this->deconnexion($db);  
            return $data;
        }

    }

    
?>