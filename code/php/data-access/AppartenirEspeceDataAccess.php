<?php

include_once '../data-access/LogBdd.php';
include_once '../Interfaces/InterfaceDao.php';

class AppartenirEspeceDataAccess extends LogBdd implements InterfaceDao{

        public function daoSelectAll(){}
        public function daoSelect(int $id){}
        public function daoCount(){}
        public function daoAdd(object $object){}
        public function daoSearch($search){}
        public function daoUpdate(array $parametres){}
        public function daoDelete(string $nom){}
    }
?>