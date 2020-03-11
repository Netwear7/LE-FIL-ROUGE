<?php

include_once('../data-access/EspeceDataAccess.php');
    class EspeceService{
        public function afficherType(){
            $especeDataAccess = new EspeceDataAccess();
            $data = $especeDataAccess->afficherType();
            return $data;            
        }


    }
?>