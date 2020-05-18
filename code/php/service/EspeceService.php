<?php

include_once '../model/Espece.php';
include_once '../service/ServiceCommun.php';
include_once '../Interfaces/InterfaceService.php';

    class EspeceService extends ServiceCommun implements InterfaceService {

        public function afficherType(){
            $data = $this->getDataAccessObject()->afficherType();
            return $data;            
        }

        // Où cette fonction est elle utilisée ?
        public function selectAllCatRaces(){
            return $this->getDataAccessObject()->selectAllCatRaces();
        }
        public function InsertPostToEntityAndAdd(array $post){
            $espece = new Espece();
            $espece->setNomEspece($post["nomEspece"]);
            $this->getDataAccessObject()->daoAdd($espece);
        }
        public function updatePostToEntityAndAdd($post){
            $this->getDataAccessObject()->daoUpdate($post);
        }

        public function serviceSelectAll(){
            $data = $this->getDataAccessObject()->daoSelectAll();
            return $data;
        }
        public function serviceSelect($id){
            return $this->getDataAccessObject()->daoSelect($id);
        }
        public function serviceCount(){

        }
        public function serviceAdd(object $var){

        }
        public function serviceSearch($search){

        }
        public function serviceUpdate(array $post){

        }
        public function serviceDelete($id){
            $this->getDataAccessObject()->daoDelete($id);
        }
    }
?>