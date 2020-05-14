<?php

include_once '../service/ServiceCommun.php';
include_once '../Interfaces/InterfaceService.php';

    class NewsService extends ServiceCommun implements InterfaceService{
        
        public function serviceSelectAll(){
            try{
                return $this->getDataAccessObject()->daoSelectAll();
            }catch (MysqliQueryException $mqe) {
                    throw $mqe;
            }
        }
        public function serviceSelect($id){}
        public function serviceCount(){}
        public function serviceAdd($news){
            try{
            return $this->getDataAccessObject()->daoAdd($news);
            }catch (MysqliQueryException $mqe) {
                throw $mqe;
            }
        }
        public function serviceSearch($search){}
        public function serviceUpdate(array $post){}
        public function serviceDelete($id){
            try{
                return $this->getDataAccessObject()->daoDelete($id);
                }catch (MysqliQueryException $mqe) {
                    throw $mqe;
                }
        }
    }

?>