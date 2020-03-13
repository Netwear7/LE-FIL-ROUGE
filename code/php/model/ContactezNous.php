<?php
    class ContactezNous{
        private $idUtilisateur;
        private $idMessage;
        private $message;
        private $motif;
        private static $increment = 0;

        function __construct(string $message, string $motif){
            $this->idUtilisateur = ++self::$increment;
            $this->message = $message;
            $this->motif = $motif;
        }
        /**
         * Getter for IdMessage
         *
         * @return [type]
         */
        public function getIdMessage()
        {
            return $this->idMessage;
        }
        /**
         * Setter for IdMessage
         * @var [type] idMessage
         *
         * @return self
         */
        public function setIdMessage($idMessage)
        {
            $this->idMessage = $idMessage;
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
    }
?>