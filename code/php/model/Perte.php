<?php
    class Perte{

        private $idPerte;
        private $datePerte;
        private $descPerte;
        private $idAnimal;

        public function __construct($infos){
            $this->setIdAnimal($infos["idAnimalPerdu"]);
            $this->setDatePerte($infos["datePerte"]);
            $this->setDescPerte($infos["precisionPerte"]);

        }

        /**
         * Getter for IdPerte
         *
         * @return [type]
         */
        public function getIdPerte()
        {
            return $this->idPerte;
        }

        /**
         * Setter for IdPerte
         * @var [type] idPerte
         *
         * @return self
         */
        public function setIdPerte($idPerte)
        {
            $this->idPerte = $idPerte;
            return $this;
        }


        /**
         * Getter for DatePerte
         *
         * @return [type]
         */
        public function getDatePerte()
        {
            return $this->datePerte;
        }

        /**
         * Setter for DatePerte
         * @var [type] datePerte
         *
         * @return self
         */
        public function setDatePerte($datePerte)
        {
            $this->datePerte = $datePerte;
            return $this;
        }


        /**
         * Getter for DescPerte
         *
         * @return [type]
         */
        public function getDescPerte()
        {
            return $this->descPerte;
        }

        /**
         * Setter for DescPerte
         * @var [type] descPerte
         *
         * @return self
         */
        public function setDescPerte($descPerte)
        {
            $this->descPerte = $descPerte;
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