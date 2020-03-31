<?php
    class RaceDataAccess{
        public function connexion(){
            $mysqli = new mysqli('localhost','root','','bddanimaux');
            return $mysqli;    
        }
        public function deconnexion($mysqli){
            $mysqli->close();
        }
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
    }
?>