<?php

include_once '../service/ServiceCommun.php';
include_once '../Interfaces/InterfaceService.php';

    class PerteService extends ServiceCommun implements InterfaceService{



        public function serviceSelectAll(){}
        public function serviceSelect($id){
           $data = $this->getDataAccessObject()->daoSelect($id);
           return $data;
        }
        public function serviceCount(){}
        public function serviceAdd($perte){
            $this->getDataAccessObject()->daoAdd($perte);

        }
        public function serviceSearch($search){}
        public function serviceUpdate($post){}
        public function serviceDelete($idAnimalRetrouve){
            $this->getDataAccessObject()->daoDelete($idAnimalRetrouve);
        }
        
    }
?>