<?php

    include_once("../data-access/ContactezNousDataAccess.php");
    include_once("../model/ContactezNous.php");
    include_once('../service/ServiceCommun.php');
    include_once('../Interfaces/InterfaceService.php');

    class ContactezNousService extends ServiceCommun implements InterfaceService{
        public function InsertMessage(array $array){
            $insert = new ContactezNous($array["message"], $array["motif"]);
            $this->getDataAccessObject()->InsertMessage($insert);
        }
        public function serviceSelectAll(){
            $data = $this->getDataAccessObject()->daoSelectAll();
            return $data;
        }
        public function serviceSelect($id){

        }
        public function serviceCount(){

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