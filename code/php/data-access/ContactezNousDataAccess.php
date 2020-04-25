<?php
    /*
        $stmt = $db->prepare("INSERT INTO contactez_nous(msg, motif, id_utilisateur)VALUES(?, ?, 2)");

        Changer le 2 par l'id_utilisateur 
        qui écrit le message.
    */

    include_once("../model/ContactezNous.php");
    include_once("../Interfaces/InterfaceDao.php");
    include_once("logBdd.php");

    class ContactezNousDataAccess extends LogBdd implements InterfaceDao{
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
        public function daoSelectAll(){
            $mysqli = $this->connexion();
            $rs = $mysqli->query('SELECT * from contactez_nous');
            $data = $rs->fetch_array(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $data;
        }
        public function daoSelect($id){

        }
        public function daoCount(){

        }
        public function daoAdd($object){

        }
        public function daoSearch($search){

        }
        public function daoUpdate($parametres){

        }
        public function daoDelete($nom){

        }
    }
?>