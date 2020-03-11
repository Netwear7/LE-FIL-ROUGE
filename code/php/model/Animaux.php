<?php
    class Animaux{
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

        /**
         * Getter for IdAnimal
         *
         * @return [type]
         */
        public function getIdAnimal()
        {
            return $this->idAnimal;
        }

        /**
         * Setter for IdAnimal
         * @var [type] idAnimal
         *
         * @return self
         */
        public function setIdAnimal($idAnimal)
        {
            $this->idAnimal = $idAnimal;
            return $this;
        }


        /**
         * Getter for NomAnimal
         *
         * @return [type]
         */
        public function getNomAnimal()
        {
            return $this->nomAnimal;
        }

        /**
         * Setter for NomAnimal
         * @var [type] nomAnimal
         *
         * @return self
         */
        public function setNomAnimal($nomAnimal)
        {
            $this->nomAnimal = $nomAnimal;
            return $this;
        }


        /**
         * Getter for DateNaissanceAnimal
         *
         * @return [type]
         */
        public function getDateNaissanceAnimal()
        {
            return $this->DateNaissanceAnimal;
        }

        /**
         * Setter for DateNaissanceAnimal
         * @var [type] DateNaissanceAnimal
         *
         * @return self
         */
        public function setDateNaissanceAnimal($DateNaissanceAnimal)
        {
            $this->DateNaissanceAnimal = $DateNaissanceAnimal;
            return $this;
        }


        /**
         * Getter for PoidsAnimal
         *
         * @return [type]
         */
        public function getPoidsAnimal()
        {
            return $this->PoidsAnimal;
        }

        /**
         * Setter for PoidsAnimal
         * @var [type] PoidsAnimal
         *
         * @return self
         */
        public function setPoidsAnimal($PoidsAnimal)
        {
            $this->PoidsAnimal = $PoidsAnimal;
            return $this;
        }


        /**
         * Getter for NoPuce
         *
         * @return [type]
         */
        public function getNoPuce()
        {
            return $this->noPuce;
        }

        /**
         * Setter for NoPuce
         * @var [type] noPuce
         *
         * @return self
         */
        public function setNoPuce($noPuce)
        {
            $this->noPuce = $noPuce;
            return $this;
        }


        /**
         * Getter for CaractereAnimal
         *
         * @return [type]
         */
        public function getCaractereAnimal()
        {
            return $this->caractereAnimal;
        }

        /**
         * Setter for CaractereAnimal
         * @var [type] caractereAnimal
         *
         * @return self
         */
        public function setCaractereAnimal($caractereAnimal)
        {
            $this->caractereAnimal = $caractereAnimal;
            return $this;
        }


        /**
         * Getter for SpecificiteAnimal
         *
         * @return [type]
         */
        public function getSpecificiteAnimal()
        {
            return $this->specificiteAnimal;
        }

        /**
         * Setter for SpecificiteAnimal
         * @var [type] specificiteAnimal
         *
         * @return self
         */
        public function setSpecificiteAnimal($specificiteAnimal)
        {
            $this->specificiteAnimal = $specificiteAnimal;
            return $this;
        }


        /**
         * Getter for TailleAnimal
         *
         * @return [type]
         */
        public function getTailleAnimal()
        {
            return $this->tailleAnimal;
        }

        /**
         * Setter for TailleAnimal
         * @var [type] tailleAnimal
         *
         * @return self
         */
        public function setTailleAnimal($tailleAnimal)
        {
            $this->tailleAnimal = $tailleAnimal;
            return $this;
        }


        /**
         * Getter for RobeAnimal
         *
         * @return [type]
         */
        public function getRobeAnimal()
        {
            return $this->robeAnimal;
        }

        /**
         * Setter for RobeAnimal
         * @var [type] robeAnimal
         *
         * @return self
         */
        public function setRobeAnimal($robeAnimal)
        {
            $this->robeAnimal = $robeAnimal;
            return $this;
        }


        /**
         * Getter for DateArrivee
         *
         * @return [type]
         */
        public function getDateArrivee()
        {
            return $this->dateArrivee;
        }

        /**
         * Setter for DateArrivee
         * @var [type] dateArrivee
         *
         * @return self
         */
        public function setDateArrivee($dateArrivee)
        {
            $this->dateArrivee = $dateArrivee;
            return $this;
        }


        /**
         * Getter for DateSortie
         *
         * @return [type]
         */
        public function getDateSortie()
        {
            return $this->dateSortie;
        }

        /**
         * Setter for DateSortie
         * @var [type] dateSortie
         *
         * @return self
         */
        public function setDateSortie($dateSortie)
        {
            $this->dateSortie = $dateSortie;
            return $this;
        }

    }
?>