<?php
    interface InterfaceDao{

        public function daoSelectAll();
        public function daoSelect(string $id);
        public function daoCount();
        public function daoAdd(object $object);
        public function daoSearch();
        public function daoUpdate(array $parametres);
        public function daoDelete(string $nom);
    }
?>