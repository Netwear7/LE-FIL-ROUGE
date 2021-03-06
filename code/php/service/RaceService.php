<?php

include_once '../service/ServiceCommun.php';
include_once '../Interfaces/InterfaceService.php';
include_once('../data-access/RaceDataAccess.php');
include_once('../model/Race.php');

    class RaceService extends ServiceCommun implements InterfaceService{


        public function serviceSelectAll(){
            $data = $this->getDataAccessObject()->daoSelectAll();
            return $data;
        }
        public function serviceSelect($id){}
        public function serviceCount(){}

        public function InsertPostToEntityAndAdd(array $post){
            $race = new Race($post);
            $this->getDataAccessObject()->daoAdd($race);
        }
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