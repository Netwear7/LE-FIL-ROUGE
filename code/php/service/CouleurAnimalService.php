<?php

    include_once('../data-access/CouleurAnimalDataAccess.php');

    class CouleurAnimalService{

        private $couleurAnimalDataAccess;

        public function __construct(){
            $this->couleurAnimalDataAccess = new CouleurAnimalDataAccess();
        }

        public function afficherCouleur(){
            $data = $this->couleurAnimalDataAccess->afficherCouleur();
            return $data;            
        }

    }
?>