<?php

    include_once '../service/ServiceCommun.php';
    include_once '../Interfaces/InterfaceService.php';

    class AdresseService extends ServiceCommun implements InterfaceService{
        public function serviceUpdate(array $post){}
        public function serviceDelete($nom){}
        // fonction pour select toutes les adresses
        public function serviceSelectAll($id){
            // if admin ok sinon non // 
        }

        //Select Adresses
        public function serviceSelect($id){
            $data = $this->getDataAccessObject()->daoSelect($this->id);
            return $data;
        }

        public function serviceVerifyPassword(){

        }

        // Function pour le count Adresses
        public function serviceCount(){
            $this->getDataAccessObject()->daoCount();
        }

        // function pour l'ajout Adresses
        public function serviceAdd($adresse){
            $this->getDataAccessObject()->daoAdd($adresse);
            $id = $this->getDataAccessObject()->daoTakeId($adresse);
            $adresse->setIdAdresse($id[0]["ID_ADRESSE"]);
        }

        //function pour la recherche Utilisateur
        public function serviceSearch($search){
            $this->getDataAccessObject()->daoSearch($search);
        }
    }
?>