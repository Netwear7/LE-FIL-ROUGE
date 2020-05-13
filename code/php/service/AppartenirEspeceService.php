<?php
    include_once '../service/ServiceCommun.php';
    include_once '../Interfaces/InterfaceService.php';
    include_once '../model/AppartenirEspece.php';

    class AppartenirEspeceService extends ServiceCommun implements InterfaceService{
        
        public function serviceSelectAll(){
            $data = $this->getDataAccessObject()->daoSelectAll();
            return $data;
        }
        public function InsertPostToEntityAndAdd(array $post){
            $appartenirEspece = new AppartenirEspece();
            $appartenirEspece->setIdRace($post["race"]);
            $appartenirEspece->setIdEspece($post["espece"]);
            $this->getDataAccessObject()->daoAdd($appartenirEspece);
        }
        public function serviceSelect($id){}
        public function serviceCount(){}
        public function serviceAdd($animal){}
        public function serviceSearch($search){}
        public function serviceUpdate(array $post){}
        public function serviceDelete($nom){}
    }
?>