<?php
    interface InterfaceDao extends mysqli_sql_exception{
        public function daoSelectAll();
        public function daoSelect(int $id);
        public function daoCount();
        public function daoAdd(object $object);
        public function daoSearch($search);
        public function daoUpdate(array $parametres);
        public function daoDelete(string $nom);
    }
?>