<?php
    include_once '../service/ServiceCommun.php';
    include_once '../Interfaces/InterfaceService.php';

    class InfecteParService extends ServiceCommun implements InterfaceService{
        // public function serviceSearchAnimalsMalade(){
        //     return $this->getDataAccessObject()->daoSearchAnimalsMalade();
        // }
        public function serviceSelectAll(){
            $data = $this->getDataAccessObject()->daoSelectAll();
            return $data;
        }
        public function serviceSelect($id){}
        public function serviceCount(){}
        public function serviceAdd($infectePar){
            $this->getDataAccessObject()->daoAdd($infectePar);
        }
        public function serviceSearch($search){}
        public function serviceUpdate($post){}
        public function serviceDelete($id){
            $this->getDataAccessObject()->daoDelete($id);
        }
    }
?>