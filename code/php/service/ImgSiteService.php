<?php

    include_once('../service/ServiceCommun.php');
    include_once('../Interfaces/InterfaceService.php');

    class ImgSiteService extends ServiceCommun implements InterfaceService{
        public function serviceSelectAll(){
            $data = $this->getDataAccessObject()->daoSelectAll();
            return $data;
        }
        public function serviceSelect($id){
            
        }
        public function serviceCount(){
            
        }
        public function serviceAdd($photo){
            try{
                return $this->getDataAccessObject()->daoAdd($photo);
                }catch (MysqliQueryException $mqe) {
                    throw $mqe;
                }
        }
        public function serviceSearch($search){
            
        }
        public function serviceUpdate(array $post){
            
        }
        public function serviceDelete($nom){
            
        }
    }
?>