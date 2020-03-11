<?php
    class Utilisateur{
        private $idUtilisateur;
        private $nom;
        private $prenom;
        private $pseudo;
        private $password;
        private $email;
        private $num;

        /**
         * Getter for IdUtilisateur
         *
         * @return [type]
         */
        public function getIdUtilisateur()
        {
            return $this->idUtilisateur;
        }

        /**
         * Setter for IdUtilisateur
         * @var [type] idUtilisateur
         *
         * @return self
         */
        public function setIdUtilisateur($idUtilisateur)
        {
            $this->idUtilisateur = $idUtilisateur;
            return $this;
        }


        /**
         * Getter for Nom
         *
         * @return [type]
         */
        public function getNom()
        {
            return $this->nom;
        }

        /**
         * Setter for Nom
         * @var [type] nom
         *
         * @return self
         */
        public function setNom($nom)
        {
            $this->nom = $nom;
            return $this;
        }


        /**
         * Getter for Prenom
         *
         * @return [type]
         */
        public function getPrenom()
        {
            return $this->prenom;
        }

        /**
         * Setter for Prenom
         * @var [type] prenom
         *
         * @return self
         */
        public function setPrenom($prenom)
        {
            $this->prenom = $prenom;
            return $this;
        }


        /**
         * Getter for Pseudo
         *
         * @return [type]
         */
        public function getPseudo()
        {
            return $this->pseudo;
        }

        /**
         * Setter for Pseudo
         * @var [type] pseudo
         *
         * @return self
         */
        public function setPseudo($pseudo)
        {
            $this->pseudo = $pseudo;
            return $this;
        }


        /**
         * Getter for Password
         *
         * @return [type]
         */
        public function getPassword()
        {
            return $this->password;
        }

        /**
         * Setter for Password
         * @var [type] password
         *
         * @return self
         */
        public function setPassword($password)
        {
            $this->password = $password;
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

    }
?>