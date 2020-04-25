<?php
    class ContactezNous{
        private $idUtilisateur;
        private $message;
        private $motif;
        private $nom;
        private $prenom;

        function __construct(string $message, string $motif, string $nom, string $prenom, string $idUtilisateur){
            $this->message = $message;
            $this->motif = $motif;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->idUtilisateur = $idUtilisateur;
        }


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
         * Getter for Message
         *
         * @return [type]
         */
        public function getMessage()
        {
            return $this->message;
        }
        /**
         * Setter for Message
         * @var [type] message
         *
         * @return self
         */
        public function setMessage($message)
        {
            $this->message = $message;
            return $this;
        }
        /**
         * Getter for Motif
         *
         * @return [type]
         */
        public function getMotif()
        {
            return $this->motif;
        }
        /**
         * Setter for Motif
         * @var [type] motif
         *
         * @return self
         */
        public function setMotif($motif)
        {
            $this->motif = $motif;
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
    }
?>