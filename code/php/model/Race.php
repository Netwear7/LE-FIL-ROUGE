<?php
    class Race{
        private $idRace;
        private $nomRace;

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
         * Getter for NomRace
         *
         * @return [type]
         */
        public function getNomRace()
        {
            return $this->nomRace;
        }

        /**
         * Setter for NomRace
         * @var [type] nomRace
         *
         * @return self
         */
        public function setNomRace($nomRace)
        {
            $this->nomRace = $nomRace;
            return $this;
        }

    }
?>