<?php

include_once '../service/ServiceCommun.php';
include_once '../Interfaces/InterfaceService.php';


    class AvoirCouleurService extends ServiceCommun implements InterfaceService{

        public function serviceSelectAll(){}
        public function serviceSelect($id){}
        public function serviceCount(){}

        public function serviceAdd(object $couleurAnimal)
        {
            $this->getDataAccessObject()->daoAdd($couleurAnimal);
        }

        public function serviceSearch($search){}
        public function serviceUpdate($post){}
        public function serviceDelete($infosAnimal){
            $this->getDataAccessObject()->daoDelete($infosAnimal);
        }
    }
?>