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
            try {
                $this->getDataAccessObject()->daoAdd($perte);       
            }catch (MysqliQueryException $mqe) {
                throw $mqe;
            }
        }

        
        public function serviceSearch($search){}
        public function serviceUpdate($post){}
        public function serviceDelete($idAnimalRetrouve){
            try {

                $this->getDataAccessObject()->daoDelete($idAnimalRetrouve);
        
                }catch (MysqliQueryException $mqe) {
                    throw $mqe;
                }

        }
        
    }
?>