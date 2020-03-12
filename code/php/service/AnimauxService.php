<?php

    include_once('../data-access/AnimauxDataAccess.php');

    class AnimauxService{

        public function __construct(){
            $this->animauxDataAccess = new AnimauxDataAccess();
        }

        public function selectAll(){
            $data = $this->animauxDataAccess->selectAll();
            return $data;            
        }

        public function selectRecherche($tab){
            $nomRace=$tab["nom_race"];
            $couleur=$tab["couleur"];
            $s_nomRace="B.nom_race LIKE ('$nomRace%')";
            $s_couleur="D.couleur LIKE ('$couleur%')";
            $data = $this->animauxDataAccess->selectRecherche($s_nomRace, $s_couleur);
            return $data;            
        }

    }
?>