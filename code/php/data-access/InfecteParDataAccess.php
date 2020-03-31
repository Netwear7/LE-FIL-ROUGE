<?php

    include_once("logBdd.php");
    include_once("../Interfaces/InterfaceDao.php");
    class InfecteParDataAccess extends LogBdd implements InterfaceDao{
        public function daoSelectAll(){}
        public function daoSelect($id){}
        public function daoCount(){}
        public function daoAdd($object){}
        public function daoSearch($search){}
        public function daoUpdate($parametres){}
        public function daoDelete($nom){}
    }
?>