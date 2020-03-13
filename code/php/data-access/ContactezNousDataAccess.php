<?php
    class ContactezNousDataAccess{

        public function connexion(){
            $db = new mysqli('localhost','root','','bddanimaux');
            return $db;    
        }
        public function deconnexion($db){
            $db -> close();
        }
        public function InsertMessage($insert){
            $db = $this->connexion();
            $db->query("INSERT INTO contactez-nous(message, motif, 1)
            VALUES($insert);");
            //mysqli_free_result($rs);
            $this->deconnexion($db);
        }
    }
?>