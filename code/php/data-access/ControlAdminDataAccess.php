<?php
    include_once '../Interfaces/InterfaceDao.php';
    include_once 'LogBdd.php';

    class ControlAdminDataAccessDataAccess extends LogBdd implements InterfaceDao{
        public function daoSelectAll(){}
        public function daoSelect($idAnimal){}
        public function daoCount(){}
        public function daoAdd($object){}
        public function daoSearch($search){}
        public function daoUpdate($parametres){}
        public function daoDelete($nom){}

        public function daoSelectTable(){
            $mysqli = $this->connexion();
            $rs = $mysqli->query("SELECT table_name 
                                  FROM information_schema.tables 
                                  WHERE table_schema='bddanimaux'");
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $data;
        }
        public function daoSelectTableColumn($table){
            $mysqli = $this->connexion();
            $rs = $mysqli->query("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='bddanimaux' AND `TABLE_NAME`='$table'");
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $data;
        }
    }
?>