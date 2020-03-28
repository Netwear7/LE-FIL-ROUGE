<?php
    include_once '../service/ServiceCommun.php';
    include_once '../Interfaces/InterfaceService.php';

    class AppartenirEspeceService extends ServiceCommun implements InterfaceService{
        
        public function serviceSelectAll(){}
        public function serviceSelect($id){}
        public function serviceCount(){}
        public function serviceAdd($animal){}
        public function serviceSearch($search){}
        public function serviceUpdate(array $post){}
        public function serviceDelete($nom){}
    }
?>