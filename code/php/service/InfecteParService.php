<?php
    class InfecteParService extends ServiceCommun implements InterfaceService{
        // public function serviceSearchAnimalsMalade(){
        //     return $this->getDataAccessObject()->daoSearchAnimalsMalade();
        // }
        public function serviceSelectAll(){}
        public function serviceSelect($id){}
        public function serviceCount(){}
        public function serviceAdd($infectePar){
            $this->getDataAccessObject()->daoAdd($infectePar);
        }
        public function serviceSearch($search){}
        public function serviceUpdate($post){}
        public function serviceDelete($nom){}
    }
?>