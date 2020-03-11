<?php
    class Adresse{
        private $idAdresse;
        private $numero;
        private $rue;
        private $ville;
        private $codePostale;

        /**
         * Getter for IdAdresse
         *
         * @return [type]
         */
        public function getIdAdresse()
        {
            return $this->idAdresse;
        }

        /**
         * Setter for IdAdresse
         * @var [type] idAdresse
         *
         * @return self
         */
        public function setIdAdresse($idAdresse)
        {
            $this->idAdresse = $idAdresse;
            return $this;
        }


        /**
         * Getter for Numero
         *
         * @return [type]
         */
        public function getNumero()
        {
            return $this->numero;
        }

        /**
         * Setter for Numero
         * @var [type] numero
         *
         * @return self
         */
        public function setNumero($numero)
        {
            $this->numero = $numero;
            return $this;
        }


        /**
         * Getter for Rue
         *
         * @return [type]
         */
        public function getRue()
        {
            return $this->rue;
        }

        /**
         * Setter for Rue
         * @var [type] rue
         *
         * @return self
         */
        public function setRue($rue)
        {
            $this->rue = $rue;
            return $this;
        }


        /**
         * Getter for Ville
         *
         * @return [type]
         */
        public function getVille()
        {
            return $this->ville;
        }

        /**
         * Setter for Ville
         * @var [type] ville
         *
         * @return self
         */
        public function setVille($ville)
        {
            $this->ville = $ville;
            return $this;
        }


        /**
         * Getter for CodePostale
         *
         * @return [type]
         */
        public function getCodePostale()
        {
            return $this->codePostale;
        }

        /**
         * Setter for CodePostale
         * @var [type] codePostale
         *
         * @return self
         */
        public function setCodePostale($codePostale)
        {
            $this->codePostale = $codePostale;
            return $this;
        }

    }
?>