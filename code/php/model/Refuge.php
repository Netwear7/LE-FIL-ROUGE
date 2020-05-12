<?php
    class Refuge{
        private $idRefuge;
        private $region;
        private $departement;
        private $email;
        private $num;
        private $idAdresse;

        
        
        public function __construct($infos, $id)
        {
            $this->region = $infos["region"];
            $this->departement = $infos["departement"];
            $this->email = $infos["email"];
            $this->num = $infos["num"];
			$this->idAdresse = $id;
        }
        
        /**
         * Getter for IdRefuge
         *
         * @return [type]
         */
        public function getIdRefuge()
        {
            return $this->idRefuge;
        }
        
        /**
         * Setter for IdRefuge
         * @var [type] idRefuge
         *
         * @return self
         */
        public function setIdRefuge($idRefuge)
        {
            $this->idRefuge = $idRefuge;
            return $this;
        }
        
        
        /**
         * Getter for Region
         *
         * @return [type]
         */
        public function getRegion()
        {
            return $this->region;
        }
        
        /**
         * Setter for Region
         * @var [type] region
         *
         * @return self
         */
        public function setRegion($region)
        {
            $this->region = $region;
            return $this;
        }
        
        
        /**
         * Getter for Departement
         *
         * @return [type]
         */
        public function getDepartement()
        {
            return $this->departement;
        }
        
        /**
         * Setter for Departement
         * @var [type] departement
         *
         * @return self
         */
        public function setDepartement($departement)
        {
            $this->departement = $departement;
            return $this;
        }
        
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
         * Getter for Num
         *
         * @return [type]
         */
        public function getNum()
        {
            return $this->num;
        }

        /**
         * Setter for Num
         * @var [type] num
         *
         * @return self
         */
        public function setNum($num)
        {
            $this->num = $num;
            return $this;
        }

               /**
         * Getter for Email
         *
         * @return [type]
         */
        public function getEmail()
        {
            return $this->email;
        }

        /**
         * Setter for Email
         * @var [type] email
         *
         * @return self
         */
        public function setEmail($email)
        {
            $this->email = $email;
            return $this;
        }
    }
?>