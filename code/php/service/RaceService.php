<?php

include_once '../service/ServiceCommun.php';
include_once '../Interfaces/InterfaceService.php';
    include_once('../data-access/RaceDataAccess.php');

    class RaceService extends ServiceCommun implements InterfaceService{


        public function serviceSelectAll(){}
        public function serviceSelect($id){}
        public function serviceCount(){}
        public function serviceAdd(object $var){}
        public function serviceSearch($search){}
        public function serviceUpdate(array $post){}
        public function serviceDelete($nom){}

        public function selectRace($espece){
            $request="C.nom_espece LIKE ?";
            $value=$espece;
            $type="s";
            $data = $this->getDataAccessObject()->selectRace($request,$value,$type);
            return $data;            
        }

        public function selectRaceForAdd($espece){
            $request="C.nom_espece LIKE ?";
            $value=$espece;
            $type="s";
            $data = $this->getDataAccessObject()->selectRaceForAdd($request,$value,$type);
            return $data;            
        }
        
        
        public function selectAllCatRaces(){
            return $this->getDataAccessObject()->selectAllCatRaces();
        }

        
    }
?>