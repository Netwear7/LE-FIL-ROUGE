<?php
    class CouleurAnimal{
        private $idCouleur;
        private $couleur;

        /**
         * Getter for IdCouleur
         *
         * @return [type]
         */
        public function getIdCouleur()
        {
            return $this->idCouleur;
        }

        /**
         * Setter for IdCouleur
         * @var [type] idCouleur
         *
         * @return self
         */
        public function setIdCouleur($idCouleur)
        {
            $this->idCouleur = $idCouleur;
            return $this;
        }


        /**
         * Getter for Couleur
         *
         * @return [type]
         */
        public function getCouleur()
        {
            return $this->couleur;
        }

        /**
         * Setter for Couleur
         * @var [type] couleur
         *
         * @return self
         */
        public function setCouleur($couleur)
        {
            $this->couleur = $couleur;
            return $this;
        }

    }
?>