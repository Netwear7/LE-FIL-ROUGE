<?php
    class Refuge{
        private $idRefuge;
        private $region;
        private $departement;

        /**
         * Getter for IdRefuge
         *
         * @return [type]
         */
        public function getIdRefuge()
        {
            return $this->idRefuge;
        }

        /**
         * Setter for IdRefuge
         * @var [type] idRefuge
         *
         * @return self
         */
        public function setIdRefuge($idRefuge)
        {
            $this->idRefuge = $idRefuge;
            return $this;
        }


        /**
         * Getter for Region
         *
         * @return [type]
         */
        public function getRegion()
        {
            return $this->region;
        }

        /**
         * Setter for Region
         * @var [type] region
         *
         * @return self
         */
        public function setRegion($region)
        {
            $this->region = $region;
            return $this;
        }


        /**
         * Getter for Departement
         *
         * @return [type]
         */
        public function getDepartement()
        {
            return $this->departement;
        }

        /**
         * Setter for Departement
         * @var [type] departement
         *
         * @return self
         */
        public function setDepartement($departement)
        {
            $this->departement = $departement;
            return $this;
        }

    }
?>