<?php
    include_once("../model/ContactezNous.php");

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
            $message = $insert->getMessage();
            $motif = $insert->getMotif();
            $db->query("INSERT INTO contactez_nous(msg, motif, id_utilisateur)
            VALUES('$message', '$motif', 2)");
            $this->deconnexion($db);
        }
    }
?>