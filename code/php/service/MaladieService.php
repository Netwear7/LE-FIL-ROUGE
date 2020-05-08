<?php

    include_once('../service/ServiceCommun.php');
    include_once('../Interfaces/InterfaceService.php');
    include_once('../model/Maladie.php');

    class MaladieService extends ServiceCommun implements InterfaceService{
        public function serviceSelectAll(){
            $data = $this->getDataAccessObject()->daoSelectAll();
            return $data;
        }
        public function serviceSelect($id){
            
        }
        public function serviceCount(){
            
        }

        public function InsertPostToEntityAndAdd(array $post){
            $maladie = new Maladie($post);
            $this->getDataAccessObject()->daoAdd($maladie);
        }

        public function serviceAdd(object $var){
            
        }
        public function serviceSearch($search){
            
        }
        public function serviceUpdate(array $post){
            
        }
        public function serviceDelete($nom){
            
        }
    }
?>