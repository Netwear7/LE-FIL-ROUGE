<?php

    include_once('../data-access/RaceDataAccess.php');

    class RaceService{

        public function afficherRace(){
            $raceDataAccess = new RaceDataAccess();
            $data = $raceDataAccess->afficherRace();
            return $data;            
        }

    }
?>