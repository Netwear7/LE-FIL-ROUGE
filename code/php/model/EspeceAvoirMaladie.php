<?php
    class EspeceAvoirMaladie{
        private $idMaladie;
        private $idEspece;

        /**
         * Getter for IdMaladie
         *
         * @return [type]
         */
        public function getIdMaladie()
        {
            return $this->idMaladie;
        }

        /**
         * Setter for IdMaladie
         * @var [type] idMaladie
         *
         * @return self
         */
        public function setIdMaladie($idMaladie)
        {
            $this->idMaladie = $idMaladie;
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