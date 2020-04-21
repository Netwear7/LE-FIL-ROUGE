<?php


include_once '../data-access/LogBdd.php';
include_once '../Interfaces/InterfaceDao.php';

    class AvoirCouleurDataAccess extends LogBdd implements InterfaceDao{

        public function daoSelectAll(){}
        public function daoSelect(int $id){}
        public function daoCount(){}
        public function daoAdd(object $object)
        {   
            $idCouleur = $object->getCouleur();
            $idAnimal = $object->getIdAnimal();
            $mysqli = $this->connexion();
            $stmt = $mysqli->prepare('INSERT INTO avoir_couleur(ID_COULEUR,ID_ANIMAL) VALUES(?,?)');
            $stmt->bind_param('ss',$idCouleur,$idAnimal);
            $stmt->execute();
            $this->deconnexion($mysqli);
        }
        public function daoSearch($search){}
        public function daoUpdate($parametres){}
        public function daoDelete($infosAnimal){
            $idAnimal = $infosAnimal["idAnimalRetrait"];
            $idCouleur = $infosAnimal["couleurAnimalRetrait"];
            $mysqli = $this->connexion();
            $stmt = $mysqli->prepare('DELETE FROM avoir_couleur WHERE ID_COULEUR = ? AND ID_ANIMAL = ?');
            $stmt->bind_param('ss',$idCouleur,$idAnimal);
            $stmt->execute();
            $this->deconnexion($mysqli);

        }

    }
?>