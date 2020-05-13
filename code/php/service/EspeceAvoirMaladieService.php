<?php

    include_once '../service/ServiceCommun.php';
    include_once '../Interfaces/InterfaceService.php';
    include_once '../model/EspeceAvoirMaladie.php';

    class EspeceAvoirMaladieService extends ServiceCommun implements InterfaceService{

        public function serviceSelectAll(){
            $data = $this->getDataAccessObject()->daoSelectAll();
            return $data;
        }
        public function serviceSelect($id){}
        public function InsertPostToEntityAndAdd(array $post){
            $especeAvoirMaladie = new EspeceAvoirMaladie();
            $especeAvoirMaladie->setIdEspece($post["espece"]);
            $especeAvoirMaladie->setIdMaladie($post["maladie"]);
            $this->getDataAccessObject()->daoAdd($especeAvoirMaladie);
        }
        public function serviceCount(){}
        public function serviceAdd($EspeceAvoirMaladie){
            $this->getDataAccessObject()->daoAdd($EspeceAvoirMaladie);
        }
        public function serviceSearch($search){}
        public function serviceUpdate($post){}
        public function serviceDelete($nom){}
    }
?>