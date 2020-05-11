<?php

    include_once('../data-access/CouleurAnimalDataAccess.php');
    include_once('../service/ServiceCommun.php');
    include_once('../Interfaces/InterfaceService.php');
    include_once('../model/CouleurAnimal.php');

    class CouleurAnimalService extends ServiceCommun implements InterfaceService{

        public function afficherCouleur(){
            $data = $this->getDataAccessObject()->afficherCouleur();
            return $data;            
        }
        public function serviceSelectAll(){
            $data = $this->getDataAccessObject()->daoSelectAll();
            return $data;
        }
        public function InsertPostToEntityAndAdd(array $post){
            $couleurAnimal = new CouleurAnimal();
            $couleurAnimal->setCouleur($post["couleur"]);
            $this->getDataAccessObject()->daoAdd($couleurAnimal);
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