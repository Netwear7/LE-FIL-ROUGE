<?php

    include_once('../service/ServiceCommun.php');
    include_once('../Interfaces/InterfaceService.php');

    class GarderieService extends ServiceCommun implements InterfaceService{
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

        public function serviceReservationGarderie($tab){
            $dateEntree=$tab["date_entree"];
            $dateSortie=$tab["date_sortie"];
            $idRefuge=$tab["ville"];
            foreach($tab as $key => $value){
                if($key == "id_animal"){
                    foreach($value as $value2){
                        $idAnimal= $value2;
                        $this->getDataAccessObject()->daoReservationGarderie($dateEntree,$dateSortie,$idRefuge,$idAnimal);
                    }
                }
            }
        }
    }
?>