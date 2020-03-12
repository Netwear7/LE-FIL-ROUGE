<?php

include_once('../data-access/EspeceDataAccess.php');
    class EspeceService{

        private $especeDataAccess;

        public function __construct(){
            $this->especeDataAccess = new EspeceDataAccess();
        }

        public function afficherType(){
            $data = $this->especeDataAccess->afficherType();
            return $data;            
        }


    }
?>