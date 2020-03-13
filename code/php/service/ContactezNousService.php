<?php
    include_once("../model/ContactezNous.php");

    class ContactezNousService{

        private $contactezNousDataAccess;

        public function __construct(){
            $this->contactezNousDataAccess = new ContactezNousDataAccess();
        }
        public function InsertMessage($insert){
            $Contact = new ContactezNous($_POST["message"], $_POST["motif"]);
        }
    }
?>