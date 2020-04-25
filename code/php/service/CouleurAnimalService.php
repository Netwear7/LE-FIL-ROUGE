<?php

    include_once('../data-access/CouleurAnimalDataAccess.php');
    include_once('../service/ServiceCommun.php');
    include_once('../Interfaces/InterfaceService.php');

    class CouleurAnimalService extends ServiceCommun implements InterfaceService{

        private $couleurAnimalDataAccess;

        public function __construct(){
            $this->couleurAnimalDataAccess = new CouleurAnimalDataAccess();
        }

        public function afficherCouleur(){
            $data = $this->couleurAnimalDataAccess->afficherCouleur();
            return $data;            
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