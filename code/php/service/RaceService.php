<?php
    include_once('../data-access/RaceDataAccess.php');

    class RaceService{
        private $raceDataAccess;

        public function __construct(){
            $this->raceDataAccess = new RaceDataAccess();
        }
        public function selectRace($espece){
            $request="C.nom_espece LIKE ?";
            $value=$espece;
            $type="s";
            $data = $this->raceDataAccess->selectRace($request,$value,$type);
            return $data;            
        }
    }
?>