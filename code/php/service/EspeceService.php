<?php

include_once '../service/ServiceCommun.php';
include_once '../Interfaces/InterfaceService.php';

    class EspeceService extends ServiceCommun implements InterfaceService {

        public function afficherType(){
            $data = $this->getDataAccessObject()->afficherType();
            return $data;            
        }

        public function selectAllCatRaces(){
            return $this->getDataAccessObject()->selectAllCatRaces();
        }


        public function serviceSelectAll(){}
        public function serviceSelect($id){}
        public function serviceCount(){}
        public function serviceAdd(object $var){}
        public function serviceSearch($search){}
        public function serviceUpdate(array $post){}
        public function serviceDelete($nom){}
    }





?>