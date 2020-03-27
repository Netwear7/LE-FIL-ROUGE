<?php

    include_once("logBdd.php");
    include_once("../Interfaces/InterfaceDao.php");
    class EstInfectéParDataAccess extends LogBdd implements InterfaceDao{
        public function SelectAnimauxMalade(){
            $mysqli = $this->connexion();
            $rs = $mysqli->query("");
            $this->deconnexion($mysqli);
        }
    }
?>