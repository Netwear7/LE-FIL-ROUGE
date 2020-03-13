<?php
    include_once("../data-access/ContactezNousDataAccess.php");
    include_once("../model/ContactezNous.php");

    class ContactezNousService{
        private $contactezNousDataAccess;

        public function __construct(){
            $this->contactezNousDataAccess = new ContactezNousDataAccess();
        }
        public function InsertMessage(array $array){
            $insert = new ContactezNous($array["message"], $array["motif"]);
            $this->contactezNousDataAccess->InsertMessage($insert);
        }
    }
?>