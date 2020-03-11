<?php
    class Garderie{
        private $idGarderie;
        private $nbrPlace;
        private $dateEntree;
        private $dateSortie;

        /**
         * Getter for IdGarderie
         *
         * @return [type]
         */
        public function getIdGarderie()
        {
            return $this->idGarderie;
        }

        /**
         * Setter for IdGarderie
         * @var [type] idGarderie
         *
         * @return self
         */
        public function setIdGarderie($idGarderie)
        {
            $this->idGarderie = $idGarderie;
            return $this;
        }


        /**
         * Getter for NbrPlace
         *
         * @return [type]
         */
        public function getNbrPlace()
        {
            return $this->nbrPlace;
        }

        /**
         * Setter for NbrPlace
         * @var [type] nbrPlace
         *
         * @return self
         */
        public function setNbrPlace($nbrPlace)
        {
            $this->nbrPlace = $nbrPlace;
            return $this;
        }


        /**
         * Getter for DateEntree
         *
         * @return [type]
         */
        public function getDateEntree()
        {
            return $this->dateEntree;
        }

        /**
         * Setter for DateEntree
         * @var [type] dateEntree
         *
         * @return self
         */
        public function setDateEntree($dateEntree)
        {
            $this->dateEntree = $dateEntree;
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