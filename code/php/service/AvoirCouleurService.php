<?php

include_once '../service/ServiceCommun.php';
include_once '../Interfaces/InterfaceService.php';


    class AvoirCouleurService extends ServiceCommun implements InterfaceService{

        public function serviceSelectAll(){
            $data = $this->getDataAccessObject()->daoSelectAll();
            return $data;
        }
        public function serviceSelect($id){}
        public function serviceCount(){}

        public function serviceAdd(object $couleurAnimal)
        {
            try{
            $this->getDataAccessObject()->daoAdd($couleurAnimal);
            }catch (MysqliQueryException $mqe) {
                throw $mqe;
            }
        }

        public function serviceSearch($search){}
        public function serviceUpdate($post){}
        public function serviceDelete($infosAnimal){
            try{
            $this->getDataAccessObject()->daoDelete($infosAnimal);
            }catch (MysqliQueryException $mqe) {
                throw $mqe;
            }
        }
    }
?>