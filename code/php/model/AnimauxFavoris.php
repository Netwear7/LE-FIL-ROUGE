<?php


class AnimauxFavoris{
        private $idAnimal;
        private $nomAnimal;
        private $DateNaissanceAnimal;
        private $PoidsAnimal;
        private $noPuce;
        private $caractereAnimal;
        private $specificiteAnimal;
        private $tailleAnimal;
        private $robeAnimal;
        private $dateArrivee;
        private $dateSortie;
        private $idUtilisateur;




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

        /**
         * Get the value of nomAnimal
         */ 
        public function getNomAnimal()
        {
                return $this->nomAnimal;
        }

        /**
         * Set the value of nomAnimal
         *
         * @return  self
         */ 
        public function setNomAnimal($nomAnimal)
        {
                $this->nomAnimal = $nomAnimal;

                return $this;
        }

        /**
         * Get the value of DateNaissanceAnimal
         */ 
        public function getDateNaissanceAnimal()
        {
                return $this->DateNaissanceAnimal;
        }

        /**
         * Set the value of DateNaissanceAnimal
         *
         * @return  self
         */ 
        public function setDateNaissanceAnimal($DateNaissanceAnimal)
        {
                $this->DateNaissanceAnimal = $DateNaissanceAnimal;

                return $this;
        }

        /**
         * Get the value of PoidsAnimal
         */ 
        public function getPoidsAnimal()
        {
                return $this->PoidsAnimal;
        }

        /**
         * Set the value of PoidsAnimal
         *
         * @return  self
         */ 
        public function setPoidsAnimal($PoidsAnimal)
        {
                $this->PoidsAnimal = $PoidsAnimal;

                return $this;
        }

        /**
         * Get the value of noPuce
         */ 
        public function getNoPuce()
        {
                return $this->noPuce;
        }

        /**
         * Set the value of noPuce
         *
         * @return  self
         */ 
        public function setNoPuce($noPuce)
        {
                $this->noPuce = $noPuce;

                return $this;
        }

        /**
         * Get the value of caractereAnimal
         */ 
        public function getCaractereAnimal()
        {
                return $this->caractereAnimal;
        }

        /**
         * Set the value of caractereAnimal
         *
         * @return  self
         */ 
        public function setCaractereAnimal($caractereAnimal)
        {
                $this->caractereAnimal = $caractereAnimal;

                return $this;
        }

        /**
         * Get the value of specificiteAnimal
         */ 
        public function getSpecificiteAnimal()
        {
                return $this->specificiteAnimal;
        }

        /**
         * Set the value of specificiteAnimal
         *
         * @return  self
         */ 
        public function setSpecificiteAnimal($specificiteAnimal)
        {
                $this->specificiteAnimal = $specificiteAnimal;

                return $this;
        }

        /**
         * Get the value of tailleAnimal
         */ 
        public function getTailleAnimal()
        {
                return $this->tailleAnimal;
        }

        /**
         * Set the value of tailleAnimal
         *
         * @return  self
         */ 
        public function setTailleAnimal($tailleAnimal)
        {
                $this->tailleAnimal = $tailleAnimal;

                return $this;
        }

        /**
         * Get the value of robeAnimal
         */ 
        public function getRobeAnimal()
        {
                return $this->robeAnimal;
        }

        /**
         * Set the value of robeAnimal
         *
         * @return  self
         */ 
        public function setRobeAnimal($robeAnimal)
        {
                $this->robeAnimal = $robeAnimal;

                return $this;
        }

        /**
         * Get the value of dateArrivee
         */ 
        public function getDateArrivee()
        {
                return $this->dateArrivee;
        }

        /**
         * Set the value of dateArrivee
         *
         * @return  self
         */ 
        public function setDateArrivee($dateArrivee)
        {
                $this->dateArrivee = $dateArrivee;

                return $this;
        }

        /**
         * Get the value of dateSortie
         */ 
        public function getDateSortie()
        {
                return $this->dateSortie;
        }

        /**
         * Set the value of dateSortie
         *
         * @return  self
         */ 
        public function setDateSortie($dateSortie)
        {
                $this->dateSortie = $dateSortie;

                return $this;
        }

        /**
         * Get the value of idUtilisateur
         */ 
        public function getIdUtilisateur()
        {
                return $this->idUtilisateur;
        }

        /**
         * Set the value of idUtilisateur
         *
         * @return  self
         */ 
        public function setIdUtilisateur($idUtilisateur)
        {
                $this->idUtilisateur = $idUtilisateur;

                return $this;
        }
}

?>