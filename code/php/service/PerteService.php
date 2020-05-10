<?php

include_once '../service/ServiceCommun.php';
include_once '../Interfaces/InterfaceService.php';
include_once '../model/Perte.php';

    class PerteService extends ServiceCommun implements InterfaceService{



        public function serviceSelectAll(){
            $data = $this->getDataAccessObject()->daoSelectAll();
            return $data;
        }
        public function serviceSelect($id){
           $data = $this->getDataAccessObject()->daoSelect($id);
           return $data;
        }
        public function serviceCount(){}

        public function InsertPostToEntityAndAdd(array $post){
            $perte = new Perte($post);
            $this->getDataAccessObject()->daoAdd($perte);
        }

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