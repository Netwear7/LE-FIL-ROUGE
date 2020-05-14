<?php

    include_once('../service/ServiceCommun.php');
    include_once('../Interfaces/InterfaceService.php');
    include_once('../model/Refuge.php');

    class RefugeService extends ServiceCommun implements InterfaceService{
        public function serviceSelectAll(){
            $data = $this->getDataAccessObject()->daoSelectAll();
            return $data;
        }
        public function serviceSelect($id){
            return $this->getDataAccessObject()->daoSelect($id);
        }
        public function serviceCount(){
            
        }
        public function InsertPostToEntityAndAdd(array $post, $id){
            $refuge = new Refuge($post, $id);
            $this->getDataAccessObject()->daoAdd($refuge);
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