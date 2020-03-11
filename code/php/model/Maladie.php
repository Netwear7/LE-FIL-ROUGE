<?php
    class Maladie{
        private $idMaladie;
        private $maladie;
        private $urgence;

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
         * Getter for Maladie
         *
         * @return [type]
         */
        public function getMaladie()
        {
            return $this->maladie;
        }

        /**
         * Setter for Maladie
         * @var [type] maladie
         *
         * @return self
         */
        public function setMaladie($maladie)
        {
            $this->maladie = $maladie;
            return $this;
        }


        /**
         * Getter for Urgence
         *
         * @return [type]
         */
        public function getUrgence()
        {
            return $this->urgence;
        }

        /**
         * Setter for Urgence
         * @var [type] urgence
         *
         * @return self
         */
        public function setUrgence($urgence)
        {
            $this->urgence = $urgence;
            return $this;
        }

    }
?>