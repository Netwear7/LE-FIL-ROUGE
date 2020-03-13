<?php
    /*
        $stmt = $db->prepare("INSERT INTO contactez_nous(msg, motif, id_utilisateur)VALUES(?, ?, 2)");

        Changer le 2 par l'id_utilisateur 
        qui écrit le message.
    */

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
            $stmt = $db->prepare("INSERT INTO contactez_nous(msg, motif, id_utilisateur)
            VALUES(?, ?, 2)");
            $stmt->bind_param("ss", $message, $motif);
            $stmt->execute();
            $this->deconnexion($db);
        }
    }
?>