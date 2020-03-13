<?php
    include_once('../data-access/RaceDataAccess.php');

    class RaceService{
        private $raceDataAccess;

        public function __construct(){
            $this->raceDataAccess = new RaceDataAccess();
        }
        public function afficherRace(){
            $data = $this->raceDataAccess->afficherRace();
            return $data;            
        }
    }
?>