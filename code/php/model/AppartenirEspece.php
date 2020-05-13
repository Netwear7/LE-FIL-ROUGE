<?php
    class AppartenirEspece{
        private $idRace;
        private $idEspece;

        /**
         * Getter for IdRace
         *
         * @return [type]
         */
        public function getIdRace()
        {
            return $this->idRace;
        }

        /**
         * Setter for IdRace
         * @var [type] idRace
         *
         * @return self
         */
        public function setIdRace($idRace)
        {
            $this->idRace = $idRace;
            return $this;
        }


        /**
         * Getter for IdEspece
         *
         * @return [type]
         */
        public function getIdEspece()
        {
            return $this->idEspece;
        }

        /**
         * Setter for IdEspece
         * @var [type] idEspece
         *
         * @return self
         */
        public function setIdEspece($idEspece)
        {
            $this->idEspece = $idEspece;
            return $this;
        }


      

    }
?>