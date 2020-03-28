<?php

include_once('../Interfaces/InterfaceDao.php');
    class AvoirCouleurDataAccess implements InterfaceDao {

        public function daoSelectAll(){}
        public function daoSelect(int $id){}
        public function daoCount(){}
        public function daoAdd(object $object)
        {   
            $idCouleur = $object->getCouleur();
            $idAnimal = $object->getIdAnimal();
            if ($idCouleur == "Roux"){
                $idCouleur == 1;
            }
            $mysqli = new mysqli('localhost','root','','bddanimaux');
            $stmt = $mysqli->prepare('INSERT INTO avoir_couleur(ID_COULEUR,ID_ANIMAL) VALUES(?,?)');
            $stmt->bind_param('si',$idCouleur,$idAnimal);
            $stmt->execute();
            $mysqli->close();
        }
        public function daoSearch($search){}
        public function daoUpdate(array $parametres){}
        public function daoDelete(string $nom){}

    }
?>