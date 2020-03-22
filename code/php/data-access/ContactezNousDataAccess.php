<?php
    /*
        $stmt = $db->prepare("INSERT INTO contactez_nous(msg, motif, id_utilisateur)VALUES(?, ?, 2)");

        Changer le 2 par l'id_utilisateur 
        qui écrit le message.
    */

    include_once("../model/ContactezNous.php");

    class ContactezNousDataAccess{
        public function connexion(){
            $mysqli = new mysqli('localhost','root','','bddanimaux');
            return $mysqli;    
        }
        public function deconnexion($mysqli){
            $mysqli->close();
        }
        public function InsertMessage($insert){
            $mysqli = $this->connexion();
            $message = $insert->getMessage();
            $motif = $insert->getMotif();
            $stmt = $mysqli->prepare("INSERT INTO contactez_nous(msg, motif, id_utilisateur)
            VALUES(?, ?, 2)");
            $stmt->bind_param("ss", $message, $motif);
            $stmt->execute();
            $this->deconnexion($mysqli);
        }
    }
?>