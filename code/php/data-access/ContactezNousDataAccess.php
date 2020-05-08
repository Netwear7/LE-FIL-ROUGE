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
        public function daoSelectAll(){
            $mysqli = $this->connexion();
            $rs = $mysqli->query('SELECT * from contactez_nous');
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $data;
        }
        public function daoSelect($id){

        }
        public function daoCount(){

        }
        public function daoAdd($contactezNous){
            $mysqli = $this->connexion();
            $message = $contactezNous->getMessage();
            $motif = $contactezNous->getMotif();
            $nom = $contactezNous->getNom();
            $prenom = $contactezNous->getPrenom();
            $id_utilisateur = $contactezNous->getIdUtilisateur();
            $stmt = $mysqli->prepare("INSERT INTO contactez_nous(message, motif, id_utilisateur, nom, prenom)
            VALUES(?, ?, ?, ?, ?)");
            if($id_utilisateur == "null"){
                $id_utilisateur = null;
                $stmt->bind_param("ssiss", $message, $motif, $id_utilisateur, $nom, $prenom);
            }
            else {
                $stmt->bind_param("ssiss", $message, $motif, $id_utilisateur, $nom, $prenom);
            }
            $stmt->execute();
            $this->deconnexion($mysqli);
        }
        public function daoSearch($search){

        }
        public function daoUpdate($parametres){

        }
        public function daoDelete($nom){

        }
    }
?>