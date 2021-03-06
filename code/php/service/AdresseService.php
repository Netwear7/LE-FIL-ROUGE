<?php

    include_once '../service/ServiceCommun.php';
    include_once '../Interfaces/InterfaceService.php';
    include_once '../model/Adresse.php';

    class AdresseService extends ServiceCommun implements InterfaceService{
        public function serviceUpdate($parametres){
            $this->getDataAccessObject()->daoUpdate($parametres);

        }
        public function serviceDelete($id){
            $this->getDataAccessObject()->daoDelete($id);
        }
        // fonction pour select toutes les adresses
        public function serviceSelectAll(){
            $data = $this->getDataAccessObject()->daoSelectAll();
            return $data;
        }
        public function InsertPostToEntityAndAdd(array $post){
            $adresse = new Adresse($post);
            $this->getDataAccessObject()->daoAdd($adresse);
        }
        public function updatePostToEntityAndAdd($post){
            $this->getDataAccessObject()->daoUpdateAdmin($post);
        }
        //Select Adresses
        public function serviceSelect($id)
        {
            $data = $this->getDataAccessObject()->daoSelect($id);
            return $data;
        }
        public function serviceSelectByCodePostal($codePostal)
        {
            $data = $this->getDataAccessObject()->daoSelectByCodePostal($codePostal);
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