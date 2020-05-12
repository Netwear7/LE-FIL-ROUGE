<?php
    class InfectePar{
        private $idAnimal;
        private $idMaladie;

        public function __construct($idA, $idM){
            $this->idAnimal = $idA;
            $this->idMaladie = $idM;
        }

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
    }
?>