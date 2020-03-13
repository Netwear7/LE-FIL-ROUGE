<?php

include_once '../service/ServiceCommun.php';
include_once '../Interfaces/InterfaceService.php';

    class AnimauxService extends ServiceCommun implements InterfaceService {




        public function serviceSelectAll()
        {

        }
        public function serviceSelect()
        {
            $data = $this->getDataAccessObject()->daoSelect($this->id);
            return $data;
        }
        public function serviceCount() 
        {

        }
        public function serviceAjout()
        {

        }
        public function serviceRecherche()
        {

        }
        public function serviceModification(array $post)
        {

        }
        public function serviceSuppression($nom)
        {
            
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