<?php

    include_once('../data-access/CouleurAnimalDataAccess.php');

    class CouleurAnimalService{

        public function afficherCouleur(){
            $couleurAnimalDataAccess = new CouleurAnimalDataAccess();
            $data = $couleurAnimalDataAccess->afficherCouleur();
            return $data;            
        }

    }
?>