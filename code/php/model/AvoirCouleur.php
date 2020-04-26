<?php

    class AvoirCouleur{
        private $couleur;
        private $idAnimal;

        public function __construct($animal){
            $this->couleur = $animal->getCouleurAnimal();
            $this->idAnimal = $animal->getIdAnimal();
        }

        /**
         * Get the value of couleur
         */ 
        public function getCouleur()
        {
                return $this->couleur;
        }

        /**
         * Set the value of couleur
         *
         * @return  self
         */ 
        public function setCouleur($couleur)
        {
                $this->couleur = $couleur;

                return $this;
        }


        /**
         * Get the value of idAnimal
         */ 
        public function getIdAnimal()
        {
                return $this->idAnimal;
        }

        /**
         * Set the value of idAnimal
         *
         * @return  self
         */ 
        public function setIdAnimal($idAnimal)
        {
                $this->idAnimal = $idAnimal;

                return $this;
        }
    }

?>