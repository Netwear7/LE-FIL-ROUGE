<?php

    include_once '../service/ServiceCommun.php';
    include_once '../Interfaces/InterfaceService.php';

    class AdresseService extends ServiceCommun implements InterfaceService{
        public function serviceUpdate($parametres){
            $this->getDataAccessObject()->daoUpdate($parametres);

        }
        public function serviceDelete($nom){}
        // fonction pour select toutes les adresses
        public function serviceSelectAll(){
            // if admin ok sinon non // 
        }

        //Select Adresses
        public function serviceSelect($id)
        {
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
        public function serviceAdd($adresse)
        {
            $this->getDataAccessObject()->daoAdd($adresse);
            $id = $this->getDataAccessObject()->daoGetId($adresse);
            $adresse->setIdAdresse($id[0]["ID_ADRESSE"]);
        }

        
        //function pour la recherche Utilisateur
        public function serviceSearch($search){
            $this->getDataAccessObject()->daoSearch($search);
        }

        public function serviceAfficherVille(){
            $data = $this->getDataAccessObject()->daoAfficherVille();
            return $data;            
        }

        public function serviceSelectLostAnimalCities(){
            $data = $this->getDataAccessObject()->daoSelectLostAnimalCities();
            return $data;            
        }
    }
?>