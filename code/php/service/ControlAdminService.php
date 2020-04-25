<?php

    include_once '../service/ServiceCommun.php';
    include_once '../Interfaces/InterfaceService.php';

    class ControlAdminService extends ServiceCommun implements InterfaceService{
        public function serviceSelectAll(){}
        public function serviceSelect($id){}
        public function serviceCount(){}
        public function serviceAdd(object $var){}
        public function serviceSearch($search){}
        public function serviceUpdate(array $post){}
        public function serviceDelete($nom){}

        public function serviceSelectTable(){
            $data = $this->getDataAccessObject()->daoSelectTable();
            return $data;
        }
        public function serviceSelectTableColumn($table){
            $data = $this->getDataAccessObject()->daoSelectTableColumn($table);
            return $data;
        }
    }
?>