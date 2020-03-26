<?php
    class Animaux{
        private $idAnimal;
        private $nomAnimal;
        private $dateNaissanceAnimal;
        private $poidsAnimal;
        private $noPuce;
        private $caractereAnimal;
        private $specificiteAnimal;
        private $tailleAnimal;
        private $robeAnimal;
        private $especeAnimal;
        private $raceAnimal;
        private $idUtilisateurAnimal;
        private $sexeAnimal;
        private $couleurAnimal;
        private $dateArrivee;
        private $dateSortie;
        private $idRefuge;


        public function __construct($infos)
        {
            $this->setNomAnimal($infos["nomAnimal"]);
            $this->setDateNaissanceAnimal($infos["dateNaissance"]);
            $this->setNoPuce($infos["numeroPuce"]);
            $this->setPoidsAnimal($infos["poids"]);
            $this->setCaractereAnimal($infos["caractere"]);
            $this->setSpecificiteAnimal($infos["specificites"]);
            $this->setTailleAnimal($infos["taille"]);
            $this->setRobeAnimal($infos["robe"]);
            $this->setEspeceAnimal($infos["especeAnimale"]);
            $this->setRaceAnimal($infos["raceAnimale"]);
            $this->setIdUtilisateurAnimal($infos["idUtilisateur"]);
            $this->setSexeAnimal($infos["sexeAnimal"]);
            $this->setCouleurAnimal($infos["couleur"]);
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

        /**
         * Get the value of nomAnimal
         */ 
        public function getNomAnimal()
        {
                return $this->nomAnimal;
        }

        /**
         * Set the value of nomAnimal
         *
         * @return  self
         */ 
        public function setNomAnimal($nomAnimal)
        {
                $this->nomAnimal = $nomAnimal;

                return $this;
        }

        /**
         * Get the value of dateNaissanceAnimal
         */ 
        public function getDateNaissanceAnimal()
        {
                return $this->dateNaissanceAnimal;
        }

        /**
         * Set the value of dateNaissanceAnimal
         *
         * @return  self
         */ 
        public function setDateNaissanceAnimal($dateNaissanceAnimal)
        {
                $this->dateNaissanceAnimal = $dateNaissanceAnimal;

                return $this;
        }

        /**
         * Get the value of poidsAnimal
         */ 
        public function getPoidsAnimal()
        {
                return $this->poidsAnimal;
        }

        /**
         * Set the value of poidsAnimal
         *
         * @return  self
         */ 
        public function setPoidsAnimal($poidsAnimal)
        {
                $this->poidsAnimal = $poidsAnimal;

                return $this;
        }

        /**
         * Get the value of noPuce
         */ 
        public function getNoPuce()
        {
                return $this->noPuce;
        }

        /**
         * Set the value of noPuce
         *
         * @return  self
         */ 
        public function setNoPuce($noPuce)
        {
                $this->noPuce = $noPuce;

                return $this;
        }

        /**
         * Get the value of caractereAnimal
         */ 
        public function getCaractereAnimal()
        {
                return $this->caractereAnimal;
        }

        /**
         * Set the value of caractereAnimal
         *
         * @return  self
         */ 
        public function setCaractereAnimal($caractereAnimal)
        {
                 $this->caractereAnimal = $caractereAnimal;

                return $this;
        }

        /**
         * Get the value of specificiteAnimal
         */ 
        public function getSpecificiteAnimal()
        {
                return $this->specificiteAnimal;
        }

        /**
         * Set the value of specificiteAnimal
         *
         * @return  self
         */ 
        public function setSpecificiteAnimal($specificiteAnimal)
        {
                $this->specificiteAnimal = $specificiteAnimal;

                return $this;
        }

        /**
         * Get the value of tailleAnimal
         */ 
        public function getTailleAnimal()
        {
                return $this->tailleAnimal;
        }

        /**
         * Set the value of tailleAnimal
         *
         * @return  self
         */ 
        public function setTailleAnimal($tailleAnimal)
        {
                $this->tailleAnimal = $tailleAnimal;

                return $this;
        }

        /**
         * Get the value of robeAnimal
         */ 
        public function getRobeAnimal()
        {
                return $this->robeAnimal;
        }

        /**
         * Set the value of robeAnimal
         *
         * @return  self
         */ 
        public function setRobeAnimal($robeAnimal)
        {
                $this->robeAnimal = $robeAnimal;

                return $this;
        }

        /**
         * Get the value of raceAnimal
         */ 
        public function getRaceAnimal()
        {
                return $this->raceAnimal;
        }

        /**
         * Set the value of raceAnimal
         *
         * @return  self
         */ 
        public function setRaceAnimal($raceAnimal)
        {
                $this->raceAnimal = $raceAnimal;

                return $this;
        }

        /**
         * Get the value of idUtilisateurAnimal
         */ 
        public function getIdUtilisateurAnimal()
        {
                return $this->idUtilisateurAnimal;
        }

        /**
         * Set the value of idUtilisateurAnimal
         *
         * @return  self
         */ 
        public function setIdUtilisateurAnimal($idUtilisateurAnimal)
        {
                $this->idUtilisateurAnimal = $idUtilisateurAnimal;

                return $this;
        }

        /**
         * Get the value of sexeAnimal
         */ 
        public function getSexeAnimal()
        {
                return $this->sexeAnimal;
        }

        /**
         * Set the value of sexeAnimal
         *
         * @return  self
         */ 
        public function setSexeAnimal($sexeAnimal)
        {
                $this->sexeAnimal = $sexeAnimal;

                return $this;
        }

        /**
         * Get the value of couleurAnimal
         */ 
        public function getCouleurAnimal()
        {
                return $this->couleurAnimal;
        }

        /**
         * Set the value of couleurAnimal
         *
         * @return  self
         */ 
        public function setCouleurAnimal($couleurAnimal)
        {
                $this->couleurAnimal = $couleurAnimal;

                return $this;
        }

        /**
         * Get the value of dateArrivee
         */ 
        public function getDateArrivee()
        {
                return $this->dateArrivee;
        }

        /**
         * Set the value of dateArrivee
         *
         * @return  self
         */ 
        public function setDateArrivee($dateArrivee)
        {
                $this->dateArrivee = $dateArrivee;

                return $this;
        }

        /**
         * Get the value of dateSortie
         */ 
        public function getDateSortie()
        {
                return $this->dateSortie;
        }

        /**
         * Set the value of dateSortie
         *
         * @return  self
         */ 
        public function setDateSortie($dateSortie)
        {
                $this->dateSortie = $dateSortie;

                return $this;
        }

        /**
         * Get the value of idRefuge
         */ 
        public function getIdRefuge()
        {
                return $this->idRefuge;
        }

        /**
         * Set the value of idRefuge
         *
         * @return  self
         */ 
        public function setIdRefuge($idRefuge)
        {
                $this->idRefuge = $idRefuge;

                return $this;
        }

        /**
         * Get the value of especeAnimal
         */ 
        public function getEspeceAnimal()
        {
                return $this->especeAnimal;
        }

        /**
         * Set the value of especeAnimal
         *
         * @return  self
         */ 
        public function setEspeceAnimal($especeAnimal)
        {
                $this->especeAnimal = $especeAnimal;

                return $this;
        }
    }
?>