<?php
    class Espece{
        private $idEspece;
        private $nomEspece;

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


        /**
         * Getter for NomEspece
         *
         * @return [type]
         */
        public function getNomEspece()
        {
            return $this->nomEspece;
        }

        /**
         * Setter for NomEspece
         * @var [type] nomEspece
         *
         * @return self
         */
        public function setNomEspece($nomEspece)
        {
            $this->nomEspece = $nomEspece;
            return $this;
        }

    }
?>